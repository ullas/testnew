<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Vehicleoperationslimit Controller
 *
 * @property \App\Model\Table\VehicleoperationslimitTable $Vehicleoperationslimit
 */
class VehicleoperationslimitController extends AppController
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
         $configs=$this->CreateConfigs->find('all')->where(['table_name' => 'Vehicleoperationslimit'])->order(['"order"' => 'ASC'])->toArray();
        
         	 $this->loadModel('Usersettings');
		 $usersettings=$this->Usersettings->find('all')->where(['user_id' => $this->loggedinuser['id']])->where(['module' => 'Vehicleoperationslimit'])->where(['key' => 'INIT_VISIBLE_COLUMNS_VEHICLEOPERATIONSLIMIT'])->toArray();
         if(isset($usersettings[0]['value'])){
         	$this->set('usersettings',$usersettings);	
			
         }else{
         	
         	$this->loadModel('Globalusersettings');
		    $usersettings=$this->Globalusersettings->find('all')->where(['module' => 'Vehicleoperationslimit'])->where(['key' => 'INIT_VISIBLE_COLUMNS_VEHICLEOPERATIONSLIMIT'])->toArray();
            $this->set('usersettings',$usersettings);
			
         }
		 $actions =[
                
                ['name'=>'delete','title'=>'Delete','class'=>' label-danger ']
                ];
         $additional= [
      	                          'basic'=>['All'],
      	                          'additional'=>[ 	                          
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
		   ->where(['key' => 'INIT_VISIBLE_COLUMNS_VEHICLEOPERATIONSLIMIT'])
		  ->where(['user_id' => $this->loggedinuser['id']])
		   ->count();
		
		if($count>0)	
			{	 
				$query = $userSettings->query();
				$res=$query->update()
			    ->set(['value' => $columns])
				->set(['value1' => $visorder])
			    ->where(['key' => 'INIT_VISIBLE_COLUMNS_VEHICLEOPERATIONSLIMIT'])
			    ->where(['user_id' => $this->loggedinuser['id']])
			    ->execute();
				$this->response->body($res);
		
	   		}
	   	else
	   		{
	   	  
			   $query1 = $userSettings->query();
			   $res=$query1->insert(['key','value','user_id','module'])
			   ->values(
			       ['key'=>'INIT_VISIBLE_COLUMNS_VEHICLEOPERATIONSLIMIT',
			        'value'=>$columns,
			        'user_id'=>$this->loggedinuser['id'],
			        'module'=>'Vehicleoperationslimit'])
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
			
		// $alldates=explode(",",$dates);
		
		// $pre=($basic>0)?" and ":"";
 		
		// $datecol=explode("-",$alldates[0]);
 		
		// $sql .=  count($datecol)>1? " $pre dateofservice between '" . $this->toPostDBDate($datecol[0]) . "' and '" . $this->toPostDBDate($datecol[1]) . "'": "" ;
 		
		//$datecol=explode("-",$alldates[1]);
		
		//$pre=(strlen($sql)>0)?" and ":"";
		
		//$sql .=  count($datecol)>1? " $pre startdate between '" . $this->toPostDBDate($datecol[0]) . "' and '" . $this->toPostDBDate($datecol[1]) . "'": "" ;
		
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
       $dbout=$this->CreateConfigs->find('all')->where(['table_name' => 'Vehicleoperationslimit'])->order(['"order"' => 'ASC'])->toArray();
        
        $fields = array();
        foreach($dbout as $value){
            $fields[] = array("name" => $value['field_name'] , "type" => $value['datatype'] );
			
        }
        
		$output =$this->Datatable->getView($fields,[ 'Vehicles', 'IButtons',  'Customers'],$usrfiter);
        $out =json_encode($output);  
	   
		$this->response->body($out);
	    return $this->response;
	}
	
    /**
     * View method
     *
     * @param string|null $id Vehicleoperationslimit id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $vehicleoperationslimit = $this->Vehicleoperationslimit->get($id, [
            'contain' => ['Vehicles', 'IButtons']
        ]);

        $this->set('vehicleoperationslimit', $vehicleoperationslimit);
        $this->set('_serialize', ['vehicleoperationslimit']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $vehicleoperationslimit = $this->Vehicleoperationslimit->newEntity();
        if ($this->request->is('post')) {
            $vehicleoperationslimit = $this->Vehicleoperationslimit->patchEntity($vehicleoperationslimit, $this->request->data);
			$vehicleoperationslimit['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Vehicleoperationslimit->save($vehicleoperationslimit)) {
                $this->Flash->success(__('The vehicleoperationslimit has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The vehicleoperationslimit could not be saved. Please, try again.'));
            }
        }
        $vehicles = $this->Vehicleoperationslimit->Vehicles->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id']);
        $iButtons = $this->Vehicleoperationslimit->IButtons->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id']);
        $this->set(compact('vehicleoperationslimit', 'vehicles', 'iButtons'));
        $this->set('_serialize', ['vehicleoperationslimit']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Vehicleoperationslimit id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $vehicleoperationslimit = $this->Vehicleoperationslimit->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $vehicleoperationslimit = $this->Vehicleoperationslimit->patchEntity($vehicleoperationslimit, $this->request->data);
			$vehicleoperationslimit['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Vehicleoperationslimit->save($vehicleoperationslimit)) {
                $this->Flash->success(__('The vehicleoperationslimit has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The vehicleoperationslimit could not be saved. Please, try again.'));
            }
        }
        $vehicles = $this->Vehicleoperationslimit->Vehicles->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id']);
        $iButtons = $this->Vehicleoperationslimit->IButtons->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id']);
        $this->set(compact('vehicleoperationslimit', 'vehicles', 'iButtons'));
        $this->set('_serialize', ['vehicleoperationslimit']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Vehicleoperationslimit id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $vehicleoperationslimit = $this->Vehicleoperationslimit->get($id);
        if ($this->Vehicleoperationslimit->delete($vehicleoperationslimit)) {
            $this->Flash->success(__('The vehicleoperationslimit has been deleted.'));
        } else {
            $this->Flash->error(__('The vehicleoperationslimit could not be deleted. Please, try again.'));
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
			    	
					$record = $this->Vehicleoperationslimit->get($value);
					
					 if($record['customer_id']== $this->loggedinuser['customer_id']) {
					 	
						   if ($this->Vehicleoperationslimit->delete($record)) {
					           $sucess= $sucess | true;
					        } else {
					           $failure= $failure | true;
					        }
					}
				}  	  
			}
		   		        
		
				if($sucess){
					$this->Flash->success(__('Selected Vehicleoperationslimit has been deleted.'));
				}
		        if($failure){
					$this->Flash->error(__('The Vehicleoperationslimit could not be deleted. Please, try again.'));
				}
		
		   }

             return $this->redirect(['action' => 'index']);	
     }
}
