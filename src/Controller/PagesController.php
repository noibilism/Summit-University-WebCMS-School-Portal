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

use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{
    /**
     * initialize method
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow();
        $this->viewBuilder()->build('home');
    }

    /**
     * Displays a view
     *
     * @return void|\Cake\Network\Response
     * @throws \Cake\Network\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     */
    public function display()
    {
        $path = func_get_args();

        $count = count($path);
        if (!$count) {
            return $this->redirect('/');
        }
        $page = $subpage = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        $this->set(compact('page', 'subpage'));

        try {
            $this->render(implode('/', $path));
        } catch (MissingTemplateException $e) {
            if (Configure::read('debug')) {
                throw $e;
            }
            throw new NotFoundException();
        }
    }

    /**
     * View method
     *
     * @param string|null $id Content id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function content($id = null, $alias = null)
    {
        if ($alias !== 0) {
            $content = $this->Contents->find('first')->where(['alias' => $alias]);
            $content->contain(['Users', 'ContentCategories', 'Galleries', 'ContentDocuments', 'Coursewares', 'Departments', 'Faculties', 'Units']);
        } elseif ($id !== 0) {
            $content = $this->Contents->get($id, [
                'contain' => ['Users', 'ContentCategories', 'Galleries', 'ContentDocuments', 'Coursewares', 'Departments', 'Faculties', 'Units']
            ]);
        }
        $this->set('content', $content);
        $this->set('_serialize', ['content']);
    }

    /**
     * View method
     *
     * @param string|null $id Content id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function category($cat_id = null)
    {
        if (!empty($cat_id)) {
            $content = $this->Contents->find('all')->where(['category_id' => $cat_id]);
            $content->contain(['Users', 'ContentCategories', 'Galleries', 'ContentDocuments', 'Coursewares', 'Departments', 'Faculties', 'Units']);
            $this->set('content', $content);
            $this->set('_serialize', ['content']);
        } else {
            $this->redirect($this->referer());
        }
    }

    public function albums(){
        $content = $this->Albums->find('all');
        $this->set('content', $content);
        $this->set('_serialize', ['content']);
    }

    public function gallery($album_id = null)
    {
        if (!empty($album_id)) {
            $content = $this->Galleries->find('all')->where(['album_id' => $album_id]);
        } else {
            $content = $this->Galleries->find('all');
        }
        $this->set('content', $content);
        $this->set('_serialize', ['content']);
    }

    public function coursewares($dept = null)
    {
        if (!empty($cat_id)) {
            $content = $this->Coursewares->find('all')->where(['department_id' => $dept]);
            $this->set('content', $content);
            $this->set('_serialize', ['content']);
        } else {
            $this->redirect($this->referer());
        }
    }

    public function faculties()
    {
        $content = $this->Faculties->find('all');
        $this->set('content', $content);
        $this->set('_serialize', ['content']);
    }

    public function departments($fac_id = null)
    {
        if (!empty($cat_id)) {
            $content = $this->Departments->find('all')->where(['faculty_id' => $fac_id]);
        } else {
            $content = $this->Departments->find('all');
        }
        $this->set('content', $content);
        $this->set('_serialize', ['content']);
    }

    public function staffProfile($id = null, $unit_id = null, $dept_id = null, $fac_id = null)
    {
        $staff = array(
            $id, $unit_id, $dept_id, $fac_id
        );
        switch ($staff) {
            case ($staff[0] != 0);
                $content = $this->StaffProfiles->find('all')->where(['id' => $id]);
                break;
            case ($staff[1] != 0);
                $content = $this->StaffProfiles->find('all')->where(['unit_id' => $unit_id]);
                break;
            case ($staff[2] != 0);
                $content = $this->StaffProfiles->find('all')->where(['department_id' => $dept_id]);
                break;
            case ($staff[3] != 0);
                $content = $this->StaffProfiles->find('all')->where(['faculty_id' => $fac_id]);
                break;
            default;
                $content = $this->StaffProfiles->find('all');
        }
        $this->set('content', $content);
        $this->set('_serialize', ['content']);
    }


}
