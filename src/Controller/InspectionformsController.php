<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Inspectionforms Controller
 *
 * @property \App\Model\Table\InspectionformsTable $Inspectionforms
 */
class InspectionformsController extends AppController
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
        $inspectionforms = $this->paginate($this->Inspectionforms);

        $this->set(compact('inspectionforms'));
        $this->set('_serialize', ['inspectionforms']);
    }

    /**
     * View method
     *
     * @param string|null $id Inspectionform id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $inspectionform = $this->Inspectionforms->get($id, [
            'contain' => ['Customers', 'Inspections']
        ]);

        $this->set('inspectionform', $inspectionform);
        $this->set('_serialize', ['inspectionform']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $inspectionform = $this->Inspectionforms->newEntity();
        if ($this->request->is('post')) {
            $inspectionform = $this->Inspectionforms->patchEntity($inspectionform, $this->request->data);
			$inspectionform['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Inspectionforms->save($inspectionform)) {
                $this->Flash->success(__('The inspectionform has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The inspectionform could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Inspectionforms->Customers->find('list', ['limit' => 200]);
        $this->set(compact('inspectionform', 'customers'));
        $this->set('_serialize', ['inspectionform']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Inspectionform id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $inspectionform = $this->Inspectionforms->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $inspectionform = $this->Inspectionforms->patchEntity($inspectionform, $this->request->data);
            if ($this->Inspectionforms->save($inspectionform)) {
                $this->Flash->success(__('The inspectionform has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The inspectionform could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Inspectionforms->Customers->find('list', ['limit' => 200]);
        $this->set(compact('inspectionform', 'customers'));
        $this->set('_serialize', ['inspectionform']);
    }
	
	public function createajaxData()
		{
			
    	
			if($this->request->is('ajax')) 
				{
					$this->autoRender=false;
					$inspectionform = $this->Inspectionforms->newEntity();
					$this->request->data['name']=$this->request->query['name'];
					$this->request->data['data']=$this->request->query['data'];
					$inspectionform = $this->Inspectionforms->patchEntity($inspectionform,$this->request->data);
					$inspectionform['customer_id']=$this->loggedinuser['customer_id'];
					if ($this->Inspectionforms->save($inspectionform)) 
						{
							$this->response->body(json_encode($inspectionform['id']));			
				    		return $this->response;
				    	} 
			        else 
			        	{
			            	$this->response->body("error");
				    		return $this->response;
			            }
		            }
        }
    /**
     * Delete method
     *
     * @param string|null $id Inspectionform id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $inspectionform = $this->Inspectionforms->get($id);
        if ($this->Inspectionforms->delete($inspectionform)) {
            $this->Flash->success(__('The inspectionform has been deleted.'));
        } else {
            $this->Flash->error(__('The inspectionform could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
