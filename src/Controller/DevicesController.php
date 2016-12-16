<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Devices Controller
 *
 * @property \App\Model\Table\DevicesTable $Devices
 */
class DevicesController extends AppController
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
         $configs=$this->CreateConfigs->find('all')->where(['table_name' => 'Devices'])->order(['"order"' => 'ASC'])->toArray();
		 $this->loadModel('Usersettings');
		 $usersettings=$this->Usersettings->find('all')->where(['user_id' => $this->loggedinuser['id']])->where(['module' => 'Devices'])->where(['key' => 'INIT_VISIBLE_COLUMNS_DEVICES'])->toArray();
         if(isset($usersettings[0]['value'])){
         	$this->set('usersettings',$usersettings);	
			
         }else{
         	
         	$this->loadModel('Globalusersettings');
		    $usersettings=$this->Globalusersettings->find('all')->where(['module' => 'Devices'])->where(['key' => 'INIT_VISIBLE_COLUMNS_DEVICES'])->toArray();
            $this->set('usersettings',$usersettings);
			
         }
		 $actions =[
                
                ['name'=>'delete','title'=>'Delete','class'=>' label-danger ']
                ];
         $additional= [
      	                          'basic'=>['All'],
      	                          'additional'=>[
      	                                ['name'=>'install_date','title'=>'Date Of Installation']
      	                               	                          
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
	   ->where(['key' => 'INIT_VISIBLE_COLUMNS_DEVICES'])
	  ->where(['user_id' => $this->loggedinuser['id']])
	   ->count();
	
	if($count>0)	{	 
	
	$query = $userSettings->query();
	$res=$query->update()
	    ->set(['value' => $columns])
		->set(['value1' => $visorder])
	    ->where(['key' => 'INIT_VISIBLE_COLUMNS_DEVICES'])
	    ->where(['user_id' => $this->loggedinuser['id']])
	    ->execute();
	$this->response->body($res);
	
   }else{
   	  
	   $query1 = $userSettings->query();
	   $res=$query1->insert(['key','value','user_id','module'])
	   ->values(
	       ['key'=>'INIT_VISIBLE_COLUMNS_DEVICES',
	        'value'=>$columns,
	        'user_id'=>$this->loggedinuser['id'],
	        'module'=>'Devices'])
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
	
	$sql .=  count($datecol)>1? " $pre install_date between '" . $this->toPostDBDate($datecol[0]) . "' and '" . $this->toPostDBDate($datecol[1]) . "'": "" ;
	/*
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
       $dbout=$this->CreateConfigs->find('all')->where(['table_name' => 'Devices'])->order(['"order"' => 'ASC'])->toArray();
        
        $fields = array();
        foreach($dbout as $value){
            $fields[] = array("name" => $value['field_name'] , "type" => $value['datatype'] );
			
        }
        
		
		
		                           
        $output =$this->Datatable->getView($fields,['Customers', 'Providers', 'Devicemodels', 'Simcards','Distancetypes'],$usrfiter);
        $out =json_encode($output);  
	   
		$this->response->body($out);
	    return $this->response;
	     
             
 }  
	
    /**
     * View method
     *
     * @param string|null $id Device id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $device = $this->Devices->get($id, [
            'contain' => ['Customers', 'Providers']
        ]);

        $this->set('device', $device);
        $this->set('_serialize', ['device']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $device = $this->Devices->newEntity();
        if ($this->request->is('post')) {
            $device = $this->Devices->patchEntity($device, $this->request->data);
			$device['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Devices->save($device)) {
                $this->Flash->success(__('The device has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The device could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Devices->Customers->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $providers = $this->Devices->Providers->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $distancetypes = $this->Devices->Distancetypes->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $this->set(compact('device', 'customers', 'providers','distancetypes'));
        $this->set('_serialize', ['device']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Device id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $device = $this->Devices->get($id, [
            'contain' => []
        ]);
		
		if($device['customer_id']!= $this->loggedinuser['customer_id'])
		{
			 $this->Flash->success(__('You are not Authorized.'));
			 return $this->redirect(['action' => 'index']);
			
		}
        if ($this->request->is(['patch', 'post', 'put'])) {
            $device = $this->Devices->patchEntity($device, $this->request->data);
            if ($this->Devices->save($device)) {
                $this->Flash->success(__('The device has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The device could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Devices->Customers->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $providers = $this->Devices->Providers->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $distancetypes = $this->Devices->Distancetypes->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
		//$sensormappings = $this->Devices->Sensormappings->find('all')->where(['device_id' => $device['id']])->toArray(); //->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $sensormappings = $this->Devices->Sensormappings->find('all')->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0'])->andwhere(['device_id' => $device['id']])->toArray() ;
        
        if(isset($sensormappings[0]['id']))
	  		{
	  			$this->set("path","/edit/".$sensormappings[0]['id'] );
	  			
	  		}
  		else 
	  		{
	  			$this->set("path","/add");
	  	    	
	  		}
		
		$this->set(compact('device', 'customers', 'providers','distancetypes','sensormappings'));
        $this->set('_serialize', ['device']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Device id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $device = $this->Devices->get($id);
		
		if($device['customer_id'] = $this->loggedinuser['customer_id'])
		{
	        if ($this->Devices->delete($device)) {
	            $this->Flash->success(__('The device has been deleted.'));
	        } else {
	            $this->Flash->error(__('The device could not be deleted. Please, try again.'));
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
			    	
					$record = $this->Devices->get($value);
					
					 if($record['customer_id']== $this->loggedinuser['customer_id']) {
					 	
						   if ($this->Devices->delete($record)) {
					           $sucess= $sucess | true;
					        } else {
					           $failure= $failure | true;
					        }
					}
				}  	  
			}
		   		        
		
				if($sucess){
					$this->Flash->success(__('Selected Devices has been deleted.'));
				}
		        if($failure){
					$this->Flash->error(__('The Devices could not be deleted. Please, try again.'));
				}
		
		   }

             return $this->redirect(['action' => 'index']);	
     }

}
