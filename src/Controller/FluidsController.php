<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Fluids Controller
 *
 * @property \App\Model\Table\FluidsTable $Fluids
 */
class FluidsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Vehicles']
        ];
        $fluids = $this->paginate($this->Fluids);

        $this->set(compact('fluids'));
        $this->set('_serialize', ['fluids']);
    }

    /**
     * View method
     *
     * @param string|null $id Fluid id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fluid = $this->Fluids->get($id, [
            'contain' => ['Vehicles']
        ]);

        $this->set('fluid', $fluid);
        $this->set('_serialize', ['fluid']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $fluid = $this->Fluids->newEntity();
        if ($this->request->is('post')) {
            $fluid = $this->Fluids->patchEntity($fluid, $this->request->data);
            if ($this->Fluids->save($fluid)) {
                $this->Flash->success(__('The fluid has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The fluid could not be saved. Please, try again.'));
            }
        }
        $vehicles = $this->Fluids->Vehicles->find('list', ['limit' => 200]);
        $this->set(compact('fluid', 'vehicles'));
        $this->set('_serialize', ['fluid']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Fluid id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fluid = $this->Fluids->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fluid = $this->Fluids->patchEntity($fluid, $this->request->data);
            if ($this->Fluids->save($fluid)) {
                $this->Flash->success(__('The fluid has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The fluid could not be saved. Please, try again.'));
            }
        }
        $vehicles = $this->Fluids->Vehicles->find('list', ['limit' => 200]);
        $this->set(compact('fluid', 'vehicles'));
        $this->set('_serialize', ['fluid']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Fluid id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fluid = $this->Fluids->get($id);
        if ($this->Fluids->delete($fluid)) {
            $this->Flash->success(__('The fluid has been deleted.'));
        } else {
            $this->Flash->error(__('The fluid could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
