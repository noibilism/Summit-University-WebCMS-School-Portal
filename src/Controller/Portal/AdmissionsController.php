<?php
namespace App\Controller\Portal;

use App\Controller\AppController;

/**
 * Admissions Controller
 *
 * @property \App\Model\Table\AdmissionsTable $Admissions
 */
class AdmissionsController extends AppController
{

    /**
     * Initialize method
     *
     */
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Search.Prg', [
            'actions' => ['index'],
        ]);
        //Allow guest to access this area
        $this->Auth->allow(['applicationDetails', 'apply']);
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function admissionsIndex($session_id = null)
    {
        if(!empty($session_id)){
            $this->paginate = [
                'contain' => ['ApplicantContacts', 'ApplicantEducations', 'AdmissionPayments'],
            ];
            $query = $this->AdmissionsApplicants->find('all')->where(['sch_session_id' => $session_id]);
            $admissions = $this->paginate($query);
            $this->set(compact('admissions'));
            $this->set('_serialize', ['admissions']);
        }else{
            $this->Flash->error(__('Please select a Session....'));
            $this->redirect($this->referer());
        }
    }

    /**
     * View method
     *
     * @param string|null $id Admission id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $admission = $this->AdmissionsApplicants->get($id, [
            'contain' => ['ApplicantContacts', 'ApplicantEducations', 'AdmissionPayments']
        ]);

        $this->set('admission', $admission);
        $this->set('_serialize', ['admission']);
    }

    /**
     * View method
     *
     * @param string|null $id Admission id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function applicationDetails($id = null)
    {
        $admission = $this->AdmissionsApplicants->get($id, [
            'contain' => ['ApplicantContacts', 'ApplicantEducations', 'AdmissionPayments']
        ]);

        $this->set('admission', $admission);
        $this->set('_serialize', ['admission']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function apply($session_id = null)
    {
        if(!empty($session_id)){
            $app_no = $this->generateReferenceNumber(7);
            $payment_ref = $this->generateReferenceNumber(10);
            $admission = $this->AdmissionsApplicants->newEntity();
            $contact_info = $this->ApplicantContacts->newEntity();
            $payment_info = $this->AdmissionPayments->newEntity();
            $academic_info = $this->ApplicantEducations->newEntity();
            if ($this->request->is('post')) {
                $email = $this->request->data['email'];
                $name = $this->request->data['first_name'] . ' ' . $this->request->data['middle_name'] . ' '
                    . $this->request->data['last_name'];
                //Applicant Contact Info
                $this->request->data['ApplicantContacts']['application_number'] = $app_no;
                $this->request->data['ApplicantContacts']['email'] = $this->request->data['email'];
                $this->request->data['ApplicantContacts']['home_address'] = $this->request->data['home_address'];
                $this->request->data['ApplicantContacts']['state'] = $this->request->data['state'];
                $this->request->data['ApplicantContacts']['lga'] = $this->request->data['lga'];
                $this->request->data['ApplicantContacts']['city'] = $this->request->data['home_address'];
                $this->request->data['ApplicantContacts']['phone_number'] = $this->request->data['home_address'];

                //Applicant Payment Details
                $this->request->data['AdmissionPayments']['application_number'] = $app_no;
                $this->request->data['AdmissionPayments']['reference_no'] = $payment_ref;
                $this->request->data['AdmissionPayments']['amount'] = $this->request->data['amount'];
                $this->request->data['AdmissionPayments']['mode'] = $this->request->data['mode'];
                $this->request->data['AdmissionPayments']['status_code'] = 'S001';
                $this->request->data['AdmissionPayments']['status_description'] = 'Pending';

                $this->request->data['AdmissionsApplicants']['application_number'] = $app_no;

                //Applicant academic details
                $this->request->data['ApplicantEducations']['application_numer'] = $app_no;
                $this->request->data['ApplicantEducations']['sec_school'] = $this->request->data['sec_school'];
                $this->request->data['ApplicantEducations']['grades_obtained'] = $this->request->data['grades_obtained'];
                $this->request->data['ApplicantEducations']['other_grades'] = $this->request->data['other_grades'];
                $this->request->data['ApplicantEducations']['jamb_reg'] = $this->request->data['jamb_reg'];
                $this->request->data['ApplicantEducations']['jamb_score'] = $this->request->data['jamb_score'];
                $admission = $this->AdmissionsApplicants->patchEntity($admission, $this->request->data);
                if ($this->AdmissionsApplicants->save($admission)) {
                    $contact_info = $this->ApplicantContacts->patchEntity($contact_info, $this->request->data);
                    $payment_info = $this->AdmissionPayments->patchEntity($payment_info, $this->request->data);
                    $academic_info = $this->ApplicantEducations->patchEntity($academic_info, $this->request->data);
                    $this->request->data['ApplicantEducations']['admission_application_id'] = $admission->id;
                    $this->request->data['AdmissionPayments']['admission_application_id'] = $admission->id;
                    $this->request->data['ApplicantContacts']['admission_application_id'] = $admission->id;
                    $save_contact = $this->ApplicantContacts->save($contact_info);
                    $save_payment = $this->AdmissionPayments->save($payment_info);
                    $save_acada = $this->ApplicantEducations->save($academic_info);
                    if ($save_contact && $save_payment && $save_acada) {
                        $msg = "Dear " . $name . ",\n\n";
                        $msg .= "You have successfully applied for admission at Summit University, Offa:\n\n";
                        $msg .= "Name: " . $name . "\n";
                        $msg .= "Application No: " . $app_no . "\n";
                        $msg .= "Best Regards \n";
                        $msg .= "Summit University, Offa, Kwara State, Nigeria.";
                        $this->sendNotification($email, 'Admission Application - '.$app_no, $msg);
                        $this->Flash->success(__('Admission Application Successful! Please print out this page and
                    bring to the school during screening exercise!'));
                        return $this->redirect(['action' => 'application_details',$admission->id]);
                    }else{
                        $this->Flash->error(__('Admission Application was not Successful! Please fill all compulsory
                    fields and try again'));
                    }
                } else {
                    $this->Flash->error(__('Admission Application was not Successful! Please fill all compulsory
                    fields and try again'));
                }
            }
            $this->set(compact('admission', 'session_id'));
            $this->set('_serialize', ['admission']);
        }else{
            $this->Flash->error(__('Invalid Session....'));
            $this->redirect($this->referer());
        }
    }

}
