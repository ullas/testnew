<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * People Controller
 *
 * @property \App\Model\Table\PeopleTable $People
 */
class PeopleController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Trackingobjects', 'Departments', 'Stations']
        ];
        $people = $this->paginate($this->People);

        $this->set(compact('people'));
        $this->set('_serialize', ['people']);
    }

    /**
     * View method
     *
     * @param string|null $id Person id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $person = $this->People->get($id, [
            'contain' => ['Trackingobjects', 'Departments', 'Stations']
        ]);

        $this->set('person', $person);
        $this->set('_serialize', ['person']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $person = $this->People->newEntity();
        if ($this->request->is('post')) {
            $person = $this->People->patchEntity($person, $this->request->data);
			$trobjTable = TableRegistry::get('Trackingobjects');
			
			$trobj=$trobjTable->newEntity();
			print_r($this->request->data);
			$trobj->name=$this->request->data['Trackingobject']['name'];
		    $trobjTable->save($trobj);
			$person['trackingobject_id']=$trobj->id;
			
            if ($this->People->save($person)) {
                $this->Flash->success(__('The person has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The person could not be saved. Please, try again.'));
            }
        }
        $trackingobjects = $this->People->Trackingobjects->find('list', ['limit' => 200]);
        $departments = $this->People->Departments->find('list', ['limit' => 200]);
        $stations = $this->People->Stations->find('list', ['limit' => 200]);
        $this->set(compact('person', 'trackingobjects', 'departments', 'stations'));
        $this->set('_serialize', ['person']);
		
    }

    /**
     * Edit method
     *
     * @param string|null $id Person id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $person = $this->People->get($id, [
            'contain' => []
        ]);
		$trobjTable = TableRegistry::get('Trackingobjects');
		$trobj = $trobjTable->get($person->trackingobject_id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $person = $this->People->patchEntity($person, $this->request->data);
			
			$trobj->name=$this->request->data['Trackingobject']['name'];
			$trobjTable->save($trobj);
            if ($this->People->save($person)) {
                $this->Flash->success(__('The person has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The person could not be saved. Please, try again.'));
            }
        }
        $trackingobjects = $this->People->Trackingobjects->find('list', ['limit' => 200]);
        $departments = $this->People->Departments->find('list', ['limit' => 200]);
        $stations = $this->People->Stations->find('list', ['limit' => 200]);
        $this->set(compact('person', 'trackingobjects', 'departments', 'stations'));
        $this->set('_serialize', ['person']);
		$name=$trobj->name;
		$this->set('name',$name);
    }

    /**
     * Delete method
     *
     * @param string|null $id Person id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $person = $this->People->get($id);
        if ($this->People->delete($person)) {
            $this->Flash->success(__('The person has been deleted.'));
        } else {
            $this->Flash->error(__('The person could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
