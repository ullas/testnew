<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Servicetasks Controller
 *
 * @property \App\Model\Table\ServicetasksTable $Servicetasks
 */
class ServicetasksController extends AppController
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
       $this->loadModel('Servicetasks');
       $configs=$this->Servicetasks->find('all')->toArray();
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
		

        $this->loadModel('Servicetasks');
        $dbout=$this->Servicetasks->find('all')->toArray();
     
         $fields = array();
		 
				$fields[0] = array("name" =>"Servicetasks.id"  , "type" => "num");
				$fields[1] = array("name" =>"Servicetasks.name"  , "type" => "char");
								
		
		$this->log($fields);
		$output =$this->Datatablemaster->getView($fields,['Customers'],$usrfiter);
		$out =json_encode($output);  
	   
		$this->response->body($out);
	    return $this->response;
	}

    /**
     * View method
     *
     * @param string|null $id Servicetask id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $servicetask = $this->Servicetasks->get($id, [
            'contain' => ['Customers', 'Servicereminders']
        ]);

        $this->set('servicetask', $servicetask);
        $this->set('_serialize', ['servicetask']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $servicetask = $this->Servicetasks->newEntity();
        if ($this->request->is('post')) {
            $servicetask = $this->Servicetasks->patchEntity($servicetask, $this->request->data);
			$servicetask['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Servicetasks->save($servicetask)) {
            //    $this->Flash->success(__('The servicetask has been saved.'));

            //    return $this->redirect(['action' => 'index']);
            } else {
            //    $this->Flash->error(__('The servicetask could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Servicetasks->Customers->find('list', ['limit' => 200]);
        $this->set(compact('servicetask', 'customers'));
        $this->set('_serialize', ['servicetask']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Servicetask id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $servicetask = $this->Servicetasks->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $servicetask = $this->Servicetasks->patchEntity($servicetask, $this->request->data);
			$servicetask['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Servicetasks->save($servicetask)) {
            //    $this->Flash->success(__('The servicetask has been saved.'));

            //    return $this->redirect(['action' => 'index']);
            } else {
             //   $this->Flash->error(__('The servicetask could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Servicetasks->Customers->find('list', ['limit' => 200]);
        $this->set(compact('servicetask', 'customers'));
        $this->set('_serialize', ['servicetask']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Servicetask id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        //$this->request->allowMethod(['post', 'delete']);
        $servicetask = $this->Servicetasks->get($id);
        if ($this->Servicetasks->delete($servicetask)) {
        //    $this->Flash->success(__('The servicetask has been deleted.'));
        } else {
        //    $this->Flash->error(__('The servicetask could not be deleted. Please, try again.'));
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
			    	
					$record = $this->Servicetasks->get($value);
					
					 if($record['customer_id']== $this->loggedinuser['customer_id']) 
					 {
					 	
						   if ($this->Servicetasks->delete($record)) 
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
					$this->Flash->success(__('Selected Servicetasks has been deleted.'));
				}
		        if($failure)
		        {
					$this->Flash->error(__('The Servicetasks could not be deleted. Please, try again.'));
				}
		
		   }

             return $this->redirect(['action' => 'index']);	
     }
}
