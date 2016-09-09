<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Jobs Controller
 *
 * @property \App\Model\Table\JobsTable $Jobs
 */
class JobsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Trackingobjects', 'Customers', 'Timepolicies', 'Templates', 'Locations']
        ];
        $jobs = $this->paginate($this->Jobs);

        $this->set(compact('jobs'));
        $this->set('_serialize', ['jobs']);
    }

    /**
     * View method
     *
     * @param string|null $id Job id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $job = $this->Jobs->get($id, [
            'contain' => ['Trackingobjects', 'Customers', 'Timepolicies', 'Templates', 'Locations']
        ]);

        $this->set('job', $job);
        $this->set('_serialize', ['job']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $job = $this->Jobs->newEntity();
        if ($this->request->is('post')) {
            $job = $this->Jobs->patchEntity($job, $this->request->data);
            if ($this->Jobs->save($job)) {
                $this->Flash->success(__('The job has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The job could not be saved. Please, try again.'));
            }
        }
        $trackingobjects = $this->Jobs->Trackingobjects->find('list', ['limit' => 200]);
        $customers = $this->Jobs->Customers->find('list', ['limit' => 200]);
        $timepolicies = $this->Jobs->Timepolicies->find('list', ['limit' => 200]);
        $templates = $this->Jobs->Templates->find('list', ['limit' => 200]);
        $locations = $this->Jobs->Locations->find('list', ['limit' => 200]);
        $this->set(compact('job', 'trackingobjects', 'customers', 'timepolicies', 'templates', 'locations'));
        $this->set('_serialize', ['job']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Job id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $job = $this->Jobs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $job = $this->Jobs->patchEntity($job, $this->request->data);
            if ($this->Jobs->save($job)) {
                $this->Flash->success(__('The job has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The job could not be saved. Please, try again.'));
            }
        }
        $trackingobjects = $this->Jobs->Trackingobjects->find('list', ['limit' => 200]);
        $customers = $this->Jobs->Customers->find('list', ['limit' => 200]);
        $timepolicies = $this->Jobs->Timepolicies->find('list', ['limit' => 200]);
        $templates = $this->Jobs->Templates->find('list', ['limit' => 200]);
        $locations = $this->Jobs->Locations->find('list', ['limit' => 200]);
        $this->set(compact('job', 'trackingobjects', 'customers', 'timepolicies', 'templates', 'locations'));
        $this->set('_serialize', ['job']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Job id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $job = $this->Jobs->get($id);
        if ($this->Jobs->delete($job)) {
            $this->Flash->success(__('The job has been deleted.'));
        } else {
            $this->Flash->error(__('The job could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
