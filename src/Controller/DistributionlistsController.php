<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Distributionlists Controller
 *
 * @property \App\Model\Table\DistributionlistsTable $Distributionlists
 */
class DistributionlistsController extends AppController
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
         $this->loadModel('CreateConfigs');
         $configs=$this->CreateConfigs->find('all')->where(['table_name' => 'Distributionlists'])->order(['"order"' => 'ASC'])->toArray();
		 $this->loadModel('Usersettings');
		 $usersettings=$this->Usersettings->find('all')->where(['user_id' => $this->loggedinuser['id']])->where(['module' => 'Distributionlists'])->where(['key' => 'INIT_VISIBLE_COLUMNS_DISTRIBUTIONLISTS'])->toArray();
         if(isset($usersettings[0]['value'])){
         	$this->set('usersettings',$usersettings);	
			
         }else{
         	
         	$this->loadModel('Globalusersettings');
		    $usersettings=$this->Globalusersettings->find('all')->where(['module' => 'Distributionlists'])->where(['key' => 'INIT_VISIBLE_COLUMNS_DISTRIBUTIONLISTS'])->toArray();
            $this->set('usersettings',$usersettings);
			
         }
		 $actions =[
              /*  ['name'=>'assign','title'=>'Assign','class'=>'label-success'],
                ['name'=>'unassign','title'=>'Unassign','class'=>'label-warning'], */
                ['name'=>'delete','title'=>'Delete','class'=>' label-danger ']
                ];
         $additional= [
      	                          'basic'=>['All'],
      	                          'additional'=>[
      	                              /*  ['name'=>'issueddate','title'=>'Issued Date'],
      	                                ['name'=>'startdate','title' =>'Start Date'],
      	                                ['name'=>'completiondate','title'=>'Completion Date'] */   	                          
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
	   ->where(['key' => 'INIT_VISIBLE_COLUMNS_DISTRIBUTIONLISTS'])
	  ->where(['user_id' => $this->loggedinuser['id']])
	   ->count();
	
	if($count>0)	{	 
	
	$query = $userSettings->query();
	$res=$query->update()
	    ->set(['value' => $columns])
		->set(['value1' => $visorder])
	    ->where(['key' => 'INIT_VISIBLE_COLUMNS_DISTRIBUTIONLISTS'])
	    ->where(['user_id' => $this->loggedinuser['id']])
	    ->execute();
	$this->response->body($res);
	
   }else{
   	  
	   $query1 = $userSettings->query();
	   $res=$query1->insert(['key','value','user_id','module'])
	   ->values(
	       ['key'=>'INIT_VISIBLE_COLUMNS_DISTRIBUTIONLISTS',
	        'value'=>$columns,
	        'user_id'=>$this->loggedinuser['id'],
	        'module'=>'Distributionlists'])
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
	/*	
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
	*/
	
	return $sql;
}  
    
public function ajaxdata() {
        $this->autoRender= false;
		$usrfiter="";
		$basic = isset($this->request->query['basic'])?$this->request->query['basic']:"" ;
		$additional = isset($this->request->query['additional'])?$this->request->query['additional']:"";
		
		/*
        if($basic != -1){
        	$options=explode(",",$basic);
			
        	for($i=0;$i<sizeof($options);$i++){
        	    $i==0?$usrfiter.="   (workorderstatus_id=" .$options[$i]
				:$usrfiter.=" or  workorderstatus_id=" .$options[$i];
        	}
			$usrfiter.=(") ");
        }
		$usrfiter.=$this->getDateRangeFilters($additional,$basic);
		*/
          
       $this->loadModel('CreateConfigs');
       $dbout=$this->CreateConfigs->find('all')->where(['table_name' => 'Distributionlists'])->order(['"order"' => 'ASC'])->toArray();
        
        $fields = array();
        foreach($dbout as $value){
            $fields[] = array("name" => $value['field_name'] , "type" => $value['datatype'] );
			
        }
        
		
		
		                           
        $output =$this->Datatable->getView($fields,['Customers','Addresses'],$usrfiter);
        $out =json_encode($output);  
	   
		$this->response->body($out);
	    return $this->response;
	     
             
 }  

    /**
     * View method
     *
     * @param string|null $id Distributionlist id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $distributionlist = $this->Distributionlists->get($id, [
            'contain' => ['Customers', 'Addresses']
        ]);

        $this->set('distributionlist', $distributionlist);
        $this->set('_serialize', ['distributionlist']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $distributionlist = $this->Distributionlists->newEntity();
        if ($this->request->is('post')) {
            $distributionlist = $this->Distributionlists->patchEntity($distributionlist, $this->request->data);
			$distributionlist['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Distributionlists->save($distributionlist)) {
                $this->Flash->success(__('The distributionlist has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The distributionlist could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Distributionlists->Customers->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $addresses = $this->Distributionlists->Addresses->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $this->set(compact('distributionlist', 'customers', 'addresses'));
        $this->set('_serialize', ['distributionlist']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Distributionlist id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $distributionlist = $this->Distributionlists->get($id, [
            'contain' => ['Addresses']
        ]);
		if($distributionlist['customer_id']!= $this->loggedinuser['customer_id'])
		{
			 $this->Flash->success(__('You are not Authorized.'));
			 return $this->redirect(['action' => 'index']);
		}
        if ($this->request->is(['patch', 'post', 'put'])) {
            $distributionlist = $this->Distributionlists->patchEntity($distributionlist, $this->request->data);
            if ($this->Distributionlists->save($distributionlist)) {
                $this->Flash->success(__('The distributionlist has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The distributionlist could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Distributionlists->Customers->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $addresses = $this->Distributionlists->Addresses->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $this->set(compact('distributionlist', 'customers', 'addresses'));
        $this->set('_serialize', ['distributionlist']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Distributionlist id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $distributionlist = $this->Distributionlists->get($id);
		if($distributionlist['customer_id'] = $this->loggedinuser['customer_id'])
		{
	        if ($this->Distributionlists->delete($distributionlist)) {
	            $this->Flash->success(__('The distributionlist has been deleted.'));
	        } else {
	            $this->Flash->error(__('The distributionlist could not be deleted. Please, try again.'));
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
			    	
					$record = $this->Distributionlists->get($value);
					
					 if($record['customer_id']== $this->loggedinuser['customer_id']) {
					 	
						   if ($this->Distributionlists->delete($record)) {
					           $sucess= $sucess | true;
					        } else {
					           $failure= $failure | true;
					        }
					}
				}  	  
			}
		   		        
		
				if($sucess){
					$this->Flash->success(__('Selected Distributionlists has been deleted.'));
				}
		        if($failure){
					$this->Flash->error(__('The Distributionlists could not be deleted. Please, try again.'));
				}
		
		   }

             return $this->redirect(['action' => 'index']);	
     }
	
}
