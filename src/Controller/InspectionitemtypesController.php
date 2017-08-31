<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Inspectionitemtypes Controller
 *
 * @property \App\Model\Table\InspectionitemtypesTable $Inspectionitemtypes
 */
class InspectionitemtypesController extends AppController
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
        $inspectionitemtypes = $this->paginate($this->Inspectionitemtypes);

        $this->set(compact('inspectionitemtypes'));
        $this->set('_serialize', ['inspectionitemtypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Inspectionitemtype id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $inspectionitemtype = $this->Inspectionitemtypes->get($id, [
            'contain' => ['Customers', 'Inspectionitems']
        ]);

        $this->set('inspectionitemtype', $inspectionitemtype);
        $this->set('_serialize', ['inspectionitemtype']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $inspectionitemtype = $this->Inspectionitemtypes->newEntity();
        if ($this->request->is('post')) {
            $inspectionitemtype = $this->Inspectionitemtypes->patchEntity($inspectionitemtype, $this->request->data);
            if ($this->Inspectionitemtypes->save($inspectionitemtype)) {
                $this->Flash->success(__('The inspectionitemtype has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The inspectionitemtype could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Inspectionitemtypes->Customers->find('list', ['limit' => 200]);
        $this->set(compact('inspectionitemtype', 'customers'));
        $this->set('_serialize', ['inspectionitemtype']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Inspectionitemtype id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $inspectionitemtype = $this->Inspectionitemtypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $inspectionitemtype = $this->Inspectionitemtypes->patchEntity($inspectionitemtype, $this->request->data);
            if ($this->Inspectionitemtypes->save($inspectionitemtype)) {
                $this->Flash->success(__('The inspectionitemtype has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The inspectionitemtype could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Inspectionitemtypes->Customers->find('list', ['limit' => 200]);
        $this->set(compact('inspectionitemtype', 'customers'));
        $this->set('_serialize', ['inspectionitemtype']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Inspectionitemtype id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $inspectionitemtype = $this->Inspectionitemtypes->get($id);
        if ($this->Inspectionitemtypes->delete($inspectionitemtype)) {
            $this->Flash->success(__('The inspectionitemtype has been deleted.'));
        } else {
            $this->Flash->error(__('The inspectionitemtype could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
