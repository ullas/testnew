<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Ibuttons Controller
 *
 * @property \App\Model\Table\IbuttonsTable $Ibuttons
 */
class IbuttonsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Customers', 'Drivers']
        ];
        $ibuttons = $this->paginate($this->Ibuttons);

        $this->set(compact('ibuttons'));
        $this->set('_serialize', ['ibuttons']);
    }

    /**
     * View method
     *
     * @param string|null $id Ibutton id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ibutton = $this->Ibuttons->get($id, [
            'contain' => ['Customers', 'Drivers']
        ]);

        $this->set('ibutton', $ibutton);
        $this->set('_serialize', ['ibutton']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ibutton = $this->Ibuttons->newEntity();
        if ($this->request->is('post')) {
            $ibutton = $this->Ibuttons->patchEntity($ibutton, $this->request->data);
            if ($this->Ibuttons->save($ibutton)) {
                $this->Flash->success(__('The ibutton has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The ibutton could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Ibuttons->Customers->find('list', ['limit' => 200]);
        $drivers = $this->Ibuttons->Drivers->find('list', ['limit' => 200]);
        $this->set(compact('ibutton', 'customers', 'drivers'));
        $this->set('_serialize', ['ibutton']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ibutton id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ibutton = $this->Ibuttons->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ibutton = $this->Ibuttons->patchEntity($ibutton, $this->request->data);
            if ($this->Ibuttons->save($ibutton)) {
                $this->Flash->success(__('The ibutton has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The ibutton could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Ibuttons->Customers->find('list', ['limit' => 200]);
        $drivers = $this->Ibuttons->Drivers->find('list', ['limit' => 200]);
        $this->set(compact('ibutton', 'customers', 'drivers'));
        $this->set('_serialize', ['ibutton']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ibutton id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ibutton = $this->Ibuttons->get($id);
        if ($this->Ibuttons->delete($ibutton)) {
            $this->Flash->success(__('The ibutton has been deleted.'));
        } else {
            $this->Flash->error(__('The ibutton could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
