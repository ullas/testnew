<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Purposes Controller
 *
 * @property \App\Model\Table\PurposesTable $Purposes
 */
class PurposesController extends AppController
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
       $this->loadModel('Purposes');
       $configs=$this->Purposes->find('all')->toArray();
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
		

        $this->loadModel('Purposes');
        $dbout=$this->Purposes->find('all')->toArray();
     
         $fields = array();
		 
				$fields[0] = array("name" =>"Purposes.id"  , "type" => "num");
				$fields[1] = array("name" =>"Purposes.name"  , "type" => "char");
								
		
		$this->log($fields);
		$output =$this->Datatablemaster->getView($fields,['Customers'],$usrfiter);
		$out =json_encode($output);  
	   
		$this->response->body($out);
	    return $this->response;
	}

    /**
     * View method
     *
     * @param string|null $id Purpose id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $purpose = $this->Purposes->get($id, [
            'contain' => ['Customers', 'Vehicles']
        ]);

        $this->set('purpose', $purpose);
        $this->set('_serialize', ['purpose']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $purpose = $this->Purposes->newEntity();
        if ($this->request->is('post')) {
            $purpose = $this->Purposes->patchEntity($purpose, $this->request->data);
			$purpose['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Purposes->save($purpose)) {
            //    $this->Flash->success(__('The purpose has been saved.'));

            //    return $this->redirect(['action' => 'index']);
            } else {
            //    $this->Flash->error(__('The purpose could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Purposes->Customers->find('list', ['limit' => 200]);
        $this->set(compact('purpose', 'customers'));
        $this->set('_serialize', ['purpose']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Purpose id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $purpose = $this->Purposes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $purpose = $this->Purposes->patchEntity($purpose, $this->request->data);
			$purpose['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Purposes->save($purpose)) {
            //    $this->Flash->success(__('The purpose has been saved.'));

            //    return $this->redirect(['action' => 'index']);
            } else {
            //    $this->Flash->error(__('The purpose could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Purposes->Customers->find('list', ['limit' => 200]);
        $this->set(compact('purpose', 'customers'));
        $this->set('_serialize', ['purpose']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Purpose id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        //$this->request->allowMethod(['post', 'delete']);
        $purpose = $this->Purposes->get($id);
        if ($this->Purposes->delete($purpose)) {
        //    $this->Flash->success(__('The purpose has been deleted.'));
        } else {
        //    $this->Flash->error(__('The purpose could not be deleted. Please, try again.'));
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
			    	
					$record = $this->Purposes->get($value);
					
					 if($record['customer_id']== $this->loggedinuser['customer_id']) 
					 {
					 	
						   if ($this->Purposes->delete($record)) 
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
					$this->Flash->success(__('Selected Purposes has been deleted.'));
				}
		        if($failure)
		        {
					$this->Flash->error(__('The Purposes could not be deleted. Please, try again.'));
				}
		
		   }

             return $this->redirect(['action' => 'index']);	
     }
}
