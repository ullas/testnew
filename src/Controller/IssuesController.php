<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Issues Controller
 *
 * @property \App\Model\Table\IssuesTable $Issues
 * @property \App\Controller\Component\DatatableComponent $Datatable
 */
class IssuesController extends AppController
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
    public function index()  {
    	/*
      		    
        */
       
         $this->loadModel('CreateConfigs');
         $configs=$this->CreateConfigs->find('all')->where(['table_name' => 'Issues'])->order(['"order"' => 'ASC'])->toArray();
		 $this->loadModel('Usersettings');
		 $usersettings=$this->Usersettings->find('all')->where(['user_id' => $this->loggedinuser['id']])->where(['module' => 'Issues'])->where(['key' => 'INIT_VISIBLE_COLUMNS_ISSUES'])->toArray();
         if(isset($usersettings[0]['value'])){
         	$this->set('usersettings',$usersettings);	
			
         }else{
         	
         	$this->loadModel('Globalusersettings');
		    $usersettings=$this->Globalusersettings->find('all')->where(['module' => 'Issues'])->where(['key' => 'INIT_VISIBLE_COLUMNS_ISSUES'])->toArray();
            $this->set('usersettings',$usersettings);
			
         }
		 $actions =[
               
                ['name'=>'delete','title'=>'Delete','class'=>' label-danger ']
                ];
         $additional= [
      	                          'basic'=>['Open','OverDue','Resolved','Closed'],
      	                          'additional'=>[
      	                                ['name'=>'reportedon','title'=>'Reported Date'],
      	                                ['name'=>'duedate','title' =>'Due Date']  	                          
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
	   ->where(['key' => 'INIT_VISIBLE_COLUMNS_ISSUES'])
	  ->where(['user_id' => $this->loggedinuser['id']])
	   ->count();
	
	if($count>0)	{	 
	
	$query = $userSettings->query();
	$res=$query->update()
	    ->set(['value' => $columns])
		->set(['value1' => $visorder])
	    ->where(['key' => 'INIT_VISIBLE_COLUMNS_ISSUES'])
	    ->where(['user_id' => $this->loggedinuser['id']])
	    ->execute();
	$this->response->body($res);
	
   }else{
   	  
	   $query1 = $userSettings->query();
	   $res=$query1->insert(['key','value','user_id','module'])
	   ->values(
	       ['key'=>'INIT_VISIBLE_COLUMNS_ISSUES',
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
	
	$sql .=  count($datecol)>1? " $pre reportedon between '" . $this->toPostDBDate($datecol[0]) . "' and '" . $this->toPostDBDate($datecol[1]) . "'": "" ;
	
	$datecol=explode("-",$alldates[1]);
	
	$pre=(strlen($sql)>0)?" and ":"";
	
	$sql .=  count($datecol)>1? " $pre duedate between '" . $this->toPostDBDate($datecol[0]) . "' and '" . $this->toPostDBDate($datecol[1]) . "'": "" ;
	
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
		
		
        if($basic != -1){
        	$options=explode(",",$basic);
			
        	for($i=0;$i<sizeof($options);$i++){
        	    $i==0?$usrfiter.="   (issuestatus_id=" .$options[$i]
				:$usrfiter.=" or  issuestatus_id=" .$options[$i];
        	}
			$usrfiter.=(") ");
        }
		$usrfiter.=$this->getDateRangeFilters($additional,$basic);
		// echo "ULLAS". $usrfiter;
          
       $this->loadModel('CreateConfigs');
       $dbout=$this->CreateConfigs->find('all')->where(['table_name' => 'Issues'])->order(['"order"' => 'ASC'])->toArray();
        
        $fields = array();
        foreach($dbout as $value){
            $fields[] = array("name" => $value['field_name'] , "type" => $value['datatype'] );
			
        }
        
		
		
		                           
        $output =$this->Datatable->getView($fields,[ 'Vehicles', 'Reportedbies', 'Customers', 'Workorders', 'Servicesentries', 'Issuestatuses'],$usrfiter);
        $out =json_encode($output);  
	   
		$this->response->body($out);
	    return $this->response;
	     
             
 }  

    /**
     * View method
     *
     * @param string|null $id Issue id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $issue = $this->Issues->get($id, [
            'contain' => ['Vehicles', 'Reportedbies', 'Customers', 'Workorders', 'Servicesentries', 'Addresses', 'Issuedocuments']
        ]);

        $this->set('issue', $issue);
        $this->set('_serialize', ['issue']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $issue = $this->Issues->newEntity();
        if ($this->request->is('post')) {
            $issue = $this->Issues->patchEntity($issue, $this->request->data);
            $issue['customer_id']=$this->loggedinuser['customer_id'];
			
			//set new issue status as Open
			$issue['issuestatus_id'] =1;
			if ($this->Issues->save($issue)) {
                $this->Flash->success(__('The issue has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The issue could not be saved. Please, try again.'));
            }
        }
        
        
        $vehicles = $this->Issues->Vehicles->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
                
        $reportedbies = $this->Issues->Reportedbies->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        
                        
        $customers = $this->Issues->Customers->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
      
        
                
        $workorders = $this->Issues->Workorders->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        
                
        $servicesentries = $this->Issues->Servicesentries->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        
                
        $addresses = $this->Issues->Addresses->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        
        $this->set(compact('issue', 'vehicles', 'reportedbies', 'customers', 'workorders', 'servicesentries', 'addresses'));
        $this->set('_serialize', ['issue']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Issue id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $issue = $this->Issues->get($id, [
            'contain' => ['Addresses']
        ]);
		if($issue['customer_id']!= $this->loggedinuser['customer_id'])
		{
			 $this->Flash->success(__('You are not Authorized.'));
			 return $this->redirect(['action' => 'index']);
		}
        if ($this->request->is(['patch', 'post', 'put'])) {
            $issue = $this->Issues->patchEntity($issue, $this->request->data);
             $issue['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Issues->save($issue)) {
                $this->Flash->success(__('The issue has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The issue could not be saved. Please, try again.'));
            }
        }
        $vehicles = $this->Issues->Vehicles->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $reportedbies = $this->Issues->Reportedbies->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $customers = $this->Issues->Customers->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $workorders = $this->Issues->Workorders->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $servicesentries = $this->Issues->Servicesentries->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $addresses = $this->Issues->Addresses->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $this->set(compact('issue', 'vehicles', 'reportedbies', 'customers', 'workorders', 'servicesentries', 'addresses'));
        $this->set('_serialize', ['issue']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Issue id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $issue = $this->Issues->get($id);
		if($issue['customer_id'] = $this->loggedinuser['customer_id'])
		{
	        if ($this->Issues->delete($issue)) {
	            $this->Flash->success(__('The issue has been deleted.'));
	        } else {
	            $this->Flash->error(__('The issue could not be deleted. Please, try again.'));
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
			    	
					$record = $this->Issues->get($value);
					
					 if($record['customer_id']== $this->loggedinuser['customer_id']) {
					 	
						   if ($this->Issues->delete($record)) {
					           $sucess= $sucess | true;
					        } 
					        else {
					           $failure= $failure | true;
					        }
					 }
				}  	  
			}
		   		        
				if($sucess){
					$this->Flash->success(__('Selected Issues has been deleted.'));
				}
		        if($failure){
					$this->Flash->error(__('The Issues could not be deleted. Please, try again.'));
				}
		
		   }
		return $this->redirect(['action' => 'index']);	
     }
	
  public function setClose()
    {
    	
    	if($this->request->is('ajax')) 
    	{
    		$this->loadModel('Issues');
			$this->autoRender=false;
			
			// print_r($this->request->query['content']);
			$issueidsAr = array();
			$issueidsAr = $this->request->query['content'];
			$issueids=explode(",",$issueidsAr);
			$issues = array();
			for ($i=0; $i <count($issueids) ; $i++) { 
				$issues[$i] = $issueids[$i];
				$ttt = $this->Issues->changeStatusClose($this->loggedinuser['customer_id'],$issueids[$i]);
			}
		 	if(isset($ttt))
			{
				// return $this->redirect(array('controller' => 'Issues', 'action' => 'index'));
				return $this->redirect(['action' => 'index']);		
				$this->Flash->success(__('Selected Issues are closed.'));
				
				
		 	
			}
		 	$this->response->body("testop");
	    	return $this->response;
			
		}
		
    }
}
