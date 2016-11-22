<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Ownerships Controller
 *
 * @property \App\Model\Table\OwnershipsTable $Ownerships
 */
class OwnershipsController extends AppController
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
        $this->loadModel('Ownerships');
       $configs=$this->Ownerships->find('all')->toArray();
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
		

        $this->loadModel('Ownerships');
        $dbout=$this->Ownerships->find('all')->toArray();
     
         $fields = array();
		 
				$fields[0] = array("name" =>"Ownerships.id"  , "type" => "num");
				$fields[1] = array("name" =>"Ownerships.name"  , "type" => "char");
				$fields[2] = array("name" =>"Ownerships.description"  , "type" => "char");
				
				
		
		$this->log($fields);
		$output =$this->Datatablemaster->getView($fields,['Customers'],$usrfiter);
		$out =json_encode($output);  
	   
		$this->response->body($out);
	    return $this->response;
	}	
		
    /**
     * View method
     *
     * @param string|null $id Ownership id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ownership = $this->Ownerships->get($id, [
            'contain' => ['Customers', 'Vehicles']
        ]);

        $this->set('ownership', $ownership);
        $this->set('_serialize', ['ownership']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ownership = $this->Ownerships->newEntity();
        if ($this->request->is('post')) {
            $ownership = $this->Ownerships->patchEntity($ownership, $this->request->data);
			$ownership['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Ownerships->save($ownership)) {
         //       $this->Flash->success(__('The ownership has been saved.'));

         //       return $this->redirect(['action' => 'index']);
            } else {
         //       $this->Flash->error(__('The ownership could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Ownerships->Customers->find('list', ['limit' => 200]);
        $this->set(compact('ownership', 'customers'));
        $this->set('_serialize', ['ownership']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ownership id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ownership = $this->Ownerships->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ownership = $this->Ownerships->patchEntity($ownership, $this->request->data);
			$ownership['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Ownerships->save($ownership)) {
         //       $this->Flash->success(__('The ownership has been saved.'));

          //      return $this->redirect(['action' => 'index']);
            } else {
          //      $this->Flash->error(__('The ownership could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Ownerships->Customers->find('list', ['limit' => 200]);
        $this->set(compact('ownership', 'customers'));
        $this->set('_serialize', ['ownership']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ownership id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
      //  $this->request->allowMethod(['post', 'delete']);
        $ownership = $this->Ownerships->get($id);
        if ($this->Ownerships->delete($ownership)) {
      //      $this->Flash->success(__('The ownership has been deleted.'));
        } else {
       //     $this->Flash->error(__('The ownership could not be deleted. Please, try again.'));
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
			    	
					$record = $this->Ownerships->get($value);
					
					 if($record['customer_id']== $this->loggedinuser['customer_id']) 
					 {
					 	
						   if ($this->Ownerships->delete($record)) 
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
					$this->Flash->success(__('Selected Ownerships has been deleted.'));
				}
		        if($failure)
		        {
					$this->Flash->error(__('The Ownerships could not be deleted. Please, try again.'));
				}
		
		   }

             return $this->redirect(['action' => 'index']);	
     }
}
