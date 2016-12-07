<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Workorderstatuses Controller
 *
 * @property \App\Model\Table\WorkorderstatusesTable $Workorderstatuses
 */
class WorkorderstatusesController extends AppController
{

    /**
     * Components
     *
     * @var array
     */
    public $components = ['Datatablemaster'];
	
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
       $this->loadModel('Workorderstatuses');
       $configs=$this->Workorderstatuses->find('all')->toArray();
	   $actions =[['name'=>'delete','title'=>'Delete','class'=>' label-danger ']];
       $additional= ['basic'=>['All'],
      	                'additional'=>[ ]
      	            ];
	   $this->set('additional',$additional);
	   $this->set('actions',$actions);	
       $this->set('configs',$configs);	
       $this->set('_serialize', ['configs','actions']);
    }
	
	public function ajaxdata() 
	{
        $this->autoRender= false;
		$usrfiter="";
		$basic = isset($this->request->query['basic'])?$this->request->query['basic']:"" ;
		$additional = isset($this->request->query['additional'])?$this->request->query['additional']:"";
		

        $this->loadModel('Workorderstatuses');
        $dbout=$this->Workorderstatuses->find('all')->toArray();
     
         $fields = array();
		 
				$fields[0] = array("name" =>"Workorderstatuses.id"  , "type" => "num");
				$fields[1] = array("name" =>"Workorderstatuses.name"  , "type" => "char");
				$fields[2] = array("name" =>"Workorderstatuses.description"  , "type" => "char");
								
		
		$this->log($fields);
		$output =$this->Datatablemaster->getView($fields,['Customers'],$usrfiter);
		$out =json_encode($output);  
	   
		$this->response->body($out);
	    return $this->response;
	}

    /**
     * View method
     *
     * @param string|null $id Workorderstatus id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $workorderstatus = $this->Workorderstatuses->get($id, [
            'contain' => ['Customers', 'Workorders']
        ]);

        $this->set('workorderstatus', $workorderstatus);
        $this->set('_serialize', ['workorderstatus']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $workorderstatus = $this->Workorderstatuses->newEntity();
        if ($this->request->is('post')) {
            $workorderstatus = $this->Workorderstatuses->patchEntity($workorderstatus, $this->request->data);
			$workorderstatus['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Workorderstatuses->save($workorderstatus)) {
           //     $this->Flash->success(__('The workorderstatus has been saved.'));

           //     return $this->redirect(['action' => 'index']);
            } else {
           //     $this->Flash->error(__('The workorderstatus could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Workorderstatuses->Customers->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $this->set(compact('workorderstatus', 'customers'));
        $this->set('_serialize', ['workorderstatus']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Workorderstatus id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $workorderstatus = $this->Workorderstatuses->get($id, [
            'contain' => []
        ]);
		if($workorderstatus['customer_id']!= $this->loggedinuser['customer_id'])
		{
			 $this->Flash->success(__('You are not Authorized.'));
			 return $this->redirect(['action' => 'index']);
			
		}
        if ($this->request->is(['patch', 'post', 'put'])) {
            $workorderstatus = $this->Workorderstatuses->patchEntity($workorderstatus, $this->request->data);
			$workorderstatus['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Workorderstatuses->save($workorderstatus)) {
         //       $this->Flash->success(__('The workorderstatus has been saved.'));

          //      return $this->redirect(['action' => 'index']);
            } else {
          //      $this->Flash->error(__('The workorderstatus could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Workorderstatuses->Customers->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $this->set(compact('workorderstatus', 'customers'));
        $this->set('_serialize', ['workorderstatus']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Workorderstatus id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
       // $this->request->allowMethod(['post', 'delete']);
        $workorderstatus = $this->Workorderstatuses->get($id);
		if($workorderstatus['customer_id'] = $this->loggedinuser['customer_id'])
	    {
		        if ($this->Workorderstatuses->delete($workorderstatus)) {
		        //    $this->Flash->success(__('The workorderstatus has been deleted.'));
		        } else {
		       //     $this->Flash->error(__('The workorderstatus could not be deleted. Please, try again.'));
		        }
		 }
		 else
		 {
	   	    $this->Flash->error(__('You are not authorized'));
		
	     }
        return $this->redirect(['action' => 'index']);
    }
	public function deleteAll($id=null)
	{
    	$this->request->allowMethod(['post', 'deleteall']);
        $sucess=false;$failure=false;
        $data=$this->request->data;
			
		if(isset($data)){
		   foreach($data as $key =>$value){
		   	   		
		   	   	$itemna=explode("-",$key);
			    
			    if(count($itemna)== 2 && $itemna[0]=='chk'){
			    	
					$record = $this->Workorderstatuses->get($value);
					
					 if($record['customer_id']== $this->loggedinuser['customer_id']) 
					 {
					 	
						   if ($this->Workorderstatuses->delete($record)) 
						    {
					           $sucess= $sucess | true;
					        } else {
					           $failure= $failure | true;
					        }
					}
				}  	  
			}
		   		        
		
				if($sucess)
				{
					$this->Flash->success(__('Selected Workorder statuses has been deleted.'));
				}
		        if($failure)
		        {
					$this->Flash->error(__('The Workorder statuses could not be deleted. Please, try again.'));
				}
		
		   }

             return $this->redirect(['action' => 'index']);	
     }
}
