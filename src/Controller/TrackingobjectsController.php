<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Trackingobjects Controller
 *
 * @property \App\Model\Table\TrackingobjectsTable $Trackingobjects
 */
class TrackingobjectsController extends AppController
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
         $configs=$this->CreateConfigs->find('all')->where(['table_name' => 'Trackingobjects'])->order(['"order"' => 'ASC'])->toArray();
        
         	 $this->loadModel('Usersettings');
		 $usersettings=$this->Usersettings->find('all')->where(['user_id' => $this->loggedinuser['id']])->where(['module' => 'Trackingobjects'])->where(['key' => 'INIT_VISIBLE_COLUMNS_TRACKINGOBJECTS'])->toArray();
         if(isset($usersettings[0]['value'])){
         	$this->set('usersettings',$usersettings);	
			
         }else{
         	
         	$this->loadModel('Globalusersettings');
		    $usersettings=$this->Globalusersettings->find('all')->where(['module' => 'Trackingobjects'])->where(['key' => 'INIT_VISIBLE_COLUMNS_TRACKINGOBJECTS'])->toArray();
            $this->set('usersettings',$usersettings);
			
         }
		 $actions =[
                
                ['name'=>'delete','title'=>'Delete','class'=>' label-danger ']
                ];
         $additional= [
      	                          'basic'=>['All'],
      	                          'additional'=>[
      	                                ['name'=>'created_date','title'=>'Created Date'],
      	                                ['name'=>'modified_date','title'=>'Modified Date']   	                          
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
	   ->where(['key' => 'INIT_VISIBLE_COLUMNS_TRACKINGOBJECTS'])
	  ->where(['user_id' => $this->loggedinuser['id']])
	   ->count();
	
	if($count>0)	{	 
	
	$query = $userSettings->query();
	$res=$query->update()
	    ->set(['value' => $columns])
		->set(['value1' => $visorder])
	    ->where(['key' => 'INIT_VISIBLE_COLUMNS_TRACKINGOBJECTS'])
	    ->where(['user_id' => $this->loggedinuser['id']])
	    ->execute();
	$this->response->body($res);
	
   }else{
   	  
	   $query1 = $userSettings->query();
	   $res=$query1->insert(['key','value','user_id','module'])
	   ->values(
	       ['key'=>'INIT_VISIBLE_COLUMNS_TRACKINGOBJECTS',
	        'value'=>$columns,
	        'user_id'=>$this->loggedinuser['id'],
	        'module'=>'Trackingobjects'])
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

	private function getDateRangeFilters($dates,$basic)  
	{
	
	$sql="";	
		
	$alldates=explode(",",$dates);
	
	$pre=($basic>0)?" and ":"";
	
	$datecol=explode("-",$alldates[0]);
	
	$sql .=  count($datecol)>1? " $pre created_date between '" . $this->toPostDBDate($datecol[0]) . "' and '" . $this->toPostDBDate($datecol[1]) . "'": "" ;
	
	$datecol=explode("-",$alldates[1]);
	
	$pre=(strlen($sql)>0)?" and ":"";
	
	$sql .=  count($datecol)>1? " $pre modified_date between '" . $this->toPostDBDate($datecol[0]) . "' and '" . $this->toPostDBDate($datecol[1]) . "'": "" ;
	
	//$datecol=explode("-",$alldates[2]);
	//$pre=(strlen($sql)>0)?" and ":"";
	
	//$sql .= count($datecol)>1? " $pre completiondate between '" . $this->toPostDBDate($datecol[0]) . "' and '" . $this->toPostDBDate($datecol[1]) . "'": "" ;
	
	
	return $sql;
	}
	
	public function ajaxdata() 
	{
          $this->autoRender= false;
		$usrfiter="";
		$basic = isset($this->request->query['basic'])?$this->request->query['basic']:"" ;
		$additional = isset($this->request->query['additional'])?$this->request->query['additional']:"";
		
		/*
        if($basic == 1){
        	
			$usrfiter=" servicesentries.markasvoid='true'  ";
			
        }else{
        	$usrfiter=" servicesentries.markasvoid='false'  ";
        }
		$usrfiter.=$this->getDateRangeFilters($additional,2);
		*/
          
       $this->loadModel('CreateConfigs');
       $dbout=$this->CreateConfigs->find('all')->where(['table_name' => 'Trackingobjects'])->order(['"order"' => 'ASC'])->toArray();
        
        $fields = array();
        foreach($dbout as $value){
            $fields[] = array("name" => $value['field_name'] , "type" => $value['datatype'] );
			
        }
        
		
		$output =$this->Datatable->getView($fields,['Customers','Assettypes'],$usrfiter);
		$out =json_encode($output);  
	   
		$this->response->body($out);
	    return $this->response;
	}

    /**
     * View method
     *
     * @param string|null $id Trackingobject id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $trackingobject = $this->Trackingobjects->get($id, [
            'contain' => ['Assettypes', 'Customers', 'Groups', 'Gpsdata', 'Vehicles']
        ]);

        $this->set('trackingobject', $trackingobject);
        $this->set('_serialize', ['trackingobject']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $trackingobject = $this->Trackingobjects->newEntity();
        if ($this->request->is('post')) {
            $trackingobject = $this->Trackingobjects->patchEntity($trackingobject, $this->request->data);
            $trackingobject['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Trackingobjects->save($trackingobject)) {
                $this->Flash->success(__('The trackingobject has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The trackingobject could not be saved. Please, try again.'));
            }
        }
        $assettypes = $this->Trackingobjects->Assettypes->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id']);
        $customers = $this->Trackingobjects->Customers->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id']);
        $groups = $this->Trackingobjects->Groups->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id']);
        $this->set(compact('trackingobject', 'assettypes', 'customers', 'groups'));
        $this->set('_serialize', ['trackingobject']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Trackingobject id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $trackingobject = $this->Trackingobjects->get($id, [
            'contain' => ['Groups']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $trackingobject = $this->Trackingobjects->patchEntity($trackingobject, $this->request->data);
			$trackingobject['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Trackingobjects->save($trackingobject)) {
                $this->Flash->success(__('The trackingobject has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The trackingobject could not be saved. Please, try again.'));
            }
        }
        $assettypes = $this->Trackingobjects->Assettypes->find('list', ['limit' => 200]);
        $customers = $this->Trackingobjects->Customers->find('list', ['limit' => 200]);
        $groups = $this->Trackingobjects->Groups->find('list', ['limit' => 200]);
        $this->set(compact('trackingobject', 'assettypes', 'customers', 'groups'));
        $this->set('_serialize', ['trackingobject']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Trackingobject id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $trackingobject = $this->Trackingobjects->get($id);
        if ($this->Trackingobjects->delete($trackingobject)) {
            $this->Flash->success(__('The trackingobject has been deleted.'));
        } else {
            $this->Flash->error(__('The trackingobject could not be deleted. Please, try again.'));
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
			    	
					$record = $this->Trackingobjects->get($value);
					
					 if($record['customer_id']== $this->loggedinuser['customer_id']) 
					 {
					 	
						   if ($this->Trackingobjects->delete($record)) 
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
					$this->Flash->success(__('Selected Trackingobjects has been deleted.'));
				}
		        if($failure)
		        {
					$this->Flash->error(__('The Trackingobjects could not be deleted. Please, try again.'));
				}
		
		   }

             return $this->redirect(['action' => 'index']);	
     }
}
