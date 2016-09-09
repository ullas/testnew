<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Renewalstypes Controller
 *
 * @property \App\Model\Table\RenewalstypesTable $Renewalstypes
 */
class RenewalstypesController extends AppController
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
        $renewalstypes = $this->paginate($this->Renewalstypes);

        $this->set(compact('renewalstypes'));
        $this->set('_serialize', ['renewalstypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Renewalstype id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $renewalstype = $this->Renewalstypes->get($id, [
            'contain' => ['Customers', 'Renewalreminders']
        ]);

        $this->set('renewalstype', $renewalstype);
        $this->set('_serialize', ['renewalstype']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $renewalstype = $this->Renewalstypes->newEntity();
        if ($this->request->is('post')) {
            $renewalstype = $this->Renewalstypes->patchEntity($renewalstype, $this->request->data);
            if ($this->Renewalstypes->save($renewalstype)) {
                $this->Flash->success(__('The renewalstype has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The renewalstype could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Renewalstypes->Customers->find('list', ['limit' => 200]);
        $this->set(compact('renewalstype', 'customers'));
        $this->set('_serialize', ['renewalstype']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Renewalstype id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $renewalstype = $this->Renewalstypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $renewalstype = $this->Renewalstypes->patchEntity($renewalstype, $this->request->data);
            if ($this->Renewalstypes->save($renewalstype)) {
                $this->Flash->success(__('The renewalstype has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The renewalstype could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Renewalstypes->Customers->find('list', ['limit' => 200]);
        $this->set(compact('renewalstype', 'customers'));
        $this->set('_serialize', ['renewalstype']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Renewalstype id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $renewalstype = $this->Renewalstypes->get($id);
        if ($this->Renewalstypes->delete($renewalstype)) {
            $this->Flash->success(__('The renewalstype has been deleted.'));
        } else {
            $this->Flash->error(__('The renewalstype could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
