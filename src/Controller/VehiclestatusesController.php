<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Vehiclestatuses Controller
 *
 * @property \App\Model\Table\VehiclestatusesTable $Vehiclestatuses
 */
class VehiclestatusesController extends AppController
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
        $vehiclestatuses = $this->paginate($this->Vehiclestatuses);

        $this->set(compact('vehiclestatuses'));
        $this->set('_serialize', ['vehiclestatuses']);
    }

    /**
     * View method
     *
     * @param string|null $id Vehiclestatus id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $vehiclestatus = $this->Vehiclestatuses->get($id, [
            'contain' => ['Customers', 'Vehicles']
        ]);

        $this->set('vehiclestatus', $vehiclestatus);
        $this->set('_serialize', ['vehiclestatus']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $vehiclestatus = $this->Vehiclestatuses->newEntity();
        if ($this->request->is('post')) {
            $vehiclestatus = $this->Vehiclestatuses->patchEntity($vehiclestatus, $this->request->data);
            if ($this->Vehiclestatuses->save($vehiclestatus)) {
                $this->Flash->success(__('The vehiclestatus has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The vehiclestatus could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Vehiclestatuses->Customers->find('list', ['limit' => 200]);
        $this->set(compact('vehiclestatus', 'customers'));
        $this->set('_serialize', ['vehiclestatus']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Vehiclestatus id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $vehiclestatus = $this->Vehiclestatuses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $vehiclestatus = $this->Vehiclestatuses->patchEntity($vehiclestatus, $this->request->data);
            if ($this->Vehiclestatuses->save($vehiclestatus)) {
                $this->Flash->success(__('The vehiclestatus has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The vehiclestatus could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Vehiclestatuses->Customers->find('list', ['limit' => 200]);
        $this->set(compact('vehiclestatus', 'customers'));
        $this->set('_serialize', ['vehiclestatus']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Vehiclestatus id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $vehiclestatus = $this->Vehiclestatuses->get($id);
        if ($this->Vehiclestatuses->delete($vehiclestatus)) {
            $this->Flash->success(__('The vehiclestatus has been deleted.'));
        } else {
            $this->Flash->error(__('The vehiclestatus could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
