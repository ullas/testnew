<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Vehicletypes Controller
 *
 * @property \App\Model\Table\VehicletypesTable $Vehicletypes
 */
class VehicletypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $vehicletypes = $this->paginate($this->Vehicletypes);

        $this->set(compact('vehicletypes'));
        $this->set('_serialize', ['vehicletypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Vehicletype id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $vehicletype = $this->Vehicletypes->get($id, [
            'contain' => ['Vehicles']
        ]);

        $this->set('vehicletype', $vehicletype);
        $this->set('_serialize', ['vehicletype']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $vehicletype = $this->Vehicletypes->newEntity();
        if ($this->request->is('post')) {
            $vehicletype = $this->Vehicletypes->patchEntity($vehicletype, $this->request->data);
            if ($this->Vehicletypes->save($vehicletype)) {
                $this->Flash->success(__('The vehicletype has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The vehicletype could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('vehicletype'));
        $this->set('_serialize', ['vehicletype']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Vehicletype id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $vehicletype = $this->Vehicletypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $vehicletype = $this->Vehicletypes->patchEntity($vehicletype, $this->request->data);
            if ($this->Vehicletypes->save($vehicletype)) {
                $this->Flash->success(__('The vehicletype has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The vehicletype could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('vehicletype'));
        $this->set('_serialize', ['vehicletype']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Vehicletype id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $vehicletype = $this->Vehicletypes->get($id);
        if ($this->Vehicletypes->delete($vehicletype)) {
            $this->Flash->success(__('The vehicletype has been deleted.'));
        } else {
            $this->Flash->error(__('The vehicletype could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
