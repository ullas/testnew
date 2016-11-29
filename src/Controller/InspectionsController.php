<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Inspections Controller
 *
 * @property \App\Model\Table\InspectionsTable $Inspections
 * @property \App\Controller\Component\DatatableComponent $Datatable
 */
class InspectionsController extends AppController
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
         $configs=$this->CreateConfigs->find('all')->where(['table_name' => 'Inspections'])->order(['"order"' => 'ASC'])->toArray();
        
          $this->loadModel('Usersettings');
		 $usersettings=$this->Usersettings->find('all')->where(['user_id' => $this->loggedinuser['id']])->where(['module' => 'Inspections'])->where(['key' => 'INIT_VISIBLE_COLUMNS_INSPECTIONS'])->toArray();
         if(isset($usersettings[0]['value'])){
         	$this->set('usersettings',$usersettings);	
			
         }else{
         	
         	$this->loadModel('Globalusersettings');
		    $usersettings=$this->Globalusersettings->find('all')->where(['module' => 'Inspections'])->where(['key' => 'INIT_VISIBLE_COLUMNS_INSPECTIONS'])->toArray();
            $this->set('usersettings',$usersettings);
			
         }
		 $actions =[
                
                ['name'=>'delete','title'=>'Delete','class'=>' label-danger ']
                ];
         $additional= [
      	                          'basic'=>['All'],
      	                          'additional'=>[
      	                             
      	                                ['name'=>'date','title'=>'Date']   	                          
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
	   ->where(['key' => 'INIT_VISIBLE_COLUMNS_INSPECTIONS'])
	  ->where(['user_id' => $this->loggedinuser['id']])
	   ->count();
	
	if($count>0)	{	 
	
	$query = $userSettings->query();
	$res=$query->update()
	    ->set(['value' => $columns])
		->set(['value1' => $visorder])
	    ->where(['key' => 'INIT_VISIBLE_COLUMNS_INSPECTIONS'])
	    ->where(['user_id' => $this->loggedinuser['id']])
	    ->execute();
	$this->response->body($res);
	
   }else{
   	  
	   $query1 = $userSettings->query();
	   $res=$query1->insert(['key','value','user_id','module'])
	   ->values(
	       ['key'=>'INIT_VISIBLE_COLUMNS_INSPECTIONS',
	        'value'=>$columns,
	        'user_id'=>$this->loggedinuser['id'],
	        'module'=>'Inspections'])
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
	
	$sql .=  count($datecol)>1? " $pre date between '" . $this->toPostDBDate($datecol[0]) . "' and '" . $this->toPostDBDate($datecol[1]) . "'": "" ;
	
	
	
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
		 * */
		
          
       $this->loadModel('CreateConfigs');
       $dbout=$this->CreateConfigs->find('all')->where(['table_name' => 'Inspections'])->order(['"order"' => 'ASC'])->toArray();
        
        $fields = array();
        foreach($dbout as $value){
            $fields[] = array("name" => $value['field_name'] , "type" => $value['datatype'] );
			
        }
        
		
		
		                           
        $output =$this->Datatable->getView($fields,['Vehicles', 'Customers','Inspectionforms','Inspectionstatuses'],$usrfiter);
        $out =json_encode($output);  
	   
		$this->response->body($out);
	    return $this->response;
	     
             
 }  
 

    /**
     * View method
     *
     * @param string|null $id Inspection id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $inspection = $this->Inspections->get($id, [
            'contain' => ['Inspectionforms', 'Customers', 'Inspectionstatuses', 'Vehicles']
        ]);

        $this->set('inspection', $inspection);
        $this->set('_serialize', ['inspection']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $inspection = $this->Inspections->newEntity();
        if ($this->request->is('post')) {
            $inspection = $this->Inspections->patchEntity($inspection, $this->request->data);
            $inspection['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Inspections->save($inspection)) {
                $this->Flash->success(__('The inspection has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The inspection could not be saved. Please, try again.'));
            }
        }
        
        $inspectionforms = $this->Inspections->Inspectionforms->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        
                        
        $customers = $this->Inspections->Customers->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
      
        
                
        $inspectionstatuses = $this->Inspections->Inspectionstatuses->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        
                
        $vehicles = $this->Inspections->Vehicles->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        
                $this->set(compact('inspection', 'inspectionforms', 'customers', 'inspectionstatuses', 'vehicles'));
        $this->set('_serialize', ['inspection']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Inspection id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $inspection = $this->Inspections->get($id, [
            'contain' => []
        ]);
		if($inspection['customer_id']!= $this->loggedinuser['customer_id'])
		{
			 $this->Flash->success(__('You are not Authorized.'));
			 return $this->redirect(['action' => 'index']);
		}
        if ($this->request->is(['patch', 'post', 'put'])) {
            $inspection = $this->Inspections->patchEntity($inspection, $this->request->data);
             $inspection['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Inspections->save($inspection)) {
                $this->Flash->success(__('The inspection has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The inspection could not be saved. Please, try again.'));
            }
        }
        $inspectionforms = $this->Inspections->Inspectionforms->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        
                        
        $customers = $this->Inspections->Customers->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
      
        
                
        $inspectionstatuses = $this->Inspections->Inspectionstatuses->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        
                
        $vehicles = $this->Inspections->Vehicles->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        
                $this->set(compact('inspection', 'inspectionforms', 'customers', 'inspectionstatuses', 'vehicles'));
        $this->set('_serialize', ['inspection']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Inspection id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $inspection = $this->Inspections->get($id);
		if($inspection['customer_id'] = $this->loggedinuser['customer_id'])
		{
	        if ($this->Inspections->delete($inspection)) {
	            $this->Flash->success(__('The inspection has been deleted.'));
	        } else {
	            $this->Flash->error(__('The inspection could not be deleted. Please, try again.'));
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
			    	
					$record = $this->Inspections->get($value);
					
					 if($record['customer_id']== $this->loggedinuser['customer_id']) {
					 	
						   if ($this->Inspections->delete($record)) {
					           $sucess= $sucess | true;
					        } else {
					           $failure= $failure | true;
					        }
						
					 }
					
			    }  	  
			   
		   }
		   		        
		
			if($sucess){
				$this->Flash->success(__('Selected Inspections has been deleted.'));
			}
	        if($failure){
				$this->Flash->error(__('The Inspections could not be deleted. Please, try again.'));
			}
		
		   }

             return $this->redirect(['action' => 'index']);	
     }
	
	
}
