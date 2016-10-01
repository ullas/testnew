<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Trackingobjects Controller
 *
 * @property \App\Model\Table\TrackingobjectsTable $Trackingobjects
 */
class TrackingobjectsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Assettypes', 'Customers']
        ];
        $trackingobjects = $this->paginate($this->Trackingobjects);

        $this->set(compact('trackingobjects'));
        $this->set('_serialize', ['trackingobjects']);
    }

    /**
     * View method
     *
     * @param string|null $id Trackingobject id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $trackingobject = $this->Trackingobjects->get($id, [
            'contain' => ['Assettypes', 'Customers', 'Groups', 'Gpsdata', 'Vehicles']
        ]);

        $this->set('trackingobject', $trackingobject);
        $this->set('_serialize', ['trackingobject']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $trackingobject = $this->Trackingobjects->newEntity();
        if ($this->request->is('post')) {
            $trackingobject = $this->Trackingobjects->patchEntity($trackingobject, $this->request->data);
            $trackingobject['customer_id']=$this->currentuser['customer_id'];
            if ($this->Trackingobjects->save($trackingobject)) {
                $this->Flash->success(__('The trackingobject has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The trackingobject could not be saved. Please, try again.'));
            }
        }
        $assettypes = $this->Trackingobjects->Assettypes->find('list', ['limit' => 200]);
        $customers = $this->Trackingobjects->Customers->find('list', ['limit' => 200]);
        $groups = $this->Trackingobjects->Groups->find('list', ['limit' => 200]);
        $this->set(compact('trackingobject', 'assettypes', 'customers', 'groups'));
        $this->set('_serialize', ['trackingobject']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Trackingobject id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $trackingobject = $this->Trackingobjects->get($id, [
            'contain' => ['Groups']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $trackingobject = $this->Trackingobjects->patchEntity($trackingobject, $this->request->data);
            if ($this->Trackingobjects->save($trackingobject)) {
                $this->Flash->success(__('The trackingobject has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The trackingobject could not be saved. Please, try again.'));
            }
        }
        $assettypes = $this->Trackingobjects->Assettypes->find('list', ['limit' => 200]);
        $customers = $this->Trackingobjects->Customers->find('list', ['limit' => 200]);
        $groups = $this->Trackingobjects->Groups->find('list', ['limit' => 200]);
        $this->set(compact('trackingobject', 'assettypes', 'customers', 'groups'));
        $this->set('_serialize', ['trackingobject']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Trackingobject id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $trackingobject = $this->Trackingobjects->get($id);
        if ($this->Trackingobjects->delete($trackingobject)) {
            $this->Flash->success(__('The trackingobject has been deleted.'));
        } else {
            $this->Flash->error(__('The trackingobject could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
