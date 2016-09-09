<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Vehiclespecifications Controller
 *
 * @property \App\Model\Table\VehiclespecificationsTable $Vehiclespecifications
 */
class VehiclespecificationsController extends AppController
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
        $vehiclespecifications = $this->paginate($this->Vehiclespecifications);

        $this->set(compact('vehiclespecifications'));
        $this->set('_serialize', ['vehiclespecifications']);
    }

    /**
     * View method
     *
     * @param string|null $id Vehiclespecification id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $vehiclespecification = $this->Vehiclespecifications->get($id, [
            'contain' => ['Vehicles']
        ]);

        $this->set('vehiclespecification', $vehiclespecification);
        $this->set('_serialize', ['vehiclespecification']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $vehiclespecification = $this->Vehiclespecifications->newEntity();
        if ($this->request->is('post')) {
            $vehiclespecification = $this->Vehiclespecifications->patchEntity($vehiclespecification, $this->request->data);
            if ($this->Vehiclespecifications->save($vehiclespecification)) {
                $this->Flash->success(__('The vehiclespecification has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The vehiclespecification could not be saved. Please, try again.'));
            }
        }
        $vehicles = $this->Vehiclespecifications->Vehicles->find('list', ['limit' => 200]);
        $this->set(compact('vehiclespecification', 'vehicles'));
        $this->set('_serialize', ['vehiclespecification']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Vehiclespecification id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $vehiclespecification = $this->Vehiclespecifications->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $vehiclespecification = $this->Vehiclespecifications->patchEntity($vehiclespecification, $this->request->data);
            if ($this->Vehiclespecifications->save($vehiclespecification)) {
                $this->Flash->success(__('The vehiclespecification has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The vehiclespecification could not be saved. Please, try again.'));
            }
        }
        $vehicles = $this->Vehiclespecifications->Vehicles->find('list', ['limit' => 200]);
        $this->set(compact('vehiclespecification', 'vehicles'));
        $this->set('_serialize', ['vehiclespecification']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Vehiclespecification id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $vehiclespecification = $this->Vehiclespecifications->get($id);
        if ($this->Vehiclespecifications->delete($vehiclespecification)) {
            $this->Flash->success(__('The vehiclespecification has been deleted.'));
        } else {
            $this->Flash->error(__('The vehiclespecification could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
