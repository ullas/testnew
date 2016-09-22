<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Gpsdata Controller
 *
 * @property \App\Model\Table\GpsdataTable $Gpsdata
 */
class GpsdataController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Trackingobjects', 'Customers', 'Devices', 'Eventtypes']
        ];
        $gpsdata = $this->paginate($this->Gpsdata);

        $this->set(compact('gpsdata'));
        $this->set('_serialize', ['gpsdata']);
    }

    /**
     * View method
     *
     * @param string|null $id Gpsdata id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $gpsdata = $this->Gpsdata->get($id, [
            'contain' => ['Trackingobjects', 'Customers', 'Devices', 'Eventtypes']
        ]);

        $this->set('gpsdata', $gpsdata);
        $this->set('_serialize', ['gpsdata']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $gpsdata = $this->Gpsdata->newEntity();
        if ($this->request->is('post')) {
            $gpsdata = $this->Gpsdata->patchEntity($gpsdata, $this->request->data);
            if ($this->Gpsdata->save($gpsdata)) {
                $this->Flash->success(__('The gpsdata has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The gpsdata could not be saved. Please, try again.'));
            }
        }
        $trackingobjects = $this->Gpsdata->Trackingobjects->find('list', ['limit' => 200]);
        $customers = $this->Gpsdata->Customers->find('list', ['limit' => 200]);
        $devices = $this->Gpsdata->Devices->find('list', ['limit' => 200]);
        $eventtypes = $this->Gpsdata->Eventtypes->find('list', ['limit' => 200]);
        $this->set(compact('gpsdata', 'trackingobjects', 'customers', 'devices', 'eventtypes'));
        $this->set('_serialize', ['gpsdata']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Gpsdata id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $gpsdata = $this->Gpsdata->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $gpsdata = $this->Gpsdata->patchEntity($gpsdata, $this->request->data);
            if ($this->Gpsdata->save($gpsdata)) {
                $this->Flash->success(__('The gpsdata has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The gpsdata could not be saved. Please, try again.'));
            }
        }
        $trackingobjects = $this->Gpsdata->Trackingobjects->find('list', ['limit' => 200]);
        $customers = $this->Gpsdata->Customers->find('list', ['limit' => 200]);
        $devices = $this->Gpsdata->Devices->find('list', ['limit' => 200]);
        $eventtypes = $this->Gpsdata->Eventtypes->find('list', ['limit' => 200]);
        $this->set(compact('gpsdata', 'trackingobjects', 'customers', 'devices', 'eventtypes'));
        $this->set('_serialize', ['gpsdata']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Gpsdata id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $gpsdata = $this->Gpsdata->get($id);
        if ($this->Gpsdata->delete($gpsdata)) {
            $this->Flash->success(__('The gpsdata has been deleted.'));
        } else {
            $this->Flash->error(__('The gpsdata could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
