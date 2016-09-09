<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Servicereminders Controller
 *
 * @property \App\Model\Table\ServiceremindersTable $Servicereminders
 */
class ServiceremindersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Servicetasks', 'Distributionlists', 'Groups', 'Customers']
        ];
        $servicereminders = $this->paginate($this->Servicereminders);

        $this->set(compact('servicereminders'));
        $this->set('_serialize', ['servicereminders']);
    }

    /**
     * View method
     *
     * @param string|null $id Servicereminder id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $servicereminder = $this->Servicereminders->get($id, [
            'contain' => ['Servicetasks', 'Distributionlists', 'Groups', 'Customers']
        ]);

        $this->set('servicereminder', $servicereminder);
        $this->set('_serialize', ['servicereminder']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $servicereminder = $this->Servicereminders->newEntity();
        if ($this->request->is('post')) {
            $servicereminder = $this->Servicereminders->patchEntity($servicereminder, $this->request->data);
            if ($this->Servicereminders->save($servicereminder)) {
                $this->Flash->success(__('The servicereminder has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The servicereminder could not be saved. Please, try again.'));
            }
        }
        $servicetasks = $this->Servicereminders->Servicetasks->find('list', ['limit' => 200]);
        $distributionlists = $this->Servicereminders->Distributionlists->find('list', ['limit' => 200]);
        $groups = $this->Servicereminders->Groups->find('list', ['limit' => 200]);
        $customers = $this->Servicereminders->Customers->find('list', ['limit' => 200]);
        $this->set(compact('servicereminder', 'servicetasks', 'distributionlists', 'groups', 'customers'));
        $this->set('_serialize', ['servicereminder']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Servicereminder id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $servicereminder = $this->Servicereminders->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $servicereminder = $this->Servicereminders->patchEntity($servicereminder, $this->request->data);
            if ($this->Servicereminders->save($servicereminder)) {
                $this->Flash->success(__('The servicereminder has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The servicereminder could not be saved. Please, try again.'));
            }
        }
        $servicetasks = $this->Servicereminders->Servicetasks->find('list', ['limit' => 200]);
        $distributionlists = $this->Servicereminders->Distributionlists->find('list', ['limit' => 200]);
        $groups = $this->Servicereminders->Groups->find('list', ['limit' => 200]);
        $customers = $this->Servicereminders->Customers->find('list', ['limit' => 200]);
        $this->set(compact('servicereminder', 'servicetasks', 'distributionlists', 'groups', 'customers'));
        $this->set('_serialize', ['servicereminder']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Servicereminder id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $servicereminder = $this->Servicereminders->get($id);
        if ($this->Servicereminders->delete($servicereminder)) {
            $this->Flash->success(__('The servicereminder has been deleted.'));
        } else {
            $this->Flash->error(__('The servicereminder could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
