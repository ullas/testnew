<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Assets Controller
 *
 * @property \App\Model\Table\AssetsTable $Assets
 */
class AssetsController extends AppController
{
 
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Trackingobjects', 'Assettypes', 'Symbols', 'Departments', 'Stations', 'Purposes']
        ];
        $assets = $this->paginate($this->Assets);

        $this->set(compact('assets'));
        $this->set('_serialize', ['assets']);
    }

    /**
     * View method
     *
     * @param string|null $id Asset id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $asset = $this->Assets->get($id, [
            'contain' => ['Trackingobjects', 'Assettypes', 'Symbols', 'Departments', 'Stations', 'Purposes']
        ]);

        $this->set('asset', $asset);
        $this->set('_serialize', ['asset']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $asset = $this->Assets->newEntity();
        if ($this->request->is('post')) {
            $asset = $this->Assets->patchEntity($asset, $this->request->data);
			$trobjTable = TableRegistry::get('Trackingobjects');
			
			$trobj=$trobjTable->newEntity();
			$trobj->name=$this->request->data['Trackingobject']['name'];
		    $trobjTable->save($trobj);
			$asset['trackingobject_id']=$trobj->id;
			
			
			
			
			
            if ($this->Assets->save($asset)) {
                $this->Flash->success(__('The asset has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The asset could not be saved. Please, try again.'));
            }
        }
        $trackingobjects = $this->Assets->Trackingobjects->find('list', ['limit' => 200]);
        $assettypes = $this->Assets->Assettypes->find('list', ['limit' => 200]);
        $symbols = $this->Assets->Symbols->find('list', ['limit' => 200]);
        $departments = $this->Assets->Departments->find('list', ['limit' => 200]);
        $stations = $this->Assets->Stations->find('list', ['limit' => 200]);
        $purposes = $this->Assets->Purposes->find('list', ['limit' => 200]);
        $this->set(compact('asset', 'trackingobjects', 'assettypes', 'symbols', 'departments', 'stations', 'purposes'));
        $this->set('_serialize', ['asset']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Asset id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $trobjTable = TableRegistry::get('Trackingobjects');
	    $asset = $this->Assets->get($id, [
            'contain' => []
        ]);
		
		$trobj = $trobjTable->get($asset->trackingobject_id, [
            'contain' => []
        ]);
		
		
        if ($this->request->is(['patch', 'post', 'put'])) {
            $asset = $this->Assets->patchEntity($asset, $this->request->data);
			$trobjTable = TableRegistry::get('Trackingobjects');
			$trobj->name=$this->request->data['Trackingobject']['name'];
			$trobjTable->save($trobj);
            if ($this->Assets->save($asset)) {
                $this->Flash->success(__('The asset has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The asset could not be saved. Please, try again.'));
            }
        }
        $trackingobjects = $this->Assets->Trackingobjects->find('list', ['limit' => 200]);
        $assettypes = $this->Assets->Assettypes->find('list', ['limit' => 200]);
        $symbols = $this->Assets->Symbols->find('list', ['limit' => 200]);
        $departments = $this->Assets->Departments->find('list', ['limit' => 200]);
        $stations = $this->Assets->Stations->find('list', ['limit' => 200]);
        $purposes = $this->Assets->Purposes->find('list', ['limit' => 200]);
        $this->set(compact('asset', 'trackingobjects', 'assettypes', 'symbols', 'departments', 'stations', 'purposes'));
        $this->set('_serialize', ['asset']);
		$name=$trobj->name;
		$this->set('name',$name);
    }

    /**
     * Delete method
     *
     * @param string|null $id Asset id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $asset = $this->Assets->get($id);
        if ($this->Assets->delete($asset)) {
            $this->Flash->success(__('The asset has been deleted.'));
        } else {
            $this->Flash->error(__('The asset could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
