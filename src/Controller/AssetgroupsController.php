<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Assetgroups Controller
 *
 * @property \App\Model\Table\AssetgroupsTable $Assetgroups
 */
class AssetgroupsController extends AppController
{

 
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Defaultassets']
        ];
        $assetgroups = $this->paginate($this->Assetgroups);

        $this->set(compact('assetgroups'));
        $this->set('_serialize', ['assetgroups']);
    }

    /**
     * View method
     *
     * @param string|null $id Assetgroup id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $assetgroup = $this->Assetgroups->get($id, [
            'contain' => ['Defaultassets']
        ]);

        $this->set('assetgroup', $assetgroup);
        $this->set('_serialize', ['assetgroup']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $assetgroup = $this->Assetgroups->newEntity();
        if ($this->request->is('post')) {
            $assetgroup = $this->Assetgroups->patchEntity($assetgroup, $this->request->data);
            if ($this->Assetgroups->save($assetgroup)) {
                $this->Flash->success(__('The assetgroup has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The assetgroup could not be saved. Please, try again.'));
            }
        }
        $defaultassets = $this->Assetgroups->Defaultassets->find('list', ['limit' => 200]);
        $this->set(compact('assetgroup', 'defaultassets'));
        $this->set('_serialize', ['assetgroup']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Assetgroup id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $assetgroup = $this->Assetgroups->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $assetgroup = $this->Assetgroups->patchEntity($assetgroup, $this->request->data);
            if ($this->Assetgroups->save($assetgroup)) {
                $this->Flash->success(__('The assetgroup has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The assetgroup could not be saved. Please, try again.'));
            }
        }
        $defaultassets = $this->Assetgroups->Defaultassets->find('list', ['limit' => 200]);
        $this->set(compact('assetgroup', 'defaultassets'));
        $this->set('_serialize', ['assetgroup']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Assetgroup id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $assetgroup = $this->Assetgroups->get($id);
        if ($this->Assetgroups->delete($assetgroup)) {
            $this->Flash->success(__('The assetgroup has been deleted.'));
        } else {
            $this->Flash->error(__('The assetgroup could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
