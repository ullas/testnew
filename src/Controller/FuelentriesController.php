<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Fuelentries Controller
 *
 * @property \App\Model\Table\FuelentriesTable $Fuelentries
 */
class FuelentriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Vehicles', 'Vendors']
        ];
        $fuelentries = $this->paginate($this->Fuelentries);

        $this->set(compact('fuelentries'));
        $this->set('_serialize', ['fuelentries']);
    }

    /**
     * View method
     *
     * @param string|null $id Fuelentry id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fuelentry = $this->Fuelentries->get($id, [
            'contain' => ['Vehicles', 'Vendors', 'Fueldouments', 'Fuelphotos']
        ]);

        $this->set('fuelentry', $fuelentry);
        $this->set('_serialize', ['fuelentry']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $fuelentry = $this->Fuelentries->newEntity();
        if ($this->request->is('post')) {
            $fuelentry = $this->Fuelentries->patchEntity($fuelentry, $this->request->data);
            if ($this->Fuelentries->save($fuelentry)) {
                $this->Flash->success(__('The fuelentry has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The fuelentry could not be saved. Please, try again.'));
            }
        }
        $vehicles = $this->Fuelentries->Vehicles->find('list', ['limit' => 200]);
        $vendors = $this->Fuelentries->Vendors->find('list', ['limit' => 200]);
        $this->set(compact('fuelentry', 'vehicles', 'vendors'));
        $this->set('_serialize', ['fuelentry']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Fuelentry id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fuelentry = $this->Fuelentries->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fuelentry = $this->Fuelentries->patchEntity($fuelentry, $this->request->data);
            if ($this->Fuelentries->save($fuelentry)) {
                $this->Flash->success(__('The fuelentry has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The fuelentry could not be saved. Please, try again.'));
            }
        }
        $vehicles = $this->Fuelentries->Vehicles->find('list', ['limit' => 200]);
        $vendors = $this->Fuelentries->Vendors->find('list', ['limit' => 200]);
        $this->set(compact('fuelentry', 'vehicles', 'vendors'));
        $this->set('_serialize', ['fuelentry']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Fuelentry id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fuelentry = $this->Fuelentries->get($id);
        if ($this->Fuelentries->delete($fuelentry)) {
            $this->Flash->success(__('The fuelentry has been deleted.'));
        } else {
            $this->Flash->error(__('The fuelentry could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
