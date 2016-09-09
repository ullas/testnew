<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Tripstatuses Controller
 *
 * @property \App\Model\Table\TripstatusesTable $Tripstatuses
 */
class TripstatusesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $tripstatuses = $this->paginate($this->Tripstatuses);

        $this->set(compact('tripstatuses'));
        $this->set('_serialize', ['tripstatuses']);
    }

    /**
     * View method
     *
     * @param string|null $id Tripstatus id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tripstatus = $this->Tripstatuses->get($id, [
            'contain' => ['Trips']
        ]);

        $this->set('tripstatus', $tripstatus);
        $this->set('_serialize', ['tripstatus']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tripstatus = $this->Tripstatuses->newEntity();
        if ($this->request->is('post')) {
            $tripstatus = $this->Tripstatuses->patchEntity($tripstatus, $this->request->data);
            if ($this->Tripstatuses->save($tripstatus)) {
                $this->Flash->success(__('The tripstatus has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The tripstatus could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('tripstatus'));
        $this->set('_serialize', ['tripstatus']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Tripstatus id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tripstatus = $this->Tripstatuses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tripstatus = $this->Tripstatuses->patchEntity($tripstatus, $this->request->data);
            if ($this->Tripstatuses->save($tripstatus)) {
                $this->Flash->success(__('The tripstatus has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The tripstatus could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('tripstatus'));
        $this->set('_serialize', ['tripstatus']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Tripstatus id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tripstatus = $this->Tripstatuses->get($id);
        if ($this->Tripstatuses->delete($tripstatus)) {
            $this->Flash->success(__('The tripstatus has been deleted.'));
        } else {
            $this->Flash->error(__('The tripstatus could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
