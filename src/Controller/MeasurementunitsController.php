<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Measurementunits Controller
 *
 * @property \App\Model\Table\MeasurementunitsTable $Measurementunits
 */
class MeasurementunitsController extends AppController
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
        $measurementunits = $this->paginate($this->Measurementunits);

        $this->set(compact('measurementunits'));
        $this->set('_serialize', ['measurementunits']);
    }

    /**
     * View method
     *
     * @param string|null $id Measurementunit id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $measurementunit = $this->Measurementunits->get($id, [
            'contain' => ['Customers', 'Parts']
        ]);

        $this->set('measurementunit', $measurementunit);
        $this->set('_serialize', ['measurementunit']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $measurementunit = $this->Measurementunits->newEntity();
        if ($this->request->is('post')) {
            $measurementunit = $this->Measurementunits->patchEntity($measurementunit, $this->request->data);
            if ($this->Measurementunits->save($measurementunit)) {
                $this->Flash->success(__('The measurementunit has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The measurementunit could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Measurementunits->Customers->find('list', ['limit' => 200]);
        $this->set(compact('measurementunit', 'customers'));
        $this->set('_serialize', ['measurementunit']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Measurementunit id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $measurementunit = $this->Measurementunits->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $measurementunit = $this->Measurementunits->patchEntity($measurementunit, $this->request->data);
            if ($this->Measurementunits->save($measurementunit)) {
                $this->Flash->success(__('The measurementunit has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The measurementunit could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Measurementunits->Customers->find('list', ['limit' => 200]);
        $this->set(compact('measurementunit', 'customers'));
        $this->set('_serialize', ['measurementunit']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Measurementunit id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $measurementunit = $this->Measurementunits->get($id);
        if ($this->Measurementunits->delete($measurementunit)) {
            $this->Flash->success(__('The measurementunit has been deleted.'));
        } else {
            $this->Flash->error(__('The measurementunit could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
