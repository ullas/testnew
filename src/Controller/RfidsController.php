<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Rfids Controller
 *
 * @property \App\Model\Table\RfidsTable $Rfids
 */
class RfidsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Customers', 'Passengers']
        ];
        $rfids = $this->paginate($this->Rfids);

        $this->set(compact('rfids'));
        $this->set('_serialize', ['rfids']);
    }

    /**
     * View method
     *
     * @param string|null $id Rfid id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $rfid = $this->Rfids->get($id, [
            'contain' => ['Customers', 'Passengers', 'Drivers']
        ]);

        $this->set('rfid', $rfid);
        $this->set('_serialize', ['rfid']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $rfid = $this->Rfids->newEntity();
        if ($this->request->is('post')) {
            $rfid = $this->Rfids->patchEntity($rfid, $this->request->data);
            if ($this->Rfids->save($rfid)) {
                $this->Flash->success(__('The rfid has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The rfid could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Rfids->Customers->find('list', ['limit' => 200]);
        $passengers = $this->Rfids->Passengers->find('list', ['limit' => 200]);
        $this->set(compact('rfid', 'customers', 'passengers'));
        $this->set('_serialize', ['rfid']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Rfid id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $rfid = $this->Rfids->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rfid = $this->Rfids->patchEntity($rfid, $this->request->data);
            if ($this->Rfids->save($rfid)) {
                $this->Flash->success(__('The rfid has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The rfid could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Rfids->Customers->find('list', ['limit' => 200]);
        $passengers = $this->Rfids->Passengers->find('list', ['limit' => 200]);
        $this->set(compact('rfid', 'customers', 'passengers'));
        $this->set('_serialize', ['rfid']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Rfid id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $rfid = $this->Rfids->get($id);
        if ($this->Rfids->delete($rfid)) {
            $this->Flash->success(__('The rfid has been deleted.'));
        } else {
            $this->Flash->error(__('The rfid could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
