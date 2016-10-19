<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;


/**
 * Workorders Controller
 *
 * @property \App\Model\Table\WorkordersTable $Workorders
 * @property \App\Controller\Component\DatatableComponent $Datatable
 */
class WorkordersController extends AppController
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
    	/*
      		    
        */
       
         $this->loadModel('CreateConfigs');
         $configs=$this->CreateConfigs->find('all')->where(['table_name' => 'Workorders'])->order(['"order"' => 'ASC'])->toArray();
		 $this->loadModel('Usersettings');
		 $usersettings=$this->Usersettings->find('all')->where(['user_id' => $this->loggedinuser['id']])->where(['module' => 'Workorders'])->where(['key' => 'INIT_VISIBLE_COLUMNS_WORKORDERS'])->toArray();
         if(isset($usersettings[0]['value'])){
         	$this->set('usersettings',$usersettings);	
			if(isset($usersettings[0]['value'])){
			 	$t=explode(",",$usersettings[0]['value1']);
				$configs=$this->sortArrayByArray($configs,$t);
				
			
		    }
         }else{
         	
         	$this->loadModel('Globalusersettings');
		    $usersettings=$this->Globalusersettings->find('all')->where(['module' => 'Workorders'])->where(['key' => 'INIT_VISIBLE_COLUMNS_WORKORDERS'])->toArray();
            $this->set('usersettings',$usersettings);
			
         }
		 
         
		 
		 
         $this->set('configs',$configs);	
         $this->set('_serialize', ['configs','usersettings']);
       
       
    }



public function updateSettings()
{
   	
	$this->autoRender= false;	
	$columns=$_POST['columns'];
	$visorder = $_POST['visorder'];
		
	
	$columns=isset($columns)?$columns:6;
	$userSettings = TableRegistry::get('Usersettings');
	$count = $userSettings->find('all')
	   ->where(['key' => 'INIT_VISIBLE_COLUMNS_WORKORDERS'])
	  ->where(['user_id' => $this->loggedinuser['id']])
	   ->count();
	   
	  
	   
	  
	
	if($count>0)	{	 
	
	$query = $userSettings->query();
	$res=$query->update()
	    ->set(['value' => $columns])
		->set(['value1' => $visorder])
	    ->where(['key' => 'INIT_VISIBLE_COLUMNS_WORKORDERS'])
	    ->where(['user_id' => $this->loggedinuser['id']])
	    ->execute();
	$this->response->body($res);
	
   }else{
   	  
	   $query1 = $userSettings->query();
	   $res=$query1->insert(['key','value','user_id','module'])
	   ->values(
	       ['key'=>'INIT_VISIBLE_COLUMNS_WORKORDERS',
	        'value'=>$columns,
	        'user_id'=>$this->loggedinuser['id'],
	        'module'=>'Workorders'])
	    ->execute();
	   $this->response->body($res);
	
	   
   }
	
	
	
	
}

private function toPostDBDate($date){
	
		 $ret="";
		 $parts=explode("/",$date);
		 if(count($parts)==3){
		 	$ret= $date= '20' .trim($parts[2]) . "-" . trim($parts[1]) . "-" . trim($parts[0]);
			
		 }
		
	  return $ret;
}

private  function sortArrayByArray(array $array, array $orderArray) {
    $ordered = array();
    foreach ($orderArray as $key) {
        if (array_key_exists($key, $array)) {
             	
            $ordered[$key] = $array[$key];
            unset($array[$key]);
        }
    }
	
    return $ordered ;
}

private function getDateRangeFilters($dates)  {
	
	$sql="";	
		
	$alldates=explode(",",$dates);
	
	
	
	$datecol=explode("-",$alldates[0]);
	
	$sql .=  count($datecol)>1? " and issuedate between '" . $this->toPostDBDate($datecol[0]) . "' and '" . $this->toPostDBDate($datecol[1]) . "'": "" ;
	
	$datecol=explode("-",$alldates[1]);
	
	$sql .=  count($datecol)>1? " and startdate between '" . $this->toPostDBDate($datecol[0]) . "' and '" . $this->toPostDBDate($datecol[1]) . "'": "" ;
	
	$datecol=explode("-",$alldates[2]);
	
	$sql .= count($datecol)>1? " and completiondate between '" . $this->toPostDBDate($datecol[0]) . "' and '" . $this->toPostDBDate($datecol[1]) . "'": "" ;
	
	
	return $sql;
}  
    
