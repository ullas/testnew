<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Servicetasks Controller
 *
 * @property \App\Model\Table\ServicetasksTable $Servicetasks
 */
class ServicetasksController extends AppController
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
        $servicetasks = $this->paginate($this->Servicetasks);

        $this->set(compact('servicetasks'));
        $this->set('_serialize', ['servicetasks']);
    }

    /**
     * View method
     *
     * @param string|null $id Servicetask id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $servicetask = $this->Servicetasks->get($id, [
            'contain' => ['Customers', 'Servicereminders']
        ]);

        $this->set('servicetask', $servicetask);
        $this->set('_serialize', ['servicetask']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $servicetask = $this->Servicetasks->newEntity();
        if ($this->request->is('post')) {
            $servicetask = $this->Servicetasks->patchEntity($servicetask, $this->request->data);
            if ($this->Servicetasks->save($servicetask)) {
                $this->Flash->success(__('The servicetask has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The servicetask could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Servicetasks->Customers->find('list', ['limit' => 200]);
        $this->set(compact('servicetask', 'customers'));
        $this->set('_serialize', ['servicetask']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Servicetask id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $servicetask = $this->Servicetasks->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $servicetask = $this->Servicetasks->patchEntity($servicetask, $this->request->data);
            if ($this->Servicetasks->save($servicetask)) {
                $this->Flash->success(__('The servicetask has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The servicetask could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Servicetasks->Customers->find('list', ['limit' => 200]);
        $this->set(compact('servicetask', 'customers'));
        $this->set('_serialize', ['servicetask']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Servicetask id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $servicetask = $this->Servicetasks->get($id);
        if ($this->Servicetasks->delete($servicetask)) {
            $this->Flash->success(__('The servicetask has been deleted.'));
        } else {
            $this->Flash->error(__('The servicetask could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
