<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Vehiclewheelstyres Controller
 *
 * @property \App\Model\Table\VehiclewheelstyresTable $Vehiclewheelstyres
 */
class VehiclewheelstyresController extends AppController
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
        $vehiclewheelstyres = $this->paginate($this->Vehiclewheelstyres);

        $this->set(compact('vehiclewheelstyres'));
        $this->set('_serialize', ['vehiclewheelstyres']);
    }

    /**
     * View method
     *
     * @param string|null $id Vehiclewheelstyre id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $vehiclewheelstyre = $this->Vehiclewheelstyres->get($id, [
            'contain' => ['Vehicles']
        ]);

        $this->set('vehiclewheelstyre', $vehiclewheelstyre);
        $this->set('_serialize', ['vehiclewheelstyre']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $vehiclewheelstyre = $this->Vehiclewheelstyres->newEntity();
        if ($this->request->is('post')) {
            $vehiclewheelstyre = $this->Vehiclewheelstyres->patchEntity($vehiclewheelstyre, $this->request->data);
            if ($this->Vehiclewheelstyres->save($vehiclewheelstyre)) {
                $this->Flash->success(__('The vehiclewheelstyre has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The vehiclewheelstyre could not be saved. Please, try again.'));
            }
        }
        $vehicles = $this->Vehiclewheelstyres->Vehicles->find('list', ['limit' => 200]);
        $this->set(compact('vehiclewheelstyre', 'vehicles'));
        $this->set('_serialize', ['vehiclewheelstyre']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Vehiclewheelstyre id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $vehiclewheelstyre = $this->Vehiclewheelstyres->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $vehiclewheelstyre = $this->Vehiclewheelstyres->patchEntity($vehiclewheelstyre, $this->request->data);
            if ($this->Vehiclewheelstyres->save($vehiclewheelstyre)) {
                $this->Flash->success(__('The vehiclewheelstyre has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The vehiclewheelstyre could not be saved. Please, try again.'));
            }
        }
        $vehicles = $this->Vehiclewheelstyres->Vehicles->find('list', ['limit' => 200]);
        $this->set(compact('vehiclewheelstyre', 'vehicles'));
        $this->set('_serialize', ['vehiclewheelstyre']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Vehiclewheelstyre id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $vehiclewheelstyre = $this->Vehiclewheelstyres->get($id);
        if ($this->Vehiclewheelstyres->delete($vehiclewheelstyre)) {
            $this->Flash->success(__('The vehiclewheelstyre has been deleted.'));
        } else {
            $this->Flash->error(__('The vehiclewheelstyre could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
