<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Purposes Controller
 *
 * @property \App\Model\Table\PurposesTable $Purposes
 */
class PurposesController extends AppController
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
        $purposes = $this->paginate($this->Purposes);

        $this->set(compact('purposes'));
        $this->set('_serialize', ['purposes']);
    }

    /**
     * View method
     *
     * @param string|null $id Purpose id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $purpose = $this->Purposes->get($id, [
            'contain' => ['Customers', 'Vehicles']
        ]);

        $this->set('purpose', $purpose);
        $this->set('_serialize', ['purpose']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $purpose = $this->Purposes->newEntity();
        if ($this->request->is('post')) {
            $purpose = $this->Purposes->patchEntity($purpose, $this->request->data);
            if ($this->Purposes->save($purpose)) {
                $this->Flash->success(__('The purpose has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The purpose could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Purposes->Customers->find('list', ['limit' => 200]);
        $this->set(compact('purpose', 'customers'));
        $this->set('_serialize', ['purpose']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Purpose id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $purpose = $this->Purposes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $purpose = $this->Purposes->patchEntity($purpose, $this->request->data);
            if ($this->Purposes->save($purpose)) {
                $this->Flash->success(__('The purpose has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The purpose could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Purposes->Customers->find('list', ['limit' => 200]);
        $this->set(compact('purpose', 'customers'));
        $this->set('_serialize', ['purpose']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Purpose id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $purpose = $this->Purposes->get($id);
        if ($this->Purposes->delete($purpose)) {
            $this->Flash->success(__('The purpose has been deleted.'));
        } else {
            $this->Flash->error(__('The purpose could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
