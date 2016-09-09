<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Servicedocuments Controller
 *
 * @property \App\Model\Table\ServicedocumentsTable $Servicedocuments
 */
class ServicedocumentsController extends AppController
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
        $servicedocuments = $this->paginate($this->Servicedocuments);

        $this->set(compact('servicedocuments'));
        $this->set('_serialize', ['servicedocuments']);
    }

    /**
     * View method
     *
     * @param string|null $id Servicedocument id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $servicedocument = $this->Servicedocuments->get($id, [
            'contain' => ['Servicesentries']
        ]);

        $this->set('servicedocument', $servicedocument);
        $this->set('_serialize', ['servicedocument']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $servicedocument = $this->Servicedocuments->newEntity();
        if ($this->request->is('post')) {
            $servicedocument = $this->Servicedocuments->patchEntity($servicedocument, $this->request->data);
            if ($this->Servicedocuments->save($servicedocument)) {
                $this->Flash->success(__('The servicedocument has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The servicedocument could not be saved. Please, try again.'));
            }
        }
        $servicesentries = $this->Servicedocuments->Servicesentries->find('list', ['limit' => 200]);
        $this->set(compact('servicedocument', 'servicesentries'));
        $this->set('_serialize', ['servicedocument']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Servicedocument id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $servicedocument = $this->Servicedocuments->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $servicedocument = $this->Servicedocuments->patchEntity($servicedocument, $this->request->data);
            if ($this->Servicedocuments->save($servicedocument)) {
                $this->Flash->success(__('The servicedocument has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The servicedocument could not be saved. Please, try again.'));
            }
        }
        $servicesentries = $this->Servicedocuments->Servicesentries->find('list', ['limit' => 200]);
        $this->set(compact('servicedocument', 'servicesentries'));
        $this->set('_serialize', ['servicedocument']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Servicedocument id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $servicedocument = $this->Servicedocuments->get($id);
        if ($this->Servicedocuments->delete($servicedocument)) {
            $this->Flash->success(__('The servicedocument has been deleted.'));
        } else {
            $this->Flash->error(__('The servicedocument could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
