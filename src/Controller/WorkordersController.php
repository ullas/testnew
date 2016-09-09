<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Workorders Controller
 *
 * @property \App\Model\Table\WorkordersTable $Workorders
 */
class WorkordersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Workorderstatuses', 'Vehicles', 'Vendors', 'Issuedbies', 'Assignedbies', 'Assigntos']
        ];
        $workorders = $this->paginate($this->Workorders);

        $this->set(compact('workorders'));
        $this->set('_serialize', ['workorders']);
    }

    /**
     * View method
     *
     * @param string|null $id Workorder id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $workorder = $this->Workorders->get($id, [
            'contain' => ['Workorderstatuses', 'Vehicles', 'Vendors', 'Issuedbies', 'Assignedbies', 'Assigntos', 'Issues', 'Worklorderlineitems', 'Workorderdocuments']
        ]);

        $this->set('workorder', $workorder);
        $this->set('_serialize', ['workorder']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $workorder = $this->Workorders->newEntity();
        if ($this->request->is('post')) {
            $workorder = $this->Workorders->patchEntity($workorder, $this->request->data);
            if ($this->Workorders->save($workorder)) {
                $this->Flash->success(__('The workorder has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The workorder could not be saved. Please, try again.'));
            }
        }
        $workorderstatuses = $this->Workorders->Workorderstatuses->find('list', ['limit' => 200]);
        $vehicles = $this->Workorders->Vehicles->find('list', ['limit' => 200]);
        $vendors = $this->Workorders->Vendors->find('list', ['limit' => 200]);
        $issuedbies = $this->Workorders->Issuedbies->find('list', ['limit' => 200]);
        $assignedbies = $this->Workorders->Assignedbies->find('list', ['limit' => 200]);
        $assigntos = $this->Workorders->Assigntos->find('list', ['limit' => 200]);
        $this->set(compact('workorder', 'workorderstatuses', 'vehicles', 'vendors', 'issuedbies', 'assignedbies', 'assigntos'));
        $this->set('_serialize', ['workorder']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Workorder id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $workorder = $this->Workorders->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $workorder = $this->Workorders->patchEntity($workorder, $this->request->data);
            if ($this->Workorders->save($workorder)) {
                $this->Flash->success(__('The workorder has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The workorder could not be saved. Please, try again.'));
            }
        }
        $workorderstatuses = $this->Workorders->Workorderstatuses->find('list', ['limit' => 200]);
        $vehicles = $this->Workorders->Vehicles->find('list', ['limit' => 200]);
        $vendors = $this->Workorders->Vendors->find('list', ['limit' => 200]);
        $issuedbies = $this->Workorders->Issuedbies->find('list', ['limit' => 200]);
        $assignedbies = $this->Workorders->Assignedbies->find('list', ['limit' => 200]);
        $assigntos = $this->Workorders->Assigntos->find('list', ['limit' => 200]);
        $this->set(compact('workorder', 'workorderstatuses', 'vehicles', 'vendors', 'issuedbies', 'assignedbies', 'assigntos'));
        $this->set('_serialize', ['workorder']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Workorder id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $workorder = $this->Workorders->get($id);
        if ($this->Workorders->delete($workorder)) {
            $this->Flash->success(__('The workorder has been deleted.'));
        } else {
            $this->Flash->error(__('The workorder could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
