<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Vehiclefluids Controller
 *
 * @property \App\Model\Table\VehiclefluidsTable $Vehiclefluids
 */
class VehiclefluidsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Vehicles']
        ];
        $vehiclefluids = $this->paginate($this->Vehiclefluids);

        $this->set(compact('vehiclefluids'));
        $this->set('_serialize', ['vehiclefluids']);
    }

    /**
     * View method
     *
     * @param string|null $id Vehiclefluid id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $vehiclefluid = $this->Vehiclefluids->get($id, [
            'contain' => ['Vehicles']
        ]);

        $this->set('vehiclefluid', $vehiclefluid);
        $this->set('_serialize', ['vehiclefluid']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $vehiclefluid = $this->Vehiclefluids->newEntity();
        if ($this->request->is('post')) {
            $vehiclefluid = $this->Vehiclefluids->patchEntity($vehiclefluid, $this->request->data);
            if ($this->Vehiclefluids->save($vehiclefluid)) {
                $this->Flash->success(__('The vehiclefluid has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The vehiclefluid could not be saved. Please, try again.'));
            }
        }
        $vehicles = $this->Vehiclefluids->Vehicles->find('list', ['limit' => 200]);
        $this->set(compact('vehiclefluid', 'vehicles'));
        $this->set('_serialize', ['vehiclefluid']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Vehiclefluid id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $vehiclefluid = $this->Vehiclefluids->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $vehiclefluid = $this->Vehiclefluids->patchEntity($vehiclefluid, $this->request->data);
            if ($this->Vehiclefluids->save($vehiclefluid)) {
                $this->Flash->success(__('The vehiclefluid has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The vehiclefluid could not be saved. Please, try again.'));
            }
        }
        $vehicles = $this->Vehiclefluids->Vehicles->find('list', ['limit' => 200]);
        $this->set(compact('vehiclefluid', 'vehicles'));
        $this->set('_serialize', ['vehiclefluid']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Vehiclefluid id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $vehiclefluid = $this->Vehiclefluids->get($id);
        if ($this->Vehiclefluids->delete($vehiclefluid)) {
            $this->Flash->success(__('The vehiclefluid has been deleted.'));
        } else {
            $this->Flash->error(__('The vehiclefluid could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
