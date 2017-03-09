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
			
         }else{
         	
         	$this->loadModel('Globalusersettings');
		    $usersettings=$this->Globalusersettings->find('all')->where(['module' => 'Workorders'])->where(['key' => 'INIT_VISIBLE_COLUMNS_WORKORDERS'])->toArray();
            $this->set('usersettings',$usersettings);
			
         }
		 $actions =[
                ['name'=>'assign','title'=>'Assign','class'=>'label-success'],
                ['name'=>'unassign','title'=>'Unassign','class'=>'label-warning'],
                ['name'=>'close','title'=>'Close','class'=>' label-danger '],
                ['name'=>'delete','title'=>'Delete','class'=>' label-danger ']
                ];
         $additional= [
      	                          'basic'=>['Open','OverDue','Resolved','Closed'],
      	                          'additional'=>[
      	                                ['name'=>'issueddate','title'=>'Issued Date'],
      	                                ['name'=>'startdate','title' =>'Start Date'],
      	                                ['name'=>'completiondate','title'=>'Completion Date']   	                          
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


private function getDateRangeFilters($dates,$basic)  {
	
	$sql="";	
		
	$alldates=explode(",",$dates);
	
	$pre=($basic>0)?" and ":"";
	
	$datecol=explode("-",$alldates[0]);
	
	$sql .=  count($datecol)>1? " $pre issuedate between '" . $this->toPostDBDate($datecol[0]) . "' and '" . $this->toPostDBDate($datecol[1]) . "'": "" ;
	
	$datecol=explode("-",$alldates[1]);
	
	$pre=(strlen($sql)>0)?" and ":"";
	
	$sql .=  count($datecol)>1? " $pre startdate between '" . $this->toPostDBDate($datecol[0]) . "' and '" . $this->toPostDBDate($datecol[1]) . "'": "" ;
	
	$datecol=explode("-",$alldates[2]);
	$pre=(strlen($sql)>0)?" and ":"";
	
	$sql .= count($datecol)>1? " $pre completiondate between '" . $this->toPostDBDate($datecol[0]) . "' and '" . $this->toPostDBDate($datecol[1]) . "'": "" ;
	
	
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
		$usrfiter.=$this->getDateRangeFilters($additional,$basic);
		
          
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
            'contain' => ['Workorderstatuses', 'Vehicles', 'Vendors', 'Issuedbies', 'Assignedbies', 'Assigntos', 'Customers', 'Issues', 'Workorderdocuments']
            
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
		$liteitemTable = TableRegistry::get('Workorderlineitems');
		$servicetasksTable = TableRegistry::get('Servicetasks');
		$issuesTable = TableRegistry::get('Issues');
			
        if ($this->request->is('post')) {
        	
			
			
            $workorder = $this->Workorders->patchEntity($workorder, $this->request->data);
			
				//print_r($this->request->data);
			
            $workorder['customer_id']=$this->loggedinuser['customer_id'];
			
			
            if ($this->Workorders->save($workorder)) {
            	$this->log($this->request->data);
			   if(isset($this->request->data['workorderlineitem'])){
			   	// $this->log("sssooo");
				$lineitems=$this->request->data['workorderlineitem'];
				for($i=0;$i<count($lineitems);$i++)
				{
					$lineitem= $liteitemTable->newEntity();
					$lineitem['labour']=$lineitems[$i]['labour'];
					$lineitem['parts']=$lineitems[$i]['parts'];
					$lineitem['numitems']=isset($lineitems[$i]['numitems'])?$lineitems[$i]['numitems']:0;
					$lineitem['customer_id']=$this->loggedinuser['customer_id'];
					$lineitem['servicetask_id']=isset($lineitems[$i]['servicetask_id'])?$lineitems[$i]['servicetask_id']:null;
					$lineitem['issue_id']=isset($lineitems[$i]['issue_id'])?$lineitems[$i]['issue_id']:null;
					if($lineitem['servicetask_id']!=null){
						$lineitem['workordertype_id']=1;
					}else{
						$lineitem['workordertype_id']=2;
					}
					$lineitem['workorder_id']=$workorder->id;
					
					$liteitemTable->save($lineitem);
					
				 }
				  
			    }	
				
                // $this->Flash->success(__('The workorder has been saved.'));

                 // return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The workorder could not be saved. Please, try again.'));
            }
        }
        
        $workorderstatuses = $this->Workorders->Workorderstatuses->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        
                
        $vehicles = $this->Workorders->Vehicles->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        
                
        $vendors = $this->Workorders->Vendors->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        
                
        $issuedbies = $this->Workorders->Issuedbies->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        
                
        $assignedbies = $this->Workorders->Assignedbies->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        
                
        $assigntos = $this->Workorders->Assigntos->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        
                        
         $servicetasks=$servicetasksTable->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id'])->orwhere("customer_id=0")->all()->toArray();
		 $issues=$issuesTable->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id'])->all()->toArray();
		 
		
        
        $this->set(compact('workorder', 'workorderstatuses', 'vehicles', 'vendors', 'issuedbies', 'assignedbies', 'assigntos', 'customers','servicetasks','issues'));
        $this->set('_serialize', ['workorder','workorderstatuses', 'vehicles', 'vendors', 'issuedbies', 'assignedbies', 'assigntos', 'customers','servicetasks','issues']);
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
        if($workorder['customer_id']!= $this->loggedinuser['customer_id'])
		{
			 $this->Flash->success(__('You are not Authorized.'));
			 return $this->redirect(['action' => 'index']);
		}
        if ($this->request->is(['patch', 'post', 'put'])) {
            $workorder = $this->Workorders->patchEntity($workorder, $this->request->data);
             $workorder['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Workorders->save($workorder)) {
                $this->Flash->success(__('The workorder has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The workorder could not be saved. Please, try again.'));
            }
        }
        $workorderstatuses = $this->Workorders->Workorderstatuses->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        
                
        $vehicles = $this->Workorders->Vehicles->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        
                
        $vendors = $this->Workorders->Vendors->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        
                
        $issuedbies = $this->Workorders->Issuedbies->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        
                
        $assignedbies = $this->Workorders->Assignedbies->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        
                
        $assigntos = $this->Workorders->Assigntos->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        
               
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
		if($workorder['customer_id'] = $this->loggedinuser['customer_id'])
		{
	        if ($this->Workorders->delete($workorder)) {
	            $this->Flash->success(__('The workorder has been deleted.'));
	        } else {
	            $this->Flash->error(__('The workorder could not be deleted. Please, try again.'));
	        }
		 }
	    else
	    {
	   	    $this->Flash->error(__('You are not authorized'));
		
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
			    	
					$workorder = $this->Workorders->get($value);
					
					 if($workorder['customer_id']== $this->loggedinuser['customer_id']) {
					 	
						   if ($this->Workorders->delete($workorder)) {
					           $sucess= $sucess | true;
					        } else {
					           $failure= $failure | true;
					        }
						
					 }
					
			    }  	  
			   
		   }
		   		        
		
			if($sucess){
				$this->Flash->success(__('Selected workorders has been deleted.'));
			}
	        if($failure){
				$this->Flash->error(__('The workorder could not be deleted. Please, try again.'));
			}
		
		   }

             return $this->redirect(['action' => 'index']);	
     }
}
