<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Inspections Controller
 *
 * @property \App\Model\Table\InspectionsTable $Inspections
 */
class InspectionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Inspectionfoms', 'Customers']
        ];
        $inspections = $this->paginate($this->Inspections);

        $this->set(compact('inspections'));
        $this->set('_serialize', ['inspections']);
    }

    /**
     * View method
     *
     * @param string|null $id Inspection id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $inspection = $this->Inspections->get($id, [
            'contain' => ['Inspectionfoms', 'Customers']
        ]);

        $this->set('inspection', $inspection);
        $this->set('_serialize', ['inspection']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $inspection = $this->Inspections->newEntity();
        if ($this->request->is('post')) {
            $inspection = $this->Inspections->patchEntity($inspection, $this->request->data);
            if ($this->Inspections->save($inspection)) {
                $this->Flash->success(__('The inspection has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The inspection could not be saved. Please, try again.'));
            }
        }
        $inspectionfoms = $this->Inspections->Inspectionfoms->find('list', ['limit' => 200]);
        $customers = $this->Inspections->Customers->find('list', ['limit' => 200]);
        $this->set(compact('inspection', 'inspectionfoms', 'customers'));
        $this->set('_serialize', ['inspection']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Inspection id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $inspection = $this->Inspections->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $inspection = $this->Inspections->patchEntity($inspection, $this->request->data);
            if ($this->Inspections->save($inspection)) {
                $this->Flash->success(__('The inspection has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The inspection could not be saved. Please, try again.'));
            }
        }
        $inspectionfoms = $this->Inspections->Inspectionfoms->find('list', ['limit' => 200]);
        $customers = $this->Inspections->Customers->find('list', ['limit' => 200]);
        $this->set(compact('inspection', 'inspectionfoms', 'customers'));
        $this->set('_serialize', ['inspection']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Inspection id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $inspection = $this->Inspections->get($id);
        if ($this->Inspections->delete($inspection)) {
            $this->Flash->success(__('The inspection has been deleted.'));
        } else {
            $this->Flash->error(__('The inspection could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
