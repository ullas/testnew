<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Passengergroups Controller
 *
 * @property \App\Model\Table\PassengergroupsTable $Passengergroups
 */
class PassengergroupsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Customers']
        ];
        $passengergroups = $this->paginate($this->Passengergroups);

        $this->set(compact('passengergroups'));
        $this->set('_serialize', ['passengergroups']);
    }

    /**
     * View method
     *
     * @param string|null $id Passengergroup id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $passengergroup = $this->Passengergroups->get($id, [
            'contain' => ['Customers', 'Passengers', 'Trips']
        ]);

        $this->set('passengergroup', $passengergroup);
        $this->set('_serialize', ['passengergroup']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $passengergroup = $this->Passengergroups->newEntity();
        if ($this->request->is('post')) {
            $passengergroup = $this->Passengergroups->patchEntity($passengergroup, $this->request->data);
            if ($this->Passengergroups->save($passengergroup)) {
                $this->Flash->success(__('The passengergroup has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The passengergroup could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Passengergroups->Customers->find('list', ['limit' => 200]);
        $passengers = $this->Passengergroups->Passengers->find('list', ['limit' => 200]);
        $this->set(compact('passengergroup', 'customers', 'passengers'));
        $this->set('_serialize', ['passengergroup']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Passengergroup id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $passengergroup = $this->Passengergroups->get($id, [
            'contain' => ['Passengers']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $passengergroup = $this->Passengergroups->patchEntity($passengergroup, $this->request->data);
            if ($this->Passengergroups->save($passengergroup)) {
                $this->Flash->success(__('The passengergroup has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The passengergroup could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Passengergroups->Customers->find('list', ['limit' => 200]);
        $passengers = $this->Passengergroups->Passengers->find('list', ['limit' => 200]);
        $this->set(compact('passengergroup', 'customers', 'passengers'));
        $this->set('_serialize', ['passengergroup']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Passengergroup id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $passengergroup = $this->Passengergroups->get($id);
        if ($this->Passengergroups->delete($passengergroup)) {
            $this->Flash->success(__('The passengergroup has been deleted.'));
        } else {
            $this->Flash->error(__('The passengergroup could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
