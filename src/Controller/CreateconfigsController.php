<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Createconfigs Controller
 *
 * @property \App\Model\Table\CreateconfigsTable $Createconfigs
 */
class CreateconfigsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $createconfigs = $this->paginate($this->Createconfigs);

        $this->set(compact('createconfigs'));
        $this->set('_serialize', ['createconfigs']);
    }

    /**
     * View method
     *
     * @param string|null $id Createconfig id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $createconfig = $this->Createconfigs->get($id, [
            'contain' => []
        ]);

        $this->set('createconfig', $createconfig);
        $this->set('_serialize', ['createconfig']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $createconfig = $this->Createconfigs->newEntity();
        if ($this->request->is('post')) {
            $createconfig = $this->Createconfigs->patchEntity($createconfig, $this->request->data);
            $createconfig['customer_id']=$this->currentuser['customer_id'];
            if ($this->Createconfigs->save($createconfig)) {
                $this->Flash->success(__('The createconfig has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The createconfig could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('createconfig'));
        $this->set('_serialize', ['createconfig']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Createconfig id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $createconfig = $this->Createconfigs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $createconfig = $this->Createconfigs->patchEntity($createconfig, $this->request->data);
            if ($this->Createconfigs->save($createconfig)) {
                $this->Flash->success(__('The createconfig has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The createconfig could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('createconfig'));
        $this->set('_serialize', ['createconfig']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Createconfig id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $createconfig = $this->Createconfigs->get($id);
        if ($this->Createconfigs->delete($createconfig)) {
            $this->Flash->success(__('The createconfig has been deleted.'));
        } else {
            $this->Flash->error(__('The createconfig could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
