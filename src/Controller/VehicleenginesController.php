<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Vehicleengines Controller
 *
 * @property \App\Model\Table\VehicleenginesTable $Vehicleengines
 */
class VehicleenginesController extends AppController
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
        $vehicleengines = $this->paginate($this->Vehicleengines);

        $this->set(compact('vehicleengines'));
        $this->set('_serialize', ['vehicleengines']);
    }

    /**
     * View method
     *
     * @param string|null $id Vehicleengine id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $vehicleengine = $this->Vehicleengines->get($id, [
            'contain' => ['Vehicles']
        ]);

        $this->set('vehicleengine', $vehicleengine);
        $this->set('_serialize', ['vehicleengine']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $vehicleengine = $this->Vehicleengines->newEntity();
        if ($this->request->is('post')) {
            $vehicleengine = $this->Vehicleengines->patchEntity($vehicleengine, $this->request->data);
            if ($this->Vehicleengines->save($vehicleengine)) {
                $this->Flash->success(__('The vehicleengine has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The vehicleengine could not be saved. Please, try again.'));
            }
        }
        $vehicles = $this->Vehicleengines->Vehicles->find('list', ['limit' => 200]);
        $this->set(compact('vehicleengine', 'vehicles'));
        $this->set('_serialize', ['vehicleengine']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Vehicleengine id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $vehicleengine = $this->Vehicleengines->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $vehicleengine = $this->Vehicleengines->patchEntity($vehicleengine, $this->request->data);
            if ($this->Vehicleengines->save($vehicleengine)) {
                $this->Flash->success(__('The vehicleengine has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The vehicleengine could not be saved. Please, try again.'));
            }
        }
        $vehicles = $this->Vehicleengines->Vehicles->find('list', ['limit' => 200]);
        $this->set(compact('vehicleengine', 'vehicles'));
        $this->set('_serialize', ['vehicleengine']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Vehicleengine id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $vehicleengine = $this->Vehicleengines->get($id);
        if ($this->Vehicleengines->delete($vehicleengine)) {
            $this->Flash->success(__('The vehicleengine has been deleted.'));
        } else {
            $this->Flash->error(__('The vehicleengine could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
