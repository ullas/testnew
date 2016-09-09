<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Manufacturers Controller
 *
 * @property \App\Model\Table\ManufacturersTable $Manufacturers
 */
class ManufacturersController extends AppController
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
        $manufacturers = $this->paginate($this->Manufacturers);

        $this->set(compact('manufacturers'));
        $this->set('_serialize', ['manufacturers']);
    }

    /**
     * View method
     *
     * @param string|null $id Manufacturer id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $manufacturer = $this->Manufacturers->get($id, [
            'contain' => ['Customers', 'Parts']
        ]);

        $this->set('manufacturer', $manufacturer);
        $this->set('_serialize', ['manufacturer']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $manufacturer = $this->Manufacturers->newEntity();
        if ($this->request->is('post')) {
            $manufacturer = $this->Manufacturers->patchEntity($manufacturer, $this->request->data);
            if ($this->Manufacturers->save($manufacturer)) {
                $this->Flash->success(__('The manufacturer has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The manufacturer could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Manufacturers->Customers->find('list', ['limit' => 200]);
        $this->set(compact('manufacturer', 'customers'));
        $this->set('_serialize', ['manufacturer']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Manufacturer id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $manufacturer = $this->Manufacturers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $manufacturer = $this->Manufacturers->patchEntity($manufacturer, $this->request->data);
            if ($this->Manufacturers->save($manufacturer)) {
                $this->Flash->success(__('The manufacturer has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The manufacturer could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Manufacturers->Customers->find('list', ['limit' => 200]);
        $this->set(compact('manufacturer', 'customers'));
        $this->set('_serialize', ['manufacturer']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Manufacturer id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $manufacturer = $this->Manufacturers->get($id);
        if ($this->Manufacturers->delete($manufacturer)) {
            $this->Flash->success(__('The manufacturer has been deleted.'));
        } else {
            $this->Flash->error(__('The manufacturer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
