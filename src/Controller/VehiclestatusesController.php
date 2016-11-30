<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Vehiclestatuses Controller
 *
 * @property \App\Model\Table\VehiclestatusesTable $Vehiclestatuses
 */
class VehiclestatusesController extends AppController
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
       $this->loadModel('Vehiclestatuses');
       $configs=$this->Vehiclestatuses->find('all')->toArray();
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
		

        $this->loadModel('Vehiclestatuses');
        $dbout=$this->Vehiclestatuses->find('all')->toArray();
     
         $fields = array();
		 
				$fields[0] = array("name" =>"Vehiclestatuses.id"  , "type" => "num");
				$fields[1] = array("name" =>"Vehiclestatuses.name"  , "type" => "char");
				$fields[2] = array("name" =>"Vehiclestatuses.description"  , "type" => "char");
								
		
		$this->log($fields);
		$output =$this->Datatablemaster->getView($fields,['Customers'],$usrfiter);
		$out =json_encode($output);  
	   
		$this->response->body($out);
	    return $this->response;
	}

    /**
     * View method
     *
     * @param string|null $id Vehiclestatus id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $vehiclestatus = $this->Vehiclestatuses->get($id, [
            'contain' => ['Customers', 'Vehicles']
        ]);

        $this->set('vehiclestatus', $vehiclestatus);
        $this->set('_serialize', ['vehiclestatus']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $vehiclestatus = $this->Vehiclestatuses->newEntity();
        if ($this->request->is('post')) {
            $vehiclestatus = $this->Vehiclestatuses->patchEntity($vehiclestatus, $this->request->data);
			$vehiclestatus['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Vehiclestatuses->save($vehiclestatus)) {
            //    $this->Flash->success(__('The vehiclestatus has been saved.'));

            //    return $this->redirect(['action' => 'index']);
            } else {
            //    $this->Flash->error(__('The vehiclestatus could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Vehiclestatuses->Customers->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $this->set(compact('vehiclestatus', 'customers'));
        $this->set('_serialize', ['vehiclestatus']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Vehiclestatus id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $vehiclestatus = $this->Vehiclestatuses->get($id, [
            'contain' => []
        ]);
		if($vehiclestatus['customer_id']!= $this->loggedinuser['customer_id'])
		{
			 $this->Flash->success(__('You are not Authorized.'));
			 return $this->redirect(['action' => 'index']);
			
		}
        if ($this->request->is(['patch', 'post', 'put'])) {
            $vehiclestatus = $this->Vehiclestatuses->patchEntity($vehiclestatus, $this->request->data);
			$vehiclestatus['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Vehiclestatuses->save($vehiclestatus)) {
           //     $this->Flash->success(__('The vehiclestatus has been saved.'));

            //    return $this->redirect(['action' => 'index']);
            } else {
            //    $this->Flash->error(__('The vehiclestatus could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Vehiclestatuses->Customers->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $this->set(compact('vehiclestatus', 'customers'));
        $this->set('_serialize', ['vehiclestatus']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Vehiclestatus id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
       // $this->request->allowMethod(['post', 'delete']);
        $vehiclestatus = $this->Vehiclestatuses->get($id);
		if($vehiclestatus['customer_id'] = $this->loggedinuser['customer_id'])
	    {
	        if ($this->Vehiclestatuses->delete($vehiclestatus)) {
	       //     $this->Flash->success(__('The vehiclestatus has been deleted.'));
	        } else {
	       //     $this->Flash->error(__('The vehiclestatus could not be deleted. Please, try again.'));
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
			    	
					$record = $this->Vehiclestatuses->get($value);
					
					 if($record['customer_id']== $this->loggedinuser['customer_id']) 
					 {
					 	
						   if ($this->Vehiclestatuses->delete($record)) 
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
					$this->Flash->success(__('Selected Vehiclestatuses has been deleted.'));
				}
		        if($failure)
		        {
					$this->Flash->error(__('The Vehiclestatuses could not be deleted. Please, try again.'));
				}
		
		   }

             return $this->redirect(['action' => 'index']);	
     }
}
