<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Distributionlists Controller
 *
 * @property \App\Model\Table\DistributionlistsTable $Distributionlists
 */
class DistributionlistsController extends AppController
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
        $distributionlists = $this->paginate($this->Distributionlists);

        $this->set(compact('distributionlists'));
        $this->set('_serialize', ['distributionlists']);
    }

    /**
     * View method
     *
     * @param string|null $id Distributionlist id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $distributionlist = $this->Distributionlists->get($id, [
            'contain' => ['Customers', 'Addresses']
        ]);

        $this->set('distributionlist', $distributionlist);
        $this->set('_serialize', ['distributionlist']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $distributionlist = $this->Distributionlists->newEntity();
        if ($this->request->is('post')) {
            $distributionlist = $this->Distributionlists->patchEntity($distributionlist, $this->request->data);
            if ($this->Distributionlists->save($distributionlist)) {
                $this->Flash->success(__('The distributionlist has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The distributionlist could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Distributionlists->Customers->find('list', ['limit' => 200]);
        $addresses = $this->Distributionlists->Addresses->find('list', ['limit' => 200]);
        $this->set(compact('distributionlist', 'customers', 'addresses'));
        $this->set('_serialize', ['distributionlist']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Distributionlist id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $distributionlist = $this->Distributionlists->get($id, [
            'contain' => ['Addresses']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $distributionlist = $this->Distributionlists->patchEntity($distributionlist, $this->request->data);
            if ($this->Distributionlists->save($distributionlist)) {
                $this->Flash->success(__('The distributionlist has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The distributionlist could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Distributionlists->Customers->find('list', ['limit' => 200]);
        $addresses = $this->Distributionlists->Addresses->find('list', ['limit' => 200]);
        $this->set(compact('distributionlist', 'customers', 'addresses'));
        $this->set('_serialize', ['distributionlist']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Distributionlist id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $distributionlist = $this->Distributionlists->get($id);
        if ($this->Distributionlists->delete($distributionlist)) {
            $this->Flash->success(__('The distributionlist has been deleted.'));
        } else {
            $this->Flash->error(__('The distributionlist could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
