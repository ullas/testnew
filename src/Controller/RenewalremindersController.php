<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Renewalreminders Controller
 *
 * @property \App\Model\Table\RenewalremindersTable $Renewalreminders
 */
class RenewalremindersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Renewalstypes', 'Distributionlists', 'Groups', 'Customers']
        ];
        $renewalreminders = $this->paginate($this->Renewalreminders);

        $this->set(compact('renewalreminders'));
        $this->set('_serialize', ['renewalreminders']);
    }

    /**
     * View method
     *
     * @param string|null $id Renewalreminder id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $renewalreminder = $this->Renewalreminders->get($id, [
            'contain' => ['Renewalstypes', 'Distributionlists', 'Groups', 'Customers']
        ]);

        $this->set('renewalreminder', $renewalreminder);
        $this->set('_serialize', ['renewalreminder']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $renewalreminder = $this->Renewalreminders->newEntity();
        if ($this->request->is('post')) {
            $renewalreminder = $this->Renewalreminders->patchEntity($renewalreminder, $this->request->data);
            if ($this->Renewalreminders->save($renewalreminder)) {
                $this->Flash->success(__('The renewalreminder has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The renewalreminder could not be saved. Please, try again.'));
            }
        }
        $renewalstypes = $this->Renewalreminders->Renewalstypes->find('list', ['limit' => 200]);
        $distributionlists = $this->Renewalreminders->Distributionlists->find('list', ['limit' => 200]);
        $groups = $this->Renewalreminders->Groups->find('list', ['limit' => 200]);
        $customers = $this->Renewalreminders->Customers->find('list', ['limit' => 200]);
        $this->set(compact('renewalreminder', 'renewalstypes', 'distributionlists', 'groups', 'customers'));
        $this->set('_serialize', ['renewalreminder']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Renewalreminder id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $renewalreminder = $this->Renewalreminders->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $renewalreminder = $this->Renewalreminders->patchEntity($renewalreminder, $this->request->data);
            if ($this->Renewalreminders->save($renewalreminder)) {
                $this->Flash->success(__('The renewalreminder has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The renewalreminder could not be saved. Please, try again.'));
            }
        }
        $renewalstypes = $this->Renewalreminders->Renewalstypes->find('list', ['limit' => 200]);
        $distributionlists = $this->Renewalreminders->Distributionlists->find('list', ['limit' => 200]);
        $groups = $this->Renewalreminders->Groups->find('list', ['limit' => 200]);
        $customers = $this->Renewalreminders->Customers->find('list', ['limit' => 200]);
        $this->set(compact('renewalreminder', 'renewalstypes', 'distributionlists', 'groups', 'customers'));
        $this->set('_serialize', ['renewalreminder']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Renewalreminder id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $renewalreminder = $this->Renewalreminders->get($id);
        if ($this->Renewalreminders->delete($renewalreminder)) {
            $this->Flash->success(__('The renewalreminder has been deleted.'));
        } else {
            $this->Flash->error(__('The renewalreminder could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
