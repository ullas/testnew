<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Servicecompleted Controller
 *
 * @property \App\Model\Table\ServicecompletedTable $Servicecompleted
 */
class ServicecompletedController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Servicesentries']
        ];
        $servicecompleted = $this->paginate($this->Servicecompleted);

        $this->set(compact('servicecompleted'));
        $this->set('_serialize', ['servicecompleted']);
    }

    /**
     * View method
     *
     * @param string|null $id Servicecompleted id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $servicecompleted = $this->Servicecompleted->get($id, [
            'contain' => ['Servicesentries']
        ]);

        $this->set('servicecompleted', $servicecompleted);
        $this->set('_serialize', ['servicecompleted']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $servicecompleted = $this->Servicecompleted->newEntity();
        if ($this->request->is('post')) {
            $servicecompleted = $this->Servicecompleted->patchEntity($servicecompleted, $this->request->data);
            if ($this->Servicecompleted->save($servicecompleted)) {
                $this->Flash->success(__('The servicecompleted has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The servicecompleted could not be saved. Please, try again.'));
            }
        }
        $servicesentries = $this->Servicecompleted->Servicesentries->find('list', ['limit' => 200]);
        $this->set(compact('servicecompleted', 'servicesentries'));
        $this->set('_serialize', ['servicecompleted']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Servicecompleted id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $servicecompleted = $this->Servicecompleted->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $servicecompleted = $this->Servicecompleted->patchEntity($servicecompleted, $this->request->data);
            if ($this->Servicecompleted->save($servicecompleted)) {
                $this->Flash->success(__('The servicecompleted has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The servicecompleted could not be saved. Please, try again.'));
            }
        }
        $servicesentries = $this->Servicecompleted->Servicesentries->find('list', ['limit' => 200]);
        $this->set(compact('servicecompleted', 'servicesentries'));
        $this->set('_serialize', ['servicecompleted']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Servicecompleted id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $servicecompleted = $this->Servicecompleted->get($id);
        if ($this->Servicecompleted->delete($servicecompleted)) {
            $this->Flash->success(__('The servicecompleted has been deleted.'));
        } else {
            $this->Flash->error(__('The servicecompleted could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
