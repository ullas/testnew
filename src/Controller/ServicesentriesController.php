<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Servicesentries Controller
 *
 * @property \App\Model\Table\ServicesentriesTable $Servicesentries
 */
class ServicesentriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Vehicles', 'Vendors']
        ];
        $servicesentries = $this->paginate($this->Servicesentries);

        $this->set(compact('servicesentries'));
        $this->set('_serialize', ['servicesentries']);
    }

    /**
     * View method
     *
     * @param string|null $id Servicesentry id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $servicesentry = $this->Servicesentries->get($id, [
            'contain' => ['Vehicles', 'Vendors', 'Servicecompleted', 'Servicedocuments']
        ]);

        $this->set('servicesentry', $servicesentry);
        $this->set('_serialize', ['servicesentry']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $servicesentry = $this->Servicesentries->newEntity();
        if ($this->request->is('post')) {
            $servicesentry = $this->Servicesentries->patchEntity($servicesentry, $this->request->data);
            if ($this->Servicesentries->save($servicesentry)) {
                $this->Flash->success(__('The servicesentry has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The servicesentry could not be saved. Please, try again.'));
            }
        }
        $vehicles = $this->Servicesentries->Vehicles->find('list', ['limit' => 200]);
        $vendors = $this->Servicesentries->Vendors->find('list', ['limit' => 200]);
        $this->set(compact('servicesentry', 'vehicles', 'vendors'));
        $this->set('_serialize', ['servicesentry']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Servicesentry id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $servicesentry = $this->Servicesentries->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $servicesentry = $this->Servicesentries->patchEntity($servicesentry, $this->request->data);
            if ($this->Servicesentries->save($servicesentry)) {
                $this->Flash->success(__('The servicesentry has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The servicesentry could not be saved. Please, try again.'));
            }
        }
        $vehicles = $this->Servicesentries->Vehicles->find('list', ['limit' => 200]);
        $vendors = $this->Servicesentries->Vendors->find('list', ['limit' => 200]);
        $this->set(compact('servicesentry', 'vehicles', 'vendors'));
        $this->set('_serialize', ['servicesentry']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Servicesentry id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $servicesentry = $this->Servicesentries->get($id);
        if ($this->Servicesentries->delete($servicesentry)) {
            $this->Flash->success(__('The servicesentry has been deleted.'));
        } else {
            $this->Flash->error(__('The servicesentry could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
