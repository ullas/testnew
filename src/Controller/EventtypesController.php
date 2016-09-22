<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Eventtypes Controller
 *
 * @property \App\Model\Table\EventtypesTable $Eventtypes
 */
class EventtypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $eventtypes = $this->paginate($this->Eventtypes);

        $this->set(compact('eventtypes'));
        $this->set('_serialize', ['eventtypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Eventtype id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $eventtype = $this->Eventtypes->get($id, [
            'contain' => ['Gpsdata']
        ]);

        $this->set('eventtype', $eventtype);
        $this->set('_serialize', ['eventtype']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $eventtype = $this->Eventtypes->newEntity();
        if ($this->request->is('post')) {
            $eventtype = $this->Eventtypes->patchEntity($eventtype, $this->request->data);
            if ($this->Eventtypes->save($eventtype)) {
                $this->Flash->success(__('The eventtype has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The eventtype could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('eventtype'));
        $this->set('_serialize', ['eventtype']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Eventtype id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $eventtype = $this->Eventtypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $eventtype = $this->Eventtypes->patchEntity($eventtype, $this->request->data);
            if ($this->Eventtypes->save($eventtype)) {
                $this->Flash->success(__('The eventtype has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The eventtype could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('eventtype'));
        $this->set('_serialize', ['eventtype']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Eventtype id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $eventtype = $this->Eventtypes->get($id);
        if ($this->Eventtypes->delete($eventtype)) {
            $this->Flash->success(__('The eventtype has been deleted.'));
        } else {
            $this->Flash->error(__('The eventtype could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
