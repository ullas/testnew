<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Deiveryorders Controller
 *
 * @property \App\Model\Table\DeiveryordersTable $Deiveryorders * @property \App\Controller\Component\DatatableComponent $Datatable */
class DeiveryordersController extends AppController
{

    /**
     * Components     *
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
    	/*
      		    
        */
       
         $this->loadModel('CreateConfigs');
         $configs=$this->CreateConfigs->find('all')->where(['table_name' => 'Deiveryorders'])->order(['id' => 'ASC'])->toArray();
        
         $this->set('configs',$configs);	
         $this->set('_serialize', ['configs']);
         
         
         
         $this->loadModel('CreateConfigs');
         $configs=$this->CreateConfigs->find('all')->where(['table_name' => 'Deiveryorders'])->order(['"order"' => 'ASC'])->toArray();
		 $this->loadModel('Usersettings');
		 $usersettings=$this->Usersettings->find('all')->where(['user_id' => $this->loggedinuser['id']])->where(['module' => 'Deiveryorders'])->where(['key' => 'INIT_VISIBLE_COLUMNS_DEIVERYORDERS'])->toArray();
         if(isset($usersettings[0]['value'])){
         	$this->set('usersettings',$usersettings);	
			
         }else{
         	
         	$this->loadModel('Globalusersettings');
		    $usersettings=$this->Globalusersettings->find('all')->where(['module' => 'Deiveryorders'])->where(['key' => 'INIT_VISIBLE_COLUMNS_DEIVERYORDERS'])->toArray();
            $this->set('usersettings',$usersettings);
			
         }
		 $actions =[
                ['name'=>'delete','title'=>'Delete','class'=>' label-danger ']
                ];
         $additional= [
      	                          'basic'=>['All'],
      	                          'additional'=>[
      	                          // ['name'=>'shipmentorderdate','title'=>'Shipment Order Date'],
      	                          // ['name'=>'deliverystarttimewindow','title'=>'Delivery Start Time Window'],
      	                          // ['name'=>'deliverydtimewindow','title'=>'Delivery End Time Window']
      	                            ]];
		 $this->set('additional',$additional);
		 $this->set('actions',$actions);	
         $this->set('configs',$configs);	
         $this->set('_serialize', ['configs','usersettings','actions','additional']);
       
       
    }

	public function updateSettings()
	{
   	
		$this->autoRender= false;	
		$columns=$_POST['columns'];
		$visorder = $_POST['visorder'];
			
		
		$columns=isset($columns)?$columns:6;
		$userSettings = TableRegistry::get('Usersettings');
		$count = $userSettings->find('all')
		   ->where(['key' => 'INIT_VISIBLE_COLUMNS_DEIVERYORDERS'])
		  ->where(['user_id' => $this->loggedinuser['id']])
		   ->count();
		
		if($count>0)	
			{	 
				$query = $userSettings->query();
				$res=$query->update()
			    ->set(['value' => $columns])
				->set(['value1' => $visorder])
			    ->where(['key' => 'INIT_VISIBLE_COLUMNS_DEIVERYORDERS'])
			    ->where(['user_id' => $this->loggedinuser['id']])
			    ->execute();
				$this->response->body($res);
		
	   		}
	   	else
	   		{
	   	  
			   $query1 = $userSettings->query();
			   $res=$query1->insert(['key','value','user_id','module'])
			   ->values(
			       ['key'=>'INIT_VISIBLE_COLUMNS_DEIVERYORDERS',
			        'value'=>$columns,
			        'user_id'=>$this->loggedinuser['id'],
			        'module'=>'Deiveryorders'])
			    ->execute();
			   	$this->response->body($res);
			}
	
	}

	private function toPostDBDate($date)
	{
	
		 $ret="";
		 $parts=explode("/",$date);
		 if(count($parts)==3)
		 {
		 	$ret= $date= '20' .trim($parts[2]) . "-" . trim($parts[1]) . "-" . trim($parts[0]);
			
		 }
		
	  	return $ret;
	}

	private function getDateRangeFilters($dates,$basic)  
	{
	
		$sql="";	
			
		//$alldates=explode(",",$dates);
		
		//$pre=($basic>0)?" and ":"";
		
		//$datecol=explode("-",$alldates[0]);
		
		//$sql .=  count($datecol)>1? " $pre dateofservice between '" . $this->toPostDBDate($datecol[0]) . "' and '" . $this->toPostDBDate($datecol[1]) . "'": "" ;
		
		//$datecol=explode("-",$alldates[1]);
		
		//$pre=(strlen($sql)>0)?" and ":"";
		
		//$sql .=  count($datecol)>1? " $pre startdate between '" . $this->toPostDBDate($datecol[0]) . "' and '" . $this->toPostDBDate($datecol[1]) . "'": "" ;
		
		//$datecol=explode("-",$alldates[2]);
		//$pre=(strlen($sql)>0)?" and ":"";
		
		//$sql .= count($datecol)>1? " $pre completiondate between '" . $this->toPostDBDate($datecol[0]) . "' and '" . $this->toPostDBDate($datecol[1]) . "'": "" ;
		
		
		return $sql;
	}
    
    
	public function ajaxdata() {
        $this->autoRender= false;
		$usrfiter="";
		$basic = isset($this->request->query['basic'])?$this->request->query['basic']:"" ;
		$additional = isset($this->request->query['additional'])?$this->request->query['additional']:"";
      
          
       $this->loadModel('CreateConfigs');
       $dbout=$this->CreateConfigs->find('all')->where(['table_name' => 'Deiveryorders'])->order(['id' => 'ASC'])->toArray();
        
        $fields = array();
        foreach($dbout as $value){
            $fields[] = array("name" => $value['field_name'] , "type" => $value['datatype'] );
			
        }
      
		                           
       $output =$this->Datatable->getView($fields,['Shipmenttypes', 'Orderstates', 'Distributioncenteres', 'Paymenttypes', 'Pickupdeliverytypes', 'Pickupdeliverybranches', 'Pdlocationtypes', 'Pdaccounts', 'Returnbranches', 'Customers'],$usrfiter);
        
        $out =json_encode($output);  
	
		$this->response->body($out);
	    return $this->response;
	     
             
 }  

    /**
     * View method
     *
     * @param string|null $id Deiveryorder id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $deiveryorder = $this->Deiveryorders->get($id, [
            'contain' => ['Shipmenttypes', 'Orderstates', 'Distributioncenteres', 'Paymenttypes', 'Pickupdeliverytypes', 'Pickupdeliverybranches', 'Pdlocationtypes', 'Pdaccounts', 'Returnbranches', 'Customers']
        ]);

        $this->set('deiveryorder', $deiveryorder);
        $this->set('_serialize', ['deiveryorder']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $deiveryorder = $this->Deiveryorders->newEntity();
        if ($this->request->is('post')) {
            $deiveryorder = $this->Deiveryorders->patchEntity($deiveryorder, $this->request->data);
            $deiveryorder['customer_id']=$this->currentuser['customer_id'];
            if ($this->Deiveryorders->save($deiveryorder)) {
                $this->Flash->success(__('The deiveryorder has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The deiveryorder could not be saved. Please, try again.'));
            }
        }
        
        $shipmenttypes = $this->Deiveryorders->Shipmenttypes->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id'])->where("customer_id=0");
        
                
        $orderstates = $this->Deiveryorders->Orderstates->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id'])->where("customer_id=0");
        
                
        $distributioncenteres = $this->Deiveryorders->Distributioncenteres->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id'])->where("customer_id=0");
        
                
        $paymenttypes = $this->Deiveryorders->Paymenttypes->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id'])->where("customer_id=0");
        
                
        $pickupdeliverytypes = $this->Deiveryorders->Pickupdeliverytypes->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id'])->where("customer_id=0");
        
                
        $pickupdeliverybranches = $this->Deiveryorders->Pickupdeliverybranches->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id'])->where("customer_id=0");
        
                
        $pdlocationtypes = $this->Deiveryorders->Pdlocationtypes->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id'])->where("customer_id=0");
        
                
        $pdaccounts = $this->Deiveryorders->Pdaccounts->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id'])->where("customer_id=0");
        
                
        $returnbranches = $this->Deiveryorders->Returnbranches->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id'])->where("customer_id=0");
        
                        
          $customers = $this->Deiveryorders->Customers->find('list', ['limit' => 200])->where("id=".$this->loggedinuser['customer_id']);
      
        
                $this->set(compact('deiveryorder', 'shipmenttypes', 'orderstates', 'distributioncenteres', 'paymenttypes', 'pickupdeliverytypes', 'pickupdeliverybranches', 'pdlocationtypes', 'pdaccounts', 'returnbranches', 'customers'));
        $this->set('_serialize', ['deiveryorder']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Deiveryorder id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $deiveryorder = $this->Deiveryorders->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $deiveryorder = $this->Deiveryorders->patchEntity($deiveryorder, $this->request->data);
             $deiveryorder['customer_id']=$this->currentuser['customer_id'];
            if ($this->Deiveryorders->save($deiveryorder)) {
                $this->Flash->success(__('The deiveryorder has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The deiveryorder could not be saved. Please, try again.'));
            }
        }
        $shipmenttypes = $this->Deiveryorders->Shipmenttypes->find('list', ['limit' => 200]);
        $orderstates = $this->Deiveryorders->Orderstates->find('list', ['limit' => 200]);
        $distributioncenteres = $this->Deiveryorders->Distributioncenteres->find('list', ['limit' => 200]);
        $paymenttypes = $this->Deiveryorders->Paymenttypes->find('list', ['limit' => 200]);
        $pickupdeliverytypes = $this->Deiveryorders->Pickupdeliverytypes->find('list', ['limit' => 200]);
        $pickupdeliverybranches = $this->Deiveryorders->Pickupdeliverybranches->find('list', ['limit' => 200]);
        $pdlocationtypes = $this->Deiveryorders->Pdlocationtypes->find('list', ['limit' => 200]);
        $pdaccounts = $this->Deiveryorders->Pdaccounts->find('list', ['limit' => 200]);
        $returnbranches = $this->Deiveryorders->Returnbranches->find('list', ['limit' => 200]);
        $customers = $this->Deiveryorders->Customers->find('list', ['limit' => 200]);
        $this->set(compact('deiveryorder', 'shipmenttypes', 'orderstates', 'distributioncenteres', 'paymenttypes', 'pickupdeliverytypes', 'pickupdeliverybranches', 'pdlocationtypes', 'pdaccounts', 'returnbranches', 'customers'));
        $this->set('_serialize', ['deiveryorder']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Deiveryorder id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $deiveryorder = $this->Deiveryorders->get($id);
        if ($this->Deiveryorders->delete($deiveryorder)) {
            $this->Flash->success(__('The deiveryorder has been deleted.'));
        } else {
            $this->Flash->error(__('The deiveryorder could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	public function deleteAll($id=null){
    	
		$this->request->allowMethod(['post', 'deleteall']);
        $sucess=false;$failure=false;
        $data=$this->request->data;
			
		if(isset($data)){
		   foreach($data as $key =>$value){
		   	   		
		   	   	$itemna=explode("-",$key);
			    
			    if(count($itemna)== 2 && $itemna[0]=='chk'){
			    	
					$record = $this->Deiveryorders->get($value);
					
					 if($record['customer_id']== $this->loggedinuser['customer_id']) {
					 	
						   if ($this->Deiveryorders->delete($record)) {
					           $sucess= $sucess | true;
					        } else {
					           $failure= $failure | true;
					        }
					}
				}  	  
			}
		   		        
		
				if($sucess){
					$this->Flash->success(__('Selected Deiveryorders has been deleted.'));
				}
		        if($failure){
					$this->Flash->error(__('The Deiveryorders could not be deleted. Please, try again.'));
				}
		
		   }

             return $this->redirect(['action' => 'index']);	
     }
	
}
