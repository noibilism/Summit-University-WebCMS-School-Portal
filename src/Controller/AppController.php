<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use App\Core\Setting;
use Cake\Controller\Controller;
use Cake\Core\Configure;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Cookie');
        $this->loadComponent('Auth', [
            /*'authorize' => [
                'TinyAuth.Tiny' => [
                    'multiRole' => false,
                    'autoClearCache' => Configure::read('debug'),
                ],
            ],*/
            'authenticate' => [
                'Authenticate.Advance' => [
                    'lockout' => [
                        'retries' => Setting::read('BruteForceProtection.retries'),
                        'expires' => Setting::read('BruteForceProtection.expires'),
                        'file_path' => Setting::read('BruteForceProtection.file_path'),
                    ],
                    'remember' => [
                        'enable' => Setting::read('Remember.enable'),
                        'key' => Setting::read('Remember.key'),
                        'expires' => Setting::read('Remember.expires'),
                    ],
                    'fields' => [
                        'username' => 'email',
                        'password' => 'password',
                    ],
                    'scope' => ['Users.status' => true],
                ],
            ],
            'loginAction' => [
                'prefix' => 'admin',
                'controller' => 'Users',
                'action' => 'login',
            ],
            'loginRedirect' => [
                'prefix' => 'admin',
                'controller' => 'Dashboard',
                'action' => 'index',
            ],
            'logoutRedirect' => [
                'prefix' => 'admin',
                'controller' => 'Users',
                'action' => 'login',
            ],
            'unauthorizedRedirect' => false,
            'authError' => __('Sorry! You are not allowed to use that resource....'),
        ]);
        $this->loadModel('AdmissionPayments');
        $this->loadModel('AdmissionsApplicants');
        $this->loadModel('ApplicantContacts');
        $this->loadModel('ApplicantEducations');
        $this->loadModel('Cities');
        $this->loadModel('Contents');
        $this->loadModel('Countries');
        $this->loadModel('ContentCategories');
        $this->loadModel('Courses');
        $this->loadModel('Coursewares');
        $this->loadModel('Departments');
        $this->loadModel('Faculties');
        $this->loadModel('Fees');
        $this->loadModel('Galleries');
        $this->loadModel('Lgas');
        $this->loadModel('Publications');
        $this->loadModel('Results');
        $this->loadModel('Roles');
        $this->loadModel('SchoolSessions');
        $this->loadModel('StaffProfiles');
        $this->loadModel('States');
        $this->loadModel('Students');
        $this->loadModel('StudentsAcademics');
        $this->loadModel('StudentsContacts');
        $this->loadModel('Transactions');
        $this->loadModel('Units');
        $this->loadModel('Users');
        $this->loadModel('Permissions');
    }

    /**
     * beforeFilter method
     * Do automatic login
     * If cannot login, delete cookie
     * @param Cake\Event\Event $event event
     * @return void
     */
    public function beforeFilter(Event $event)
    {
        //Automaticaly Login.
        if (!$this->Auth->user() && $this->Cookie->read(Setting::read('Remember.key'))) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
            } else {
                $this->Cookie->delete(Setting::read('Remember.key'));
            }
        }
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }

    function uploadFiles($folder, $formdata, $itemId = null, array $permitted)
    {

        // setup dir names absolute and relative
        $folder_url = WWW_ROOT . $folder;
        $rel_url = $folder;

        // create the folder if it does not exist
        if (!is_dir($folder_url)) {
            mkdir($folder_url);
        }

        // if itemId is set create an item folder
        if ($itemId) {
            // set new absolute folder
            $folder_url = WWW_ROOT . $folder . '/' . $itemId;
            // set new relative folder
            $rel_url = $folder . '/' . $itemId;
            // create directory
            if (!is_dir($folder_url)) {
                mkdir($folder_url);
            }
        }

        // list of permitted file types, this is only images but documents can be added
        //$permitted = array('image/gif','image/jpeg','image/pjpeg','image/png');
        // loop through and deal with the files
        // replace spaces with underscores
        $filename = str_replace(' ', '_', $formdata['name']);
        // assume filetype is false
        $typeOK = false;
        // check filetype is ok
        foreach ($permitted as $type) {

            if ($type == $formdata['type']) {
                $typeOK = true;
                break;
            } else {
                $typeOK = false;
            }
        }

        // if file type ok upload the file
        if ($typeOK == true) {
            // switch based on error code
            switch ($formdata['error']) {
                case 0:
                    // check filename already exists
                    if (!file_exists($folder_url . '/' . $filename)) {
                        // create full filename
                        $full_url = $folder_url . '/' . $filename;
                        $url = $rel_url . '/' . $filename;
                        // upload the file
                        $success = move_uploaded_file($formdata['tmp_name'], $url);
                    } else {
                        // create unique filename and upload file
                        ini_set('date.timezone', 'Europe/London');
                        $now = date('Y-m-d-His');
                        $full_url = $folder_url . '/' . $now . $filename;
                        $url = $rel_url . '/' . $now . $filename;
                        $success = move_uploaded_file($formdata['tmp_name'], $url);
                    }
                    // if upload was successful
                    if ($success) {
                        // save the url of the file
                        $result['urls'][] = $url;
                    } else {
                        $result['errors'][] = "Error uploaded $filename. Please try again.";
                    }
                    break;
                case 3:
                    // an error occured
                    $result['errors'][] = "Error uploading $filename. Please try again.";
                    break;
                default:
                    // an error occured
                    $result['errors'][] = "System error uploading $filename. Contact webmaster.";
                    break;
            }
        } elseif ($typeOK == false) {
            // unacceptable file type
            $result['errors'][] = "$filename cannot be uploaded. Acceptable file types: gif, jpg, png.";
        } elseif ($formdata['error'] == 4) {
            // no file was selected for upload
            $result['nofiles'][] = "No file Selected";
        }
        return $result;
    }


    public function checkUserPermission($role, $resource, $type)
    {
        $query = $this->Permissions->find();
        $query->select(['permission']);
        $query->where(['role_id' => $role, 'resource_id'=>$resource]);
        $query->first();
        foreach ($query as $row) {
            $q[] = $row->permission;
        }
        if (!empty($q)) {
            return true;
        } else {
            return false;
        }
    }

    public function sendNotification($mail, $subject, $message){
        $email = new Email('default');
        $email->from(['no_reply@summituniversity.edu.ng' => 'Summit University, Offa, Nigeria'])
            ->to($mail)
            ->subject($subject)
            ->send($message);
        return $email;
    }

    /**
     * @param $length
     * @return string
     */
    public function generateReferenceNumber($length)
    {
        $result = '';
        for ($i = 0; $i < $length; $i++) {
            $result .= mt_rand(1, 9);
        }
        return $result;
    }


}
