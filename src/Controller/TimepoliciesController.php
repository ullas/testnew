<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Timepolicies Controller
 *
 * @property \App\Model\Table\TimepoliciesTable $Timepolicies
 */
class TimepoliciesController extends AppController
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
        $timepolicies = $this->paginate($this->Timepolicies);

        $this->set(compact('timepolicies'));
        $this->set('_serialize', ['timepolicies']);
    }

    /**
     * View method
     *
     * @param string|null $id Timepolicy id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $timepolicy = $this->Timepolicies->get($id, [
            'contain' => ['Customers', 'Schedules', 'Trips']
        ]);

        $this->set('timepolicy', $timepolicy);
        $this->set('_serialize', ['timepolicy']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $timepolicy = $this->Timepolicies->newEntity();
        if ($this->request->is('post')) {
            $timepolicy = $this->Timepolicies->patchEntity($timepolicy, $this->request->data);
            if ($this->Timepolicies->save($timepolicy)) {
                $this->Flash->success(__('The timepolicy has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The timepolicy could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Timepolicies->Customers->find('list', ['limit' => 200]);
        $this->set(compact('timepolicy', 'customers'));
        $this->set('_serialize', ['timepolicy']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Timepolicy id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $timepolicy = $this->Timepolicies->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $timepolicy = $this->Timepolicies->patchEntity($timepolicy, $this->request->data);
            if ($this->Timepolicies->save($timepolicy)) {
                $this->Flash->success(__('The timepolicy has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The timepolicy could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Timepolicies->Customers->find('list', ['limit' => 200]);
        $this->set(compact('timepolicy', 'customers'));
        $this->set('_serialize', ['timepolicy']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Timepolicy id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $timepolicy = $this->Timepolicies->get($id);
        if ($this->Timepolicies->delete($timepolicy)) {
            $this->Flash->success(__('The timepolicy has been deleted.'));
        } else {
            $this->Flash->error(__('The timepolicy could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
