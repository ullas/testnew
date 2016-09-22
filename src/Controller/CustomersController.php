<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Customers Controller
 *
 * @property \App\Model\Table\CustomersTable $Customers
 */
class CustomersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Mapregions', 'Customertypes']
        ];
        $customers = $this->paginate($this->Customers);

        $this->set(compact('customers'));
        $this->set('_serialize', ['customers']);
    }

    /**
     * View method
     *
     * @param string|null $id Customer id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $customer = $this->Customers->get($id, [
            'contain' => ['Mapregions', 'Customertypes', 'Addresses', 'Contractors', 'Departments', 'Devices', 'Distributionlists', 'Drivers', 'Fences', 'Gpsdata', 'Ibuttons', 'Inspections', 'Issues', 'Jobs', 'Locations', 'Manufacturers', 'Measurementunits', 'Ownerships', 'Partcategories', 'Passengergroups', 'Passengers', 'Providers', 'Purposes', 'Renewalreminders', 'Renewalstypes', 'Rfids', 'Routes', 'Schedules', 'Servicereminders', 'Servicetasks', 'Stations', 'Subscriptions', 'Symbols', 'Templates', 'Templatetypes', 'Timepolicies', 'Trackingobjects', 'Trips', 'Users', 'Vehiclecategories', 'Vehiclestatuses', 'Vehicletypes', 'Vendors', 'Worklorderlineitems', 'Workorderdocuments', 'Workorderstatuses', 'Zonetypes']
        ]);

        $this->set('customer', $customer);
        $this->set('_serialize', ['customer']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $customer = $this->Customers->newEntity();
        if ($this->request->is('post')) {
            $customer = $this->Customers->patchEntity($customer, $this->request->data);
            if ($this->Customers->save($customer)) {
                $this->Flash->success(__('The customer has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The customer could not be saved. Please, try again.'));
            }
        }
        $mapregions = $this->Customers->Mapregions->find('list', ['limit' => 200]);
        $customertypes = $this->Customers->Customertypes->find('list', ['limit' => 200]);
        $this->set(compact('customer', 'mapregions', 'customertypes'));
        $this->set('_serialize', ['customer']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Customer id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $customer = $this->Customers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $customer = $this->Customers->patchEntity($customer, $this->request->data);
            if ($this->Customers->save($customer)) {
                $this->Flash->success(__('The customer has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The customer could not be saved. Please, try again.'));
            }
        }
        $mapregions = $this->Customers->Mapregions->find('list', ['limit' => 200]);
        $customertypes = $this->Customers->Customertypes->find('list', ['limit' => 200]);
        $this->set(compact('customer', 'mapregions', 'customertypes'));
        $this->set('_serialize', ['customer']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Customer id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $customer = $this->Customers->get($id);
        if ($this->Customers->delete($customer)) {
            $this->Flash->success(__('The customer has been deleted.'));
        } else {
            $this->Flash->error(__('The customer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
