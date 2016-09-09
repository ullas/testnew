<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Workorderstatuses Controller
 *
 * @property \App\Model\Table\WorkorderstatusesTable $Workorderstatuses
 */
class WorkorderstatusesController extends AppController
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
        $workorderstatuses = $this->paginate($this->Workorderstatuses);

        $this->set(compact('workorderstatuses'));
        $this->set('_serialize', ['workorderstatuses']);
    }

    /**
     * View method
     *
     * @param string|null $id Workorderstatus id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $workorderstatus = $this->Workorderstatuses->get($id, [
            'contain' => ['Customers', 'Workorders']
        ]);

        $this->set('workorderstatus', $workorderstatus);
        $this->set('_serialize', ['workorderstatus']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $workorderstatus = $this->Workorderstatuses->newEntity();
        if ($this->request->is('post')) {
            $workorderstatus = $this->Workorderstatuses->patchEntity($workorderstatus, $this->request->data);
            if ($this->Workorderstatuses->save($workorderstatus)) {
                $this->Flash->success(__('The workorderstatus has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The workorderstatus could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Workorderstatuses->Customers->find('list', ['limit' => 200]);
        $this->set(compact('workorderstatus', 'customers'));
        $this->set('_serialize', ['workorderstatus']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Workorderstatus id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $workorderstatus = $this->Workorderstatuses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $workorderstatus = $this->Workorderstatuses->patchEntity($workorderstatus, $this->request->data);
            if ($this->Workorderstatuses->save($workorderstatus)) {
                $this->Flash->success(__('The workorderstatus has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The workorderstatus could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Workorderstatuses->Customers->find('list', ['limit' => 200]);
        $this->set(compact('workorderstatus', 'customers'));
        $this->set('_serialize', ['workorderstatus']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Workorderstatus id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $workorderstatus = $this->Workorderstatuses->get($id);
        if ($this->Workorderstatuses->delete($workorderstatus)) {
            $this->Flash->success(__('The workorderstatus has been deleted.'));
        } else {
            $this->Flash->error(__('The workorderstatus could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
