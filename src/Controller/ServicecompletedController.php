<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Servicecompleted Controller
 *
 * @property \App\Model\Table\ServicecompletedTable $Servicecompleted
 */
class ServicecompletedController extends AppController
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
       $this->loadModel('Servicecompleted');
       $configs=$this->Servicecompleted->find('all')->toArray();
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
		

        $this->loadModel('Servicecompleted');
        $dbout=$this->Servicecompleted->find('all')->toArray();
     
         $fields = array();
		 
				$fields[0] = array("name" =>"Servicecompleted.id"  , "type" => "num");
				$fields[1] = array("name" =>"Servicecompleted.servicesentry_id"  , "type" => "char");
				$fields[2] = array("name" =>"Servicecompleted.servicescompleted"  , "type" => "char");
				$fields[3] = array("name" =>"Servicecompleted.description"  , "type" => "char");
				
								
		
		$this->log($fields);
		$output =$this->Datatablemaster->getView($fields,['Customers'],$usrfiter);
		$out =json_encode($output);  
	   
		$this->response->body($out);
	    return $this->response;
	}


    /**
     * View method
     *
     * @param string|null $id Servicecompleted id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $servicecompleted = $this->Servicecompleted->get($id, [
            'contain' => ['Servicesentries', 'Customers']
        ]);

        $this->set('servicecompleted', $servicecompleted);
        $this->set('_serialize', ['servicecompleted']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $servicecompleted = $this->Servicecompleted->newEntity();
        if ($this->request->is('post')) {
            $servicecompleted = $this->Servicecompleted->patchEntity($servicecompleted, $this->request->data);
			$servicecompleted['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Servicecompleted->save($servicecompleted)) {
            //    $this->Flash->success(__('The servicecompleted has been saved.'));

            //    return $this->redirect(['action' => 'index']);
            } else {
            //    $this->Flash->error(__('The servicecompleted could not be saved. Please, try again.'));
            }
        }
        $servicesentries = $this->Servicecompleted->Servicesentries->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
		$customers = $this->Servicecompleted->Customers->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $this->set(compact('servicecompleted', 'servicesentries','customers'));
        $this->set('_serialize', ['servicecompleted']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Servicecompleted id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $servicecompleted = $this->Servicecompleted->get($id, [
            'contain' => []
        ]);
		if($servicecompleted['customer_id']!= $this->loggedinuser['customer_id'])
		{
			 $this->Flash->success(__('You are not Authorized.'));
			 return $this->redirect(['action' => 'index']);
			
		}
        if ($this->request->is(['patch', 'post', 'put'])) {
            $servicecompleted = $this->Servicecompleted->patchEntity($servicecompleted, $this->request->data);
			$servicecompleted['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Servicecompleted->save($servicecompleted)) {
            //    $this->Flash->success(__('The servicecompleted has been saved.'));

            //    return $this->redirect(['action' => 'index']);
            } else {
            //    $this->Flash->error(__('The servicecompleted could not be saved. Please, try again.'));
            }
        }
        $servicesentries = $this->Servicecompleted->Servicesentries->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $customers = $this->Servicecompleted->Customers->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $this->set(compact('servicecompleted', 'servicesentries'));
        $this->set('_serialize', ['servicecompleted']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Servicecompleted id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        //$this->request->allowMethod(['post', 'delete']);
        $servicecompleted = $this->Servicecompleted->get($id);
		if($servicecompleted['customer_id'] = $this->loggedinuser['customer_id'])
		    {
	        if ($this->Servicecompleted->delete($servicecompleted)) {
	        //    $this->Flash->success(__('The servicecompleted has been deleted.'));
	        } else {
	        //    $this->Flash->error(__('The servicecompleted could not be deleted. Please, try again.'));
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
			    	
					$record = $this->Servicecompleted->get($value);
					
					 if($record['customer_id']== $this->loggedinuser['customer_id']) 
					 {
					 	
						   if ($this->Servicecompleted->delete($record)) 
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
					$this->Flash->success(__('Selected Servicecompleted has been deleted.'));
				}
		        if($failure)
		        {
					$this->Flash->error(__('The Servicecompleted could not be deleted. Please, try again.'));
				}
		
		   }

             return $this->redirect(['action' => 'index']);	
     }
}
