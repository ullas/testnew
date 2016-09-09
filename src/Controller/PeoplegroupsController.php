<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Peoplegroups Controller
 *
 * @property \App\Model\Table\PeoplegroupsTable $Peoplegroups
 */
class PeoplegroupsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Defaultpeople']
        ];
        $peoplegroups = $this->paginate($this->Peoplegroups);

        $this->set(compact('peoplegroups'));
        $this->set('_serialize', ['peoplegroups']);
    }

    /**
     * View method
     *
     * @param string|null $id Peoplegroup id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $peoplegroup = $this->Peoplegroups->get($id, [
            'contain' => ['Defaultpeople']
        ]);

        $this->set('peoplegroup', $peoplegroup);
        $this->set('_serialize', ['peoplegroup']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $peoplegroup = $this->Peoplegroups->newEntity();
        if ($this->request->is('post')) {
            $peoplegroup = $this->Peoplegroups->patchEntity($peoplegroup, $this->request->data);
            if ($this->Peoplegroups->save($peoplegroup)) {
                $this->Flash->success(__('The peoplegroup has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The peoplegroup could not be saved. Please, try again.'));
            }
        }
        $defaultpeople = $this->Peoplegroups->Defaultpeople->find('list', ['limit' => 200]);
        $this->set(compact('peoplegroup', 'defaultpeople'));
        $this->set('_serialize', ['peoplegroup']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Peoplegroup id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $peoplegroup = $this->Peoplegroups->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $peoplegroup = $this->Peoplegroups->patchEntity($peoplegroup, $this->request->data);
            if ($this->Peoplegroups->save($peoplegroup)) {
                $this->Flash->success(__('The peoplegroup has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The peoplegroup could not be saved. Please, try again.'));
            }
        }
        $defaultpeople = $this->Peoplegroups->Defaultpeople->find('list', ['limit' => 200]);
        $this->set(compact('peoplegroup', 'defaultpeople'));
        $this->set('_serialize', ['peoplegroup']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Peoplegroup id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $peoplegroup = $this->Peoplegroups->get($id);
        if ($this->Peoplegroups->delete($peoplegroup)) {
            $this->Flash->success(__('The peoplegroup has been deleted.'));
        } else {
            $this->Flash->error(__('The peoplegroup could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
