<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Parts Controller
 *
 * @property \App\Model\Table\PartsTable $Parts
 */
class PartsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Partcategories', 'Manufacturers', 'Measurementunits', 'Stations']
        ];
        $parts = $this->paginate($this->Parts);

        $this->set(compact('parts'));
        $this->set('_serialize', ['parts']);
    }

    /**
     * View method
     *
     * @param string|null $id Part id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $part = $this->Parts->get($id, [
            'contain' => ['Partcategories', 'Manufacturers', 'Measurementunits', 'Stations']
        ]);

        $this->set('part', $part);
        $this->set('_serialize', ['part']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $part = $this->Parts->newEntity();
        if ($this->request->is('post')) {
            $part = $this->Parts->patchEntity($part, $this->request->data);
            if ($this->Parts->save($part)) {
                $this->Flash->success(__('The part has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The part could not be saved. Please, try again.'));
            }
        }
        $partcategories = $this->Parts->Partcategories->find('list', ['limit' => 200]);
        $manufacturers = $this->Parts->Manufacturers->find('list', ['limit' => 200]);
        $measurementunits = $this->Parts->Measurementunits->find('list', ['limit' => 200]);
        $stations = $this->Parts->Stations->find('list', ['limit' => 200]);
        $this->set(compact('part', 'partcategories', 'manufacturers', 'measurementunits', 'stations'));
        $this->set('_serialize', ['part']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Part id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $part = $this->Parts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $part = $this->Parts->patchEntity($part, $this->request->data);
            if ($this->Parts->save($part)) {
                $this->Flash->success(__('The part has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The part could not be saved. Please, try again.'));
            }
        }
        $partcategories = $this->Parts->Partcategories->find('list', ['limit' => 200]);
        $manufacturers = $this->Parts->Manufacturers->find('list', ['limit' => 200]);
        $measurementunits = $this->Parts->Measurementunits->find('list', ['limit' => 200]);
        $stations = $this->Parts->Stations->find('list', ['limit' => 200]);
        $this->set(compact('part', 'partcategories', 'manufacturers', 'measurementunits', 'stations'));
        $this->set('_serialize', ['part']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Part id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $part = $this->Parts->get($id);
        if ($this->Parts->delete($part)) {
            $this->Flash->success(__('The part has been deleted.'));
        } else {
            $this->Flash->error(__('The part could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
