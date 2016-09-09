<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Vehicleoperationslimit Controller
 *
 * @property \App\Model\Table\VehicleoperationslimitTable $Vehicleoperationslimit
 */
class VehicleoperationslimitController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Vehices', 'IButtons']
        ];
        $vehicleoperationslimit = $this->paginate($this->Vehicleoperationslimit);

        $this->set(compact('vehicleoperationslimit'));
        $this->set('_serialize', ['vehicleoperationslimit']);
    }

    /**
     * View method
     *
     * @param string|null $id Vehicleoperationslimit id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $vehicleoperationslimit = $this->Vehicleoperationslimit->get($id, [
            'contain' => ['Vehices', 'IButtons']
        ]);

        $this->set('vehicleoperationslimit', $vehicleoperationslimit);
        $this->set('_serialize', ['vehicleoperationslimit']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $vehicleoperationslimit = $this->Vehicleoperationslimit->newEntity();
        if ($this->request->is('post')) {
            $vehicleoperationslimit = $this->Vehicleoperationslimit->patchEntity($vehicleoperationslimit, $this->request->data);
            if ($this->Vehicleoperationslimit->save($vehicleoperationslimit)) {
                $this->Flash->success(__('The vehicleoperationslimit has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The vehicleoperationslimit could not be saved. Please, try again.'));
            }
        }
        $vehices = $this->Vehicleoperationslimit->Vehices->find('list', ['limit' => 200]);
        $iButtons = $this->Vehicleoperationslimit->IButtons->find('list', ['limit' => 200]);
        $this->set(compact('vehicleoperationslimit', 'vehices', 'iButtons'));
        $this->set('_serialize', ['vehicleoperationslimit']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Vehicleoperationslimit id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $vehicleoperationslimit = $this->Vehicleoperationslimit->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $vehicleoperationslimit = $this->Vehicleoperationslimit->patchEntity($vehicleoperationslimit, $this->request->data);
            if ($this->Vehicleoperationslimit->save($vehicleoperationslimit)) {
                $this->Flash->success(__('The vehicleoperationslimit has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The vehicleoperationslimit could not be saved. Please, try again.'));
            }
        }
        $vehices = $this->Vehicleoperationslimit->Vehices->find('list', ['limit' => 200]);
        $iButtons = $this->Vehicleoperationslimit->IButtons->find('list', ['limit' => 200]);
        $this->set(compact('vehicleoperationslimit', 'vehices', 'iButtons'));
        $this->set('_serialize', ['vehicleoperationslimit']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Vehicleoperationslimit id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $vehicleoperationslimit = $this->Vehicleoperationslimit->get($id);
        if ($this->Vehicleoperationslimit->delete($vehicleoperationslimit)) {
            $this->Flash->success(__('The vehicleoperationslimit has been deleted.'));
        } else {
            $this->Flash->error(__('The vehicleoperationslimit could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
