<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Costomers Controller
 *
 * @property \App\Model\Table\CostomersTable $Costomers
 */
class CostomersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $costomers = $this->paginate($this->Costomers);

        $this->set(compact('costomers'));
        $this->set('_serialize', ['costomers']);
    }

    /**
     * View method
     *
     * @param string|null $id Costomer id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $costomer = $this->Costomers->get($id, [
            'contain' => []
        ]);

        $this->set('costomer', $costomer);
        $this->set('_serialize', ['costomer']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $costomer = $this->Costomers->newEntity();
        if ($this->request->is('post')) {
            $costomer = $this->Costomers->patchEntity($costomer, $this->request->data);
            if ($this->Costomers->save($costomer)) {
                $this->Flash->success(__('The costomer has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The costomer could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('costomer'));
        $this->set('_serialize', ['costomer']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Costomer id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $costomer = $this->Costomers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $costomer = $this->Costomers->patchEntity($costomer, $this->request->data);
            if ($this->Costomers->save($costomer)) {
                $this->Flash->success(__('The costomer has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The costomer could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('costomer'));
        $this->set('_serialize', ['costomer']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Costomer id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $costomer = $this->Costomers->get($id);
        if ($this->Costomers->delete($costomer)) {
            $this->Flash->success(__('The costomer has been deleted.'));
        } else {
            $this->Flash->error(__('The costomer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