public function ajaxdata() {
        $this->autoRender= false;
		$usrfiter="";
		$basic = isset($this->request->query['basic'])?$this->request->query['basic']:"" ;
		$additional = isset($this->request->query['additional'])?$this->request->query['additional']:"";
		
		
        if($basic != -1){
        	$options=explode(",",$basic);
			
        	for($i=0;$i<sizeof($options);$i++){
        	    $i==0?$usrfiter.="   (workorderstatus_id=" .$options[$i]
				:$usrfiter.=" or  workorderstatus_id=" .$options[$i];
        	}
			$usrfiter.=(") ");
        }
		$usrfiter.=$this->getDateRangeFilters($additional);
		
          
       $this->loadModel('CreateConfigs');
       $dbout=$this->CreateConfigs->find('all')->where(['table_name' => 'Workorders'])->order(['"order"' => 'ASC'])->toArray();
        
        $fields = array();
        foreach($dbout as $value){
            $fields[] = array("name" => $value['field_name'] , "type" => $value['datatype'] );
			
        }
        
		
		
		                           
        $output =$this->Datatable->getView($fields,['Workorderstatuses', 'Vehicles', 'Vendors', 'Issuedbies', 'Assignedbies', 'Assigntos', 'Customers'],$usrfiter);
        $out =json_encode($output);  
	   
		$this->response->body($out);
	    return $this->response;
	     
             
 }  

    /**
     * View method
     *
     * @param string|null $id Workorder id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $workorder = $this->Workorders->get($id, [
            'contain' => ['Workorderstatuses', 'Vehicles', 'Vendors', 'Issuedbies', 'Assignedbies', 'Assigntos', 'Customers', 'Issues', 'Worklorderlineitems', 'Workorderdocuments']
        ]);

        $this->set('workorder', $workorder);
        $this->set('_serialize', ['workorder']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $workorder = $this->Workorders->newEntity();
        if ($this->request->is('post')) {
            $workorder = $this->Workorders->patchEntity($workorder, $this->request->data);
            $workorder['customer_id']=$this->currentuser['customer_id'];
            if ($this->Workorders->save($workorder)) {
                $this->Flash->success(__('The workorder has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The workorder could not be saved. Please, try again.'));
            }
        }
        
        $workorderstatuses = $this->Workorders->Workorderstatuses->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id'])->orwhere("customer_id=0");
        
                
        $vehicles = $this->Workorders->Vehicles->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id']);
        
                
        $vendors = $this->Workorders->Vendors->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id']);
        
                
        $issuedbies = $this->Workorders->Issuedbies->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id']);
        
                
        $assignedbies = $this->Workorders->Assignedbies->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id']);
        
                
        $assigntos = $this->Workorders->Assigntos->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id']);
        
                        
          $customers = $this->Workorders->Customers->find('list', ['limit' => 200])->where("id=".$this->loggedinuser['customer_id']);
      
        
                $this->set(compact('workorder', 'workorderstatuses', 'vehicles', 'vendors', 'issuedbies', 'assignedbies', 'assigntos', 'customers'));
        $this->set('_serialize', ['workorder']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Workorder id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $workorder = $this->Workorders->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $workorder = $this->Workorders->patchEntity($workorder, $this->request->data);
             $workorder['customer_id']=$this->currentuser['customer_id'];
            if ($this->Workorders->save($workorder)) {
                $this->Flash->success(__('The workorder has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The workorder could not be saved. Please, try again.'));
            }
        }
        $workorderstatuses = $this->Workorders->Workorderstatuses->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id'])->orwhere("customer_id=0");
        
                
        $vehicles = $this->Workorders->Vehicles->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id']);
        
                
        $vendors = $this->Workorders->Vendors->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id']);
        
                
        $issuedbies = $this->Workorders->Issuedbies->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id']);
        
                
        $assignedbies = $this->Workorders->Assignedbies->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id']);
        
                
        $assigntos = $this->Workorders->Assigntos->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id']);
        
               
        $this->set(compact('workorder', 'workorderstatuses', 'vehicles', 'vendors', 'issuedbies', 'assignedbies', 'assigntos', 'customers'));
        $this->set('_serialize', ['workorder']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Workorder id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $workorder = $this->Workorders->get($id);
        if ($this->Workorders->delete($workorder)) {
            $this->Flash->success(__('The workorder has been deleted.'));
        } else {
            $this->Flash->error(__('The workorder could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
