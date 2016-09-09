<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Issues Controller
 *
 * @property \App\Model\Table\IssuesTable $Issues
 */
class IssuesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Vehicles', 'Reportedby', 'Assignedtos']
        ];
        $issues = $this->paginate($this->Issues);

        $this->set(compact('issues'));
        $this->set('_serialize', ['issues']);
    }

    /**
     * View method
     *
     * @param string|null $id Issue id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $issue = $this->Issues->get($id, [
            'contain' => ['Vehicles', 'Reportedby', 'Assignedtos', 'Issuedocuments']
        ]);

        $this->set('issue', $issue);
        $this->set('_serialize', ['issue']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $issue = $this->Issues->newEntity();
        if ($this->request->is('post')) {
            $issue = $this->Issues->patchEntity($issue, $this->request->data);
            if ($this->Issues->save($issue)) {
                $this->Flash->success(__('The issue has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The issue could not be saved. Please, try again.'));
            }
        }
        $vehicles = $this->Issues->Vehicles->find('list', ['limit' => 200]);
		//print_r($vehicles);
		//$vehicles = $this->Issues->Vehicles->getVehicleNames();
        $reportedby = $this->Issues->Reportedby->find('list', ['limit' => 200]);
        $assignedtos = $this->Issues->Assignedtos->find('list', ['limit' => 200]);
        $this->set(compact('issue', 'vehicles', 'reportedby', 'assignedtos'));
        $this->set('_serialize', ['issue']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Issue id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $issue = $this->Issues->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $issue = $this->Issues->patchEntity($issue, $this->request->data);
            if ($this->Issues->save($issue)) {
                $this->Flash->success(__('The issue has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The issue could not be saved. Please, try again.'));
            }
        }
        $vehicles = $this->Issues->Vehicles->getVehicleNames();
        $reportedby = $this->Issues->Reportedby->find('list', ['limit' => 200]);
        $assignedtos = $this->Issues->Assignedtos->find('list', ['limit' => 200]);
        $this->set(compact('issue', 'vehicles', 'reportedby', 'assignedtos'));
        $this->set('_serialize', ['issue']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Issue id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $issue = $this->Issues->get($id);
        if ($this->Issues->delete($issue)) {
            $this->Flash->success(__('The issue has been deleted.'));
        } else {
            $this->Flash->error(__('The issue could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
