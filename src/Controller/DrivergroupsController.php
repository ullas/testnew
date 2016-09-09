<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Drivergroups Controller
 *
 * @property \App\Model\Table\DrivergroupsTable $Drivergroups
 */
class DrivergroupsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Defaultdrivers']
        ];
        $drivergroups = $this->paginate($this->Drivergroups);

        $this->set(compact('drivergroups'));
        $this->set('_serialize', ['drivergroups']);
    }

    /**
     * View method
     *
     * @param string|null $id Drivergroup id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $drivergroup = $this->Drivergroups->get($id, [
            'contain' => ['Defaultdrivers', 'Drivers']
        ]);

        $this->set('drivergroup', $drivergroup);
        $this->set('_serialize', ['drivergroup']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $drivergroup = $this->Drivergroups->newEntity();
        if ($this->request->is('post')) {
            $drivergroup = $this->Drivergroups->patchEntity($drivergroup, $this->request->data);
            if ($this->Drivergroups->save($drivergroup)) {
                $this->Flash->success(__('The drivergroup has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The drivergroup could not be saved. Please, try again.'));
            }
        }
        $defaultdrivers = $this->Drivergroups->Defaultdrivers->find('list', ['limit' => 200]);
        $drivers = $this->Drivergroups->Drivers->find('list', ['limit' => 200]);
        $this->set(compact('drivergroup', 'defaultdrivers', 'drivers'));
        $this->set('_serialize', ['drivergroup']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Drivergroup id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $drivergroup = $this->Drivergroups->get($id, [
            'contain' => ['Drivers']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $drivergroup = $this->Drivergroups->patchEntity($drivergroup, $this->request->data);
            if ($this->Drivergroups->save($drivergroup)) {
                $this->Flash->success(__('The drivergroup has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The drivergroup could not be saved. Please, try again.'));
            }
        }
        $defaultdrivers = $this->Drivergroups->Defaultdrivers->find('list', ['limit' => 200]);
        $drivers = $this->Drivergroups->Drivers->find('list', ['limit' => 200]);
        $this->set(compact('drivergroup', 'defaultdrivers', 'drivers'));
        $this->set('_serialize', ['drivergroup']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Drivergroup id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $drivergroup = $this->Drivergroups->get($id);
        if ($this->Drivergroups->delete($drivergroup)) {
            $this->Flash->success(__('The drivergroup has been deleted.'));
        } else {
            $this->Flash->error(__('The drivergroup could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
