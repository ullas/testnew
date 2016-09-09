<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Vehiclegroups Controller
 *
 * @property \App\Model\Table\VehiclegroupsTable $Vehiclegroups
 */
class VehiclegroupsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Defaultvehicles']
        ];
        $vehiclegroups = $this->paginate($this->Vehiclegroups);

        $this->set(compact('vehiclegroups'));
        $this->set('_serialize', ['vehiclegroups']);
    }

    /**
     * View method
     *
     * @param string|null $id Vehiclegroup id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $vehiclegroup = $this->Vehiclegroups->get($id, [
            'contain' => ['Defaultvehicles']
        ]);

        $this->set('vehiclegroup', $vehiclegroup);
        $this->set('_serialize', ['vehiclegroup']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $vehiclegroup = $this->Vehiclegroups->newEntity();
        if ($this->request->is('post')) {
            $vehiclegroup = $this->Vehiclegroups->patchEntity($vehiclegroup, $this->request->data);
            if ($this->Vehiclegroups->save($vehiclegroup)) {
                $this->Flash->success(__('The vehiclegroup has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The vehiclegroup could not be saved. Please, try again.'));
            }
        }
        $defaultvehicles = $this->Vehiclegroups->Defaultvehicles->find('list', ['limit' => 200]);
        $this->set(compact('vehiclegroup', 'defaultvehicles'));
        $this->set('_serialize', ['vehiclegroup']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Vehiclegroup id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $vehiclegroup = $this->Vehiclegroups->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $vehiclegroup = $this->Vehiclegroups->patchEntity($vehiclegroup, $this->request->data);
            if ($this->Vehiclegroups->save($vehiclegroup)) {
                $this->Flash->success(__('The vehiclegroup has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The vehiclegroup could not be saved. Please, try again.'));
            }
        }
        $defaultvehicles = $this->Vehiclegroups->Defaultvehicles->find('list', ['limit' => 200]);
        $this->set(compact('vehiclegroup', 'defaultvehicles'));
        $this->set('_serialize', ['vehiclegroup']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Vehiclegroup id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $vehiclegroup = $this->Vehiclegroups->get($id);
        if ($this->Vehiclegroups->delete($vehiclegroup)) {
            $this->Flash->success(__('The vehiclegroup has been deleted.'));
        } else {
            $this->Flash->error(__('The vehiclegroup could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
