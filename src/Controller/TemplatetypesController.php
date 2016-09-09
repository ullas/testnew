<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Templatetypes Controller
 *
 * @property \App\Model\Table\TemplatetypesTable $Templatetypes
 */
class TemplatetypesController extends AppController
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
        $templatetypes = $this->paginate($this->Templatetypes);

        $this->set(compact('templatetypes'));
        $this->set('_serialize', ['templatetypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Templatetype id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $templatetype = $this->Templatetypes->get($id, [
            'contain' => ['Customers', 'Templates']
        ]);

        $this->set('templatetype', $templatetype);
        $this->set('_serialize', ['templatetype']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $templatetype = $this->Templatetypes->newEntity();
        if ($this->request->is('post')) {
            $templatetype = $this->Templatetypes->patchEntity($templatetype, $this->request->data);
            if ($this->Templatetypes->save($templatetype)) {
                $this->Flash->success(__('The templatetype has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The templatetype could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Templatetypes->Customers->find('list', ['limit' => 200]);
        $this->set(compact('templatetype', 'customers'));
        $this->set('_serialize', ['templatetype']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Templatetype id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $templatetype = $this->Templatetypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $templatetype = $this->Templatetypes->patchEntity($templatetype, $this->request->data);
            if ($this->Templatetypes->save($templatetype)) {
                $this->Flash->success(__('The templatetype has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The templatetype could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Templatetypes->Customers->find('list', ['limit' => 200]);
        $this->set(compact('templatetype', 'customers'));
        $this->set('_serialize', ['templatetype']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Templatetype id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $templatetype = $this->Templatetypes->get($id);
        if ($this->Templatetypes->delete($templatetype)) {
            $this->Flash->success(__('The templatetype has been deleted.'));
        } else {
            $this->Flash->error(__('The templatetype could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
