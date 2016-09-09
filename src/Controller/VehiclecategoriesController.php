<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Vehiclecategories Controller
 *
 * @property \App\Model\Table\VehiclecategoriesTable $Vehiclecategories
 */
class VehiclecategoriesController extends AppController
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
        $vehiclecategories = $this->paginate($this->Vehiclecategories);

        $this->set(compact('vehiclecategories'));
        $this->set('_serialize', ['vehiclecategories']);
    }

    /**
     * View method
     *
     * @param string|null $id Vehiclecategory id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $vehiclecategory = $this->Vehiclecategories->get($id, [
            'contain' => ['Customers', 'Trips']
        ]);

        $this->set('vehiclecategory', $vehiclecategory);
        $this->set('_serialize', ['vehiclecategory']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $vehiclecategory = $this->Vehiclecategories->newEntity();
        if ($this->request->is('post')) {
            $vehiclecategory = $this->Vehiclecategories->patchEntity($vehiclecategory, $this->request->data);
            if ($this->Vehiclecategories->save($vehiclecategory)) {
                $this->Flash->success(__('The vehiclecategory has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The vehiclecategory could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Vehiclecategories->Customers->find('list', ['limit' => 200]);
        $this->set(compact('vehiclecategory', 'customers'));
        $this->set('_serialize', ['vehiclecategory']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Vehiclecategory id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $vehiclecategory = $this->Vehiclecategories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $vehiclecategory = $this->Vehiclecategories->patchEntity($vehiclecategory, $this->request->data);
            if ($this->Vehiclecategories->save($vehiclecategory)) {
                $this->Flash->success(__('The vehiclecategory has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The vehiclecategory could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Vehiclecategories->Customers->find('list', ['limit' => 200]);
        $this->set(compact('vehiclecategory', 'customers'));
        $this->set('_serialize', ['vehiclecategory']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Vehiclecategory id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $vehiclecategory = $this->Vehiclecategories->get($id);
        if ($this->Vehiclecategories->delete($vehiclecategory)) {
            $this->Flash->success(__('The vehiclecategory has been deleted.'));
        } else {
            $this->Flash->error(__('The vehiclecategory could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
