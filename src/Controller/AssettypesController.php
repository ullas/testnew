<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Assettypes Controller
 *
 * @property \App\Model\Table\AssettypesTable $Assettypes
 */
class AssettypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $assettypes = $this->paginate($this->Assettypes);

        $this->set(compact('assettypes'));
        $this->set('_serialize', ['assettypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Assettype id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $assettype = $this->Assettypes->get($id, [
            'contain' => ['Trackingobjects']
        ]);

        $this->set('assettype', $assettype);
        $this->set('_serialize', ['assettype']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $assettype = $this->Assettypes->newEntity();
        if ($this->request->is('post')) {
            $assettype = $this->Assettypes->patchEntity($assettype, $this->request->data);
            if ($this->Assettypes->save($assettype)) {
                $this->Flash->success(__('The assettype has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The assettype could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('assettype'));
        $this->set('_serialize', ['assettype']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Assettype id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $assettype = $this->Assettypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $assettype = $this->Assettypes->patchEntity($assettype, $this->request->data);
            if ($this->Assettypes->save($assettype)) {
                $this->Flash->success(__('The assettype has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The assettype could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('assettype'));
        $this->set('_serialize', ['assettype']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Assettype id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $assettype = $this->Assettypes->get($id);
        if ($this->Assettypes->delete($assettype)) {
            $this->Flash->success(__('The assettype has been deleted.'));
        } else {
            $this->Flash->error(__('The assettype could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
