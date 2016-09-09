<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Partcategories Controller
 *
 * @property \App\Model\Table\PartcategoriesTable $Partcategories
 */
class PartcategoriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Customers']
        ];
        $partcategories = $this->paginate($this->Partcategories);

        $this->set(compact('partcategories'));
        $this->set('_serialize', ['partcategories']);
    }

    /**
     * View method
     *
     * @param string|null $id Partcategory id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $partcategory = $this->Partcategories->get($id, [
            'contain' => ['Customers', 'Parts']
        ]);

        $this->set('partcategory', $partcategory);
        $this->set('_serialize', ['partcategory']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $partcategory = $this->Partcategories->newEntity();
        if ($this->request->is('post')) {
            $partcategory = $this->Partcategories->patchEntity($partcategory, $this->request->data);
            if ($this->Partcategories->save($partcategory)) {
                $this->Flash->success(__('The partcategory has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The partcategory could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Partcategories->Customers->find('list', ['limit' => 200]);
        $this->set(compact('partcategory', 'customers'));
        $this->set('_serialize', ['partcategory']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Partcategory id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $partcategory = $this->Partcategories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $partcategory = $this->Partcategories->patchEntity($partcategory, $this->request->data);
            if ($this->Partcategories->save($partcategory)) {
                $this->Flash->success(__('The partcategory has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The partcategory could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Partcategories->Customers->find('list', ['limit' => 200]);
        $this->set(compact('partcategory', 'customers'));
        $this->set('_serialize', ['partcategory']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Partcategory id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $partcategory = $this->Partcategories->get($id);
        if ($this->Partcategories->delete($partcategory)) {
            $this->Flash->success(__('The partcategory has been deleted.'));
        } else {
            $this->Flash->error(__('The partcategory could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
