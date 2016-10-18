<?php
namespace App\Controller\Portal;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;


/**
 * Contents Controller
 *
 * @property \App\Model\Table\ContentsTable $Contents
 */
class ContentsController extends AppController
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
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'ContentCategories', 'Galleries'],
        ];
        $contents = $this->paginate($this->Contents->find('search', $this->Contents->filterParams($this->request->query)));

        $this->set(compact('contents'));
        $this->set('_serialize', ['contents']);
    }

    /**
     * View method
     *
     * @param string|null $id Content id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $content = $this->Contents->get($id, [
            'contain' => ['Users', 'ContentCategories', 'Galleries', 'ContentDocuments', 'Coursewares', 'Departments', 'Faculties', 'Units']
        ]);

        $this->set('content', $content);
        $this->set('_serialize', ['content']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $content = $this->Contents->newEntity();
        if ($this->request->is('post')) {
            $documents = array(
                $this->request->data['file_1'], $this->request->data['file_2'], $this->request->data['file_3']
            );
            $content = $this->Contents->patchEntity($content, $this->request->data);
            if ($this->Contents->save($content)) {
                if (!empty($documents)) {
                    $permitted = array('application/pdf');
                    foreach ($documents as $document) {
                        switch ($document) {
                            case !empty($document);
                                $this->uploadFiles('uploads', $document, null, $permitted);
                                $doc[] = array(
                                    'content_id' => $content->id,
                                    'user_id' => $this->Auth->user('id'),
                                    'document' => $document
                                );
                                break;
                        }
                    }
                    $docs = TableRegistry::get('ContentDocuments');
                    $entities = $docs->newEntities($docs);
                    $docs->saveMany($entities);
                }
                $this->Flash->success(__('The content has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The content could not be saved. Please, try again.'));
            }
        }
        $users = $this->Contents->Users->find('list', ['limit' => 200]);
        $contentCategories = $this->Contents->ContentCategories->find('list', ['limit' => 200]);
        $galleries = $this->Contents->Galleries->find('list', ['limit' => 200]);
        $this->set(compact('content', 'users', 'contentCategories', 'galleries'));
        $this->set('_serialize', ['content']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Content id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $content = $this->Contents->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $content = $this->Contents->patchEntity($content, $this->request->data);
            if ($this->Contents->save($content)) {
                $this->Flash->success(__('The content has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The content could not be saved. Please, try again.'));
            }
        }
        $users = $this->Contents->Users->find('list', ['limit' => 200]);
        $contentCategories = $this->Contents->ContentCategories->find('list', ['limit' => 200]);
        $galleries = $this->Contents->Galleries->find('list', ['limit' => 200]);
        $this->set(compact('content', 'users', 'contentCategories', 'galleries'));
        $this->set('_serialize', ['content']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Content id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $content = $this->Contents->get($id);
        if ($this->Contents->delete($content)) {
            $this->Flash->success(__('The content has been deleted.'));
        } else {
            $this->Flash->error(__('The content could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
