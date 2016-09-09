<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Routes Controller
 *
 * @property \App\Model\Table\RoutesTable $Routes
 */
class RoutesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Vehicles', 'Customers', 'Users', 'Groups']
        ];
        $routes = $this->paginate($this->Routes);

        $this->set(compact('routes'));
        $this->set('_serialize', ['routes']);
    }

    /**
     * View method
     *
     * @param string|null $id Route id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $route = $this->Routes->get($id, [
            'contain' => ['Vehicles', 'Customers', 'Users', 'Groups', 'Schedules', 'Trips']
        ]);

        $this->set('route', $route);
        $this->set('_serialize', ['route']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $route = $this->Routes->newEntity();
        if ($this->request->is('post')) {
            $route = $this->Routes->patchEntity($route, $this->request->data);
            if ($this->Routes->save($route)) {
                $this->Flash->success(__('The route has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The route could not be saved. Please, try again.'));
            }
        }
        $vehicles = $this->Routes->Vehicles->find('list', ['limit' => 200]);
        $customers = $this->Routes->Customers->find('list', ['limit' => 200]);
        $users = $this->Routes->Users->find('list', ['limit' => 200]);
        $groups = $this->Routes->Groups->find('list', ['limit' => 200]);
        $this->set(compact('route', 'vehicles', 'customers', 'users', 'groups'));
        $this->set('_serialize', ['route']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Route id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $route = $this->Routes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $route = $this->Routes->patchEntity($route, $this->request->data);
            if ($this->Routes->save($route)) {
                $this->Flash->success(__('The route has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The route could not be saved. Please, try again.'));
            }
        }
        $vehicles = $this->Routes->Vehicles->find('list', ['limit' => 200]);
        $customers = $this->Routes->Customers->find('list', ['limit' => 200]);
        $users = $this->Routes->Users->find('list', ['limit' => 200]);
        $groups = $this->Routes->Groups->find('list', ['limit' => 200]);
        $this->set(compact('route', 'vehicles', 'customers', 'users', 'groups'));
        $this->set('_serialize', ['route']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Route id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $route = $this->Routes->get($id);
        if ($this->Routes->delete($route)) {
            $this->Flash->success(__('The route has been deleted.'));
        } else {
            $this->Flash->error(__('The route could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
