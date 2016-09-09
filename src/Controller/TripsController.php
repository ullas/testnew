<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Trips Controller
 *
 * @property \App\Model\Table\TripsTable $Trips
 */
class TripsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Customers', 'Vehicles', 'Timepolicies', 'Routes', 'Startpoints', 'Endpoints', 'Schedules', 'Passengergroups', 'Tripstatuses', 'Vehiclecategories']
        ];
        $trips = $this->paginate($this->Trips);

        $this->set(compact('trips'));
        $this->set('_serialize', ['trips']);
    }

    /**
     * View method
     *
     * @param string|null $id Trip id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $trip = $this->Trips->get($id, [
            'contain' => ['Customers', 'Vehicles', 'Timepolicies', 'Routes', 'Startpoints', 'Endpoints', 'Schedules', 'Passengergroups', 'Tripstatuses', 'Vehiclecategories']
        ]);

        $this->set('trip', $trip);
        $this->set('_serialize', ['trip']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $trip = $this->Trips->newEntity();
        if ($this->request->is('post')) {
            $trip = $this->Trips->patchEntity($trip, $this->request->data);
            if ($this->Trips->save($trip)) {
                $this->Flash->success(__('The trip has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The trip could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Trips->Customers->find('list', ['limit' => 200]);
        $vehicles = $this->Trips->Vehicles->find('list', ['limit' => 200]);
        $timepolicies = $this->Trips->Timepolicies->find('list', ['limit' => 200]);
        $routes = $this->Trips->Routes->find('list', ['limit' => 200]);
        $startpoints = $this->Trips->Startpoints->find('list', ['limit' => 200]);
        $endpoints = $this->Trips->Endpoints->find('list', ['limit' => 200]);
        $schedules = $this->Trips->Schedules->find('list', ['limit' => 200]);
        $passengergroups = $this->Trips->Passengergroups->find('list', ['limit' => 200]);
        $tripstatuses = $this->Trips->Tripstatuses->find('list', ['limit' => 200]);
        $vehiclecategories = $this->Trips->Vehiclecategories->find('list', ['limit' => 200]);
        $this->set(compact('trip', 'customers', 'vehicles', 'timepolicies', 'routes', 'startpoints', 'endpoints', 'schedules', 'passengergroups', 'tripstatuses', 'vehiclecategories'));
        $this->set('_serialize', ['trip']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Trip id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $trip = $this->Trips->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $trip = $this->Trips->patchEntity($trip, $this->request->data);
            if ($this->Trips->save($trip)) {
                $this->Flash->success(__('The trip has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The trip could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Trips->Customers->find('list', ['limit' => 200]);
        $vehicles = $this->Trips->Vehicles->find('list', ['limit' => 200]);
        $timepolicies = $this->Trips->Timepolicies->find('list', ['limit' => 200]);
        $routes = $this->Trips->Routes->find('list', ['limit' => 200]);
        $startpoints = $this->Trips->Startpoints->find('list', ['limit' => 200]);
        $endpoints = $this->Trips->Endpoints->find('list', ['limit' => 200]);
        $schedules = $this->Trips->Schedules->find('list', ['limit' => 200]);
        $passengergroups = $this->Trips->Passengergroups->find('list', ['limit' => 200]);
        $tripstatuses = $this->Trips->Tripstatuses->find('list', ['limit' => 200]);
        $vehiclecategories = $this->Trips->Vehiclecategories->find('list', ['limit' => 200]);
        $this->set(compact('trip', 'customers', 'vehicles', 'timepolicies', 'routes', 'startpoints', 'endpoints', 'schedules', 'passengergroups', 'tripstatuses', 'vehiclecategories'));
        $this->set('_serialize', ['trip']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Trip id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $trip = $this->Trips->get($id);
        if ($this->Trips->delete($trip)) {
            $this->Flash->success(__('The trip has been deleted.'));
        } else {
            $this->Flash->error(__('The trip could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
