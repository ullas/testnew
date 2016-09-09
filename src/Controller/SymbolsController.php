<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Symbols Controller
 *
 * @property \App\Model\Table\SymbolsTable $Symbols
 */
class SymbolsController extends AppController
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
        $symbols = $this->paginate($this->Symbols);

        $this->set(compact('symbols'));
        $this->set('_serialize', ['symbols']);
    }

    /**
     * View method
     *
     * @param string|null $id Symbol id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $symbol = $this->Symbols->get($id, [
            'contain' => ['Customers', 'Vehicles']
        ]);

        $this->set('symbol', $symbol);
        $this->set('_serialize', ['symbol']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $symbol = $this->Symbols->newEntity();
        if ($this->request->is('post')) {
            $symbol = $this->Symbols->patchEntity($symbol, $this->request->data);
            if ($this->Symbols->save($symbol)) {
                $this->Flash->success(__('The symbol has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The symbol could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Symbols->Customers->find('list', ['limit' => 200]);
        $this->set(compact('symbol', 'customers'));
        $this->set('_serialize', ['symbol']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Symbol id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $symbol = $this->Symbols->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $symbol = $this->Symbols->patchEntity($symbol, $this->request->data);
            if ($this->Symbols->save($symbol)) {
                $this->Flash->success(__('The symbol has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The symbol could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Symbols->Customers->find('list', ['limit' => 200]);
        $this->set(compact('symbol', 'customers'));
        $this->set('_serialize', ['symbol']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Symbol id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $symbol = $this->Symbols->get($id);
        if ($this->Symbols->delete($symbol)) {
            $this->Flash->success(__('The symbol has been deleted.'));
        } else {
            $this->Flash->error(__('The symbol could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
