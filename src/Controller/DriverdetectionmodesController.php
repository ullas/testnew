<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Driverdetectionmodes Controller
 *
 * @property \App\Model\Table\DriverdetectionmodesTable $Driverdetectionmodes
 */
class DriverdetectionmodesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $driverdetectionmodes = $this->paginate($this->Driverdetectionmodes);

        $this->set(compact('driverdetectionmodes'));
        $this->set('_serialize', ['driverdetectionmodes']);
    }

    /**
     * View method
     *
     * @param string|null $id Driverdetectionmode id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $driverdetectionmode = $this->Driverdetectionmodes->get($id, [
            'contain' => ['Vehicles']
        ]);

        $this->set('driverdetectionmode', $driverdetectionmode);
        $this->set('_serialize', ['driverdetectionmode']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $driverdetectionmode = $this->Driverdetectionmodes->newEntity();
        if ($this->request->is('post')) {
            $driverdetectionmode = $this->Driverdetectionmodes->patchEntity($driverdetectionmode, $this->request->data);
            $driverdetectionmode['customer_id']=$this->currentuser['customer_id'];
            if ($this->Driverdetectionmodes->save($driverdetectionmode)) {
                $this->Flash->success(__('The driverdetectionmode has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The driverdetectionmode could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('driverdetectionmode'));
        $this->set('_serialize', ['driverdetectionmode']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Driverdetectionmode id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $driverdetectionmode = $this->Driverdetectionmodes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $driverdetectionmode = $this->Driverdetectionmodes->patchEntity($driverdetectionmode, $this->request->data);
            if ($this->Driverdetectionmodes->save($driverdetectionmode)) {
                $this->Flash->success(__('The driverdetectionmode has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The driverdetectionmode could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('driverdetectionmode'));
        $this->set('_serialize', ['driverdetectionmode']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Driverdetectionmode id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $driverdetectionmode = $this->Driverdetectionmodes->get($id);
        if ($this->Driverdetectionmodes->delete($driverdetectionmode)) {
            $this->Flash->success(__('The driverdetectionmode has been deleted.'));
        } else {
            $this->Flash->error(__('The driverdetectionmode could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
