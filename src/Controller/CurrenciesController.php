<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Currencies Controller
 *
 * @property \App\Model\Table\CurrenciesTable $Currencies
 */
class CurrenciesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $currencies = $this->paginate($this->Currencies);

        $this->set(compact('currencies'));
        $this->set('_serialize', ['currencies']);
    }

    /**
     * View method
     *
     * @param string|null $id Currency id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $currency = $this->Currencies->get($id, [
            'contain' => ['Vehiclepurchases']
        ]);

        $this->set('currency', $currency);
        $this->set('_serialize', ['currency']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $currency = $this->Currencies->newEntity();
        if ($this->request->is('post')) {
            $currency = $this->Currencies->patchEntity($currency, $this->request->data);
            if ($this->Currencies->save($currency)) {
                $this->Flash->success(__('The currency has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The currency could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('currency'));
        $this->set('_serialize', ['currency']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Currency id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $currency = $this->Currencies->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $currency = $this->Currencies->patchEntity($currency, $this->request->data);
            if ($this->Currencies->save($currency)) {
                $this->Flash->success(__('The currency has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The currency could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('currency'));
        $this->set('_serialize', ['currency']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Currency id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $currency = $this->Currencies->get($id);
        if ($this->Currencies->delete($currency)) {
            $this->Flash->success(__('The currency has been deleted.'));
        } else {
            $this->Flash->error(__('The currency could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
