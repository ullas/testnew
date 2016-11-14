<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Vehicletypes Controller
 *
 * @property \App\Model\Table\VehicletypesTable $Vehicletypes
 */
class VehicletypesController extends AppController
{

    /**
     * Components
     *
     * @var array
     */
    public $components = ['Datatable'];
	
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
       $this->loadModel('Vehicletypes');
       $configs=$this->Vehicletypes->find('all')->toArray();
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
		

        $this->loadModel('Vehicletypes');
        $dbout=$this->Vehicletypes->find('all')->toArray();
     
         $fields = array();
		 
				$fields[0] = array("name" =>"Vehicletypes.id"  , "type" => "num");
				$fields[1] = array("name" =>"Vehicletypes.name"  , "type" => "char");
								
		
		$this->log($fields);
		$output =$this->Datatable->getView($fields,['Customers'],$usrfiter);
		$out =json_encode($output);  
	   
		$this->response->body($out);
	    return $this->response;
	}

    /**
     * View method
     *
     * @param string|null $id Vehicletype id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $vehicletype = $this->Vehicletypes->get($id, [
            'contain' => ['Vehicles']
        ]);

        $this->set('vehicletype', $vehicletype);
        $this->set('_serialize', ['vehicletype']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $vehicletype = $this->Vehicletypes->newEntity();
        if ($this->request->is('post')) {
            $vehicletype = $this->Vehicletypes->patchEntity($vehicletype, $this->request->data);
			$vehicletype['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Vehicletypes->save($vehicletype)) {
                $this->Flash->success(__('The vehicletype has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The vehicletype could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('vehicletype'));
        $this->set('_serialize', ['vehicletype']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Vehicletype id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $vehicletype = $this->Vehicletypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $vehicletype = $this->Vehicletypes->patchEntity($vehicletype, $this->request->data);
			$vehicletype['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Vehicletypes->save($vehicletype)) {
                $this->Flash->success(__('The vehicletype has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The vehicletype could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('vehicletype'));
        $this->set('_serialize', ['vehicletype']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Vehicletype id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $vehicletype = $this->Vehicletypes->get($id);
        if ($this->Vehicletypes->delete($vehicletype)) {
            $this->Flash->success(__('The vehicletype has been deleted.'));
        } else {
            $this->Flash->error(__('The vehicletype could not be deleted. Please, try again.'));
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
			    	
					$record = $this->Vehicletypes->get($value);
					
					 if($record['customer_id']== $this->loggedinuser['customer_id']) 
					 {
					 	
						   if ($this->Vehicletypes->delete($record)) 
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
					$this->Flash->success(__('Selected Vehicletypes has been deleted.'));
				}
		        if($failure)
		        {
					$this->Flash->error(__('The Vehicletypes could not be deleted. Please, try again.'));
				}
		
		   }

             return $this->redirect(['action' => 'index']);	
     }
}
