<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Vehiclepurchases Controller
 *
 * @property \App\Model\Table\VehiclepurchasesTable $Vehiclepurchases
 */
class VehiclepurchasesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Vendors', 'Currencies', 'Vehicles']
        ];
        $vehiclepurchases = $this->paginate($this->Vehiclepurchases);

        $this->set(compact('vehiclepurchases'));
        $this->set('_serialize', ['vehiclepurchases']);
    }

    /**
     * View method
     *
     * @param string|null $id Vehiclepurchase id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $vehiclepurchase = $this->Vehiclepurchases->get($id, [
            'contain' => ['Vendors', 'Currencies', 'Vehicles']
        ]);

        $this->set('vehiclepurchase', $vehiclepurchase);
        $this->set('_serialize', ['vehiclepurchase']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $vehiclepurchase = $this->Vehiclepurchases->newEntity();
        if ($this->request->is('post')) {
            $vehiclepurchase = $this->Vehiclepurchases->patchEntity($vehiclepurchase, $this->request->data);
            if ($this->Vehiclepurchases->save($vehiclepurchase)) {
                $this->Flash->success(__('The vehiclepurchase has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The vehiclepurchase could not be saved. Please, try again.'));
            }
        }
        $vendors = $this->Vehiclepurchases->Vendors->find('list', ['limit' => 200]);
        $currencies = $this->Vehiclepurchases->Currencies->find('list', ['limit' => 200]);
        $vehicles = $this->Vehiclepurchases->Vehicles->find('list', ['limit' => 200]);
        $this->set(compact('vehiclepurchase', 'vendors', 'currencies', 'vehicles'));
        $this->set('_serialize', ['vehiclepurchase']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Vehiclepurchase id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $vehiclepurchase = $this->Vehiclepurchases->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $vehiclepurchase = $this->Vehiclepurchases->patchEntity($vehiclepurchase, $this->request->data);
            if ($this->Vehiclepurchases->save($vehiclepurchase)) {
                $this->Flash->success(__('The vehiclepurchase has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The vehiclepurchase could not be saved. Please, try again.'));
            }
        }
        $vendors = $this->Vehiclepurchases->Vendors->find('list', ['limit' => 200]);
        $currencies = $this->Vehiclepurchases->Currencies->find('list', ['limit' => 200]);
        $vehicles = $this->Vehiclepurchases->Vehicles->find('list', ['limit' => 200]);
        $this->set(compact('vehiclepurchase', 'vendors', 'currencies', 'vehicles'));
        $this->set('_serialize', ['vehiclepurchase']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Vehiclepurchase id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $vehiclepurchase = $this->Vehiclepurchases->get($id);
        if ($this->Vehiclepurchases->delete($vehiclepurchase)) {
            $this->Flash->success(__('The vehiclepurchase has been deleted.'));
        } else {
            $this->Flash->error(__('The vehiclepurchase could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
