<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Contractors Controller
 *
 * @property \App\Model\Table\ContractorsTable $Contractors
 */
class ContractorsController extends AppController
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
        $contractors = $this->paginate($this->Contractors);

        $this->set(compact('contractors'));
        $this->set('_serialize', ['contractors']);
    }

    /**
     * View method
     *
     * @param string|null $id Contractor id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $contractor = $this->Contractors->get($id, [
            'contain' => ['Customers', 'Drivers']
        ]);

        $this->set('contractor', $contractor);
        $this->set('_serialize', ['contractor']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $contractor = $this->Contractors->newEntity();
        if ($this->request->is('post')) {
            $contractor = $this->Contractors->patchEntity($contractor, $this->request->data);
            if ($this->Contractors->save($contractor)) {
                $this->Flash->success(__('The contractor has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The contractor could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Contractors->Customers->find('list', ['limit' => 200]);
        $this->set(compact('contractor', 'customers'));
        $this->set('_serialize', ['contractor']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Contractor id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $contractor = $this->Contractors->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contractor = $this->Contractors->patchEntity($contractor, $this->request->data);
            if ($this->Contractors->save($contractor)) {
                $this->Flash->success(__('The contractor has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The contractor could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Contractors->Customers->find('list', ['limit' => 200]);
        $this->set(compact('contractor', 'customers'));
        $this->set('_serialize', ['contractor']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Contractor id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contractor = $this->Contractors->get($id);
        if ($this->Contractors->delete($contractor)) {
            $this->Flash->success(__('The contractor has been deleted.'));
        } else {
            $this->Flash->error(__('The contractor could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
