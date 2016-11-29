<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Fences Controller
 *
 * @property \App\Model\Table\FencesTable $Fences
 */
class FencesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Groups', 'Trackingobjects', 'Customers', 'Zonetypes']
        ];
        $fences = $this->paginate($this->Fences);

        $this->set(compact('fences'));
        $this->set('_serialize', ['fences']);
    }

    /**
     * View method
     *
     * @param string|null $id Fence id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fence = $this->Fences->get($id, [
            'contain' => ['Users', 'Groups', 'Trackingobjects', 'Customers', 'Zonetypes']
        ]);

        $this->set('fence', $fence);
        $this->set('_serialize', ['fence']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $fence = $this->Fences->newEntity();
        if ($this->request->is('post')) {
            $fence = $this->Fences->patchEntity($fence, $this->request->data);
            if ($this->Fences->save($fence)) {
                $this->Flash->success(__('The fence has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The fence could not be saved. Please, try again.'));
            }
        }
        $users = $this->Fences->Users->find('list', ['limit' => 200]);
        $groups = $this->Fences->Groups->find('list', ['limit' => 200]);
        $trackingobjects = $this->Fences->Trackingobjects->find('list', ['limit' => 200]);
        $customers = $this->Fences->Customers->find('list', ['limit' => 200]);
        $zonetypes = $this->Fences->Zonetypes->find('list', ['limit' => 200]);
        $this->set(compact('fence', 'users', 'groups', 'trackingobjects', 'customers', 'zonetypes'));
        $this->set('_serialize', ['fence']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Fence id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fence = $this->Fences->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fence = $this->Fences->patchEntity($fence, $this->request->data);
            if ($this->Fences->save($fence)) {
                $this->Flash->success(__('The fence has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The fence could not be saved. Please, try again.'));
            }
        }
        $users = $this->Fences->Users->find('list', ['limit' => 200]);
        $groups = $this->Fences->Groups->find('list', ['limit' => 200]);
        $trackingobjects = $this->Fences->Trackingobjects->find('list', ['limit' => 200]);
        $customers = $this->Fences->Customers->find('list', ['limit' => 200]);
        $zonetypes = $this->Fences->Zonetypes->find('list', ['limit' => 200]);
        $this->set(compact('fence', 'users', 'groups', 'trackingobjects', 'customers', 'zonetypes'));
        $this->set('_serialize', ['fence']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Fence id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fence = $this->Fences->get($id);
        if ($this->Fences->delete($fence)) {
            $this->Flash->success(__('The fence has been deleted.'));
        } else {
            $this->Flash->error(__('The fence could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
