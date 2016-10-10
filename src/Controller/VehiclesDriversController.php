<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * VehiclesDrivers Controller
 *
 * @property \App\Model\Table\VehiclesDriversTable $VehiclesDrivers
 */
class VehiclesDriversController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Vehicles', 'Drivers', 'Customers', 'DefaultDrivers', 'DefaultVehs']
        ];
        $vehiclesDrivers = $this->paginate($this->VehiclesDrivers);

        $this->set(compact('vehiclesDrivers'));
        $this->set('_serialize', ['vehiclesDrivers']);
    }

    /**
     * View method
     *
     * @param string|null $id Vehicles Driver id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $vehiclesDriver = $this->VehiclesDrivers->get($id, [
            'contain' => ['Vehicles', 'Drivers', 'Customers', 'DefaultDrivers', 'DefaultVehs']
        ]);

        $this->set('vehiclesDriver', $vehiclesDriver);
        $this->set('_serialize', ['vehiclesDriver']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $vehiclesDriver = $this->VehiclesDrivers->newEntity();
        if ($this->request->is('post')) {
            $vehiclesDriver = $this->VehiclesDrivers->patchEntity($vehiclesDriver, $this->request->data);
            $vehiclesDriver['customer_id']=$this->currentuser['customer_id'];
            if ($this->VehiclesDrivers->save($vehiclesDriver)) {
                $this->Flash->success(__('The vehicles driver has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The vehicles driver could not be saved. Please, try again.'));
            }
        }
        $vehicles = $this->VehiclesDrivers->Vehicles->find('list', ['limit' => 200]);
        $drivers = $this->VehiclesDrivers->Drivers->find('list', ['limit' => 200]);
        $customers = $this->VehiclesDrivers->Customers->find('list', ['limit' => 200]);
        $defaultDrivers = $this->VehiclesDrivers->DefaultDrivers->find('list', ['limit' => 200]);
        $defaultVehs = $this->VehiclesDrivers->DefaultVehs->find('list', ['limit' => 200]);
        $this->set(compact('vehiclesDriver', 'vehicles', 'drivers', 'customers', 'defaultDrivers', 'defaultVehs'));
        $this->set('_serialize', ['vehiclesDriver']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Vehicles Driver id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $vehiclesDriver = $this->VehiclesDrivers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $vehiclesDriver = $this->VehiclesDrivers->patchEntity($vehiclesDriver, $this->request->data);
            if ($this->VehiclesDrivers->save($vehiclesDriver)) {
                $this->Flash->success(__('The vehicles driver has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The vehicles driver could not be saved. Please, try again.'));
            }
        }
        $vehicles = $this->VehiclesDrivers->Vehicles->find('list', ['limit' => 200]);
        $drivers = $this->VehiclesDrivers->Drivers->find('list', ['limit' => 200]);
        $customers = $this->VehiclesDrivers->Customers->find('list', ['limit' => 200]);
        $defaultDrivers = $this->VehiclesDrivers->DefaultDrivers->find('list', ['limit' => 200]);
        $defaultVehs = $this->VehiclesDrivers->DefaultVehs->find('list', ['limit' => 200]);
        $this->set(compact('vehiclesDriver', 'vehicles', 'drivers', 'customers', 'defaultDrivers', 'defaultVehs'));
        $this->set('_serialize', ['vehiclesDriver']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Vehicles Driver id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $vehiclesDriver = $this->VehiclesDrivers->get($id);
        if ($this->VehiclesDrivers->delete($vehiclesDriver)) {
            $this->Flash->success(__('The vehicles driver has been deleted.'));
        } else {
            $this->Flash->error(__('The vehicles driver could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
