<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Inspectionitems Controller
 *
 * @property \App\Model\Table\InspectionitemsTable $Inspectionitems
 */
class InspectionitemsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Inspectionitemtypes', 'Customers']
        ];
        $inspectionitems = $this->paginate($this->Inspectionitems);

        $this->set(compact('inspectionitems'));
        $this->set('_serialize', ['inspectionitems']);
    }

    /**
     * View method
     *
     * @param string|null $id Inspectionitem id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $inspectionitem = $this->Inspectionitems->get($id, [
            'contain' => ['Inspectionitemtypes', 'Customers', 'Inspectionforms']
        ]);

        $this->set('inspectionitem', $inspectionitem);
        $this->set('_serialize', ['inspectionitem']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $inspectionitem = $this->Inspectionitems->newEntity();
        if ($this->request->is('post')) {
            $inspectionitem = $this->Inspectionitems->patchEntity($inspectionitem, $this->request->data);
            if ($this->Inspectionitems->save($inspectionitem)) {
                $this->Flash->success(__('The inspectionitem has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The inspectionitem could not be saved. Please, try again.'));
            }
        }
        $inspectionitemtypes = $this->Inspectionitems->Inspectionitemtypes->find('list', ['limit' => 200]);
        $customers = $this->Inspectionitems->Customers->find('list', ['limit' => 200]);
        $inspectionforms = $this->Inspectionitems->Inspectionforms->find('list', ['limit' => 200]);
        $this->set(compact('inspectionitem', 'inspectionitemtypes', 'customers', 'inspectionforms'));
        $this->set('_serialize', ['inspectionitem']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Inspectionitem id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $inspectionitem = $this->Inspectionitems->get($id, [
            'contain' => ['Inspectionforms']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $inspectionitem = $this->Inspectionitems->patchEntity($inspectionitem, $this->request->data);
            if ($this->Inspectionitems->save($inspectionitem)) {
                $this->Flash->success(__('The inspectionitem has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The inspectionitem could not be saved. Please, try again.'));
            }
        }
        $inspectionitemtypes = $this->Inspectionitems->Inspectionitemtypes->find('list', ['limit' => 200]);
        $customers = $this->Inspectionitems->Customers->find('list', ['limit' => 200]);
        $inspectionforms = $this->Inspectionitems->Inspectionforms->find('list', ['limit' => 200]);
        $this->set(compact('inspectionitem', 'inspectionitemtypes', 'customers', 'inspectionforms'));
        $this->set('_serialize', ['inspectionitem']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Inspectionitem id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $inspectionitem = $this->Inspectionitems->get($id);
        if ($this->Inspectionitems->delete($inspectionitem)) {
            $this->Flash->success(__('The inspectionitem has been deleted.'));
        } else {
            $this->Flash->error(__('The inspectionitem could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	
	public function addInspectionItems()
	{
		if($this->request->is('ajax')) 
		    	{
		    		$this->autoRender=false;
					$inspectionitem = $this->Inspectionitems->newEntity();
					$this->autoRender=false;
					$this->loadModel('Inspectionitems');
			
					$it="";
	    			$it=explode(",",($this->request->query['content']));
		    		$stst = json_encode($this->request->query['content']);
					$contentarray = array();
					 for ($i=0; $i <substr_count($stst, ',')+1 ; $i++) {
					 	
						 array_push($contentarray, $it[$i]);
					 }
				 
				   // $this->response->body(json_encode($contentarray));			
	    		   // return $this->response;
				 
					// foreach(json_encode($this->request->query['content'])  as $d){
	    			foreach($contentarray as $d)
	    			{
				$inspectionitem = $this->Inspectionitems->newEntity();
						$items="";
		    			$items=explode("^",$d);
						$this->request->data['name']=$items[1];
		            	$this->request->data['inspectionitemtype_id']=$items[3];
						$this->request->data['description']=$items[2];
						// $this->request->data['required']=$items[5];
						$this->request->data['inspectionform_id']=$items[0];
						$inspectionitem=$this->Inspectionitems->patchEntity($inspectionitem,$this->request->data);
						$inspectionitem['customer_id']=$this->loggedinuser['customer_id'];
						if ($this->Inspectionitems->save($inspectionitem)) 
							{
								 $this->Flash->success(__('Succesfully added'));
							}
					}
				}
		
	}
}
