<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Sensormappings Controller
 *
 * @property \App\Model\Table\SensormappingsTable $Sensormappings * @property \App\Controller\Component\DatatableComponent $Datatable */
class SensormappingsController extends AppController
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
    	$this->loadModel('CreateConfigs');
         $configs=$this->CreateConfigs->find('all')->where(['table_name' => 'Sensormappings'])->order(['"order"' => 'ASC'])->toArray();
		 $this->loadModel('Usersettings');
		 $usersettings=$this->Usersettings->find('all')->where(['user_id' => $this->loggedinuser['id']])->where(['module' => 'Sensormappings'])->where(['key' => 'INIT_VISIBLE_COLUMNS_SENSORMAPPINGS'])->toArray();
         if(isset($usersettings[0]['value'])){
         	$this->set('usersettings',$usersettings);	
			
         }else{
         	
         	$this->loadModel('Globalusersettings');
		    $usersettings=$this->Globalusersettings->find('all')->where(['module' => 'Sensormappings'])->where(['key' => 'INIT_VISIBLE_COLUMNS_SENSORMAPPINGS'])->toArray();
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
	   ->where(['key' => 'INIT_VISIBLE_COLUMNS_SENSORMAPPINGS'])
	  ->where(['user_id' => $this->loggedinuser['id']])
	   ->count();
	
	if($count>0)	{	 
	
	$query = $userSettings->query();
	$res=$query->update()
	    ->set(['value' => $columns])
		->set(['value1' => $visorder])
	    ->where(['key' => 'INIT_VISIBLE_COLUMNS_SENSORMAPPINGS'])
	    ->where(['user_id' => $this->loggedinuser['id']])
	    ->execute();
	$this->response->body($res);
	
   }else{
   	  
	   $query1 = $userSettings->query();
	   $res=$query1->insert(['key','value','user_id','module'])
	   ->values(
	       ['key'=>'INIT_VISIBLE_COLUMNS_SENSORMAPPINGS',
	        'value'=>$columns,
	        'user_id'=>$this->loggedinuser['id'],
	        'module'=>'Sensormappings'])
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
	
		return $sql;
	}  
	
    
	public function ajaxdata() 
	{
        	
        $this->autoRender= false;
		$usrfiter="";
		$basic = isset($this->request->query['basic'])?$this->request->query['basic']:"" ;
		$additional = isset($this->request->query['additional'])?$this->request->query['additional']:"";
		
		
          
       $this->loadModel('CreateConfigs');
       $dbout=$this->CreateConfigs->find('all')->where(['table_name' => 'Sensormappings'])->order(['"order"' => 'ASC'])->toArray();
       
        $fields = array();
        foreach($dbout as $value){
            $fields[] = array("name" => $value['field_name'] , "type" => $value['datatype'] );
			
        }
        
		
		
		$output =$this->Datatable->getView($fields,['Customers'],$usrfiter);
		$out =json_encode($output);  
	   
		$this->response->body($out);
	    return $this->response;
	     
             
 	}  

    /**
     * View method
     *
     * @param string|null $id Sensormapping id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sensormapping = $this->Sensormappings->get($id, [
            'contain' => ['Devices', 'Customers']
        ]);
		
		$this->set('sensormapping', $sensormapping);
        $this->set('_serialize', ['sensormapping']);
		
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sensormapping = $this->Sensormappings->newEntity();
        if ($this->request->is('post')) {
            $sensormapping = $this->Sensormappings->patchEntity($sensormapping, $this->request->data);
            $sensormapping['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Sensormappings->save($sensormapping)) {
                $this->Flash->success(__('The sensormapping has been saved.'));

               // return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The sensormapping could not be saved. Please, try again.'));
            }
        }
        
        $devices = $this->Sensormappings->Devices->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id'])->orwhere("customer_id=0");
        $customers = $this->Sensormappings->Customers->find('list', ['limit' => 200])->where("id=".$this->loggedinuser['customer_id']);
      
        $this->set(compact('sensormapping', 'devices', 'customers'));
        $this->set('_serialize', ['sensormapping']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Sensormapping id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sensormapping = $this->Sensormappings->get($id, [
            'contain' => []
        ]);
		if($sensormapping['customer_id']!= $this->loggedinuser['customer_id'])
		{
			 $this->Flash->success(__('You are not Authorized.'));
			 return $this->redirect(['action' => 'index']);
		}
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sensormapping = $this->Sensormappings->patchEntity($sensormapping, $this->request->data);
             $sensormapping['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Sensormappings->save($sensormapping)) {
                $this->Flash->success(__('The sensormapping has been saved.'));

               // return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The sensormapping could not be saved. Please, try again.'));
            }
        }
        $devices = $this->Sensormappings->Devices->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $customers = $this->Sensormappings->Customers->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $this->set(compact('sensormapping', 'devices', 'customers'));
        $this->set('_serialize', ['sensormapping']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Sensormapping id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sensormapping = $this->Sensormappings->get($id);
		if($sensormapping['customer_id'] = $this->loggedinuser['customer_id'])
		{
	        if ($this->Sensormappings->delete($sensormapping)) {
	            $this->Flash->success(__('The sensormapping has been deleted.'));
	        } else {
	            $this->Flash->error(__('The sensormapping could not be deleted. Please, try again.'));
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
			    	
					$record = $this->Sensormappings->get($value);
					
					 if($record['customer_id']== $this->loggedinuser['customer_id']) {
					 	
						   if ($this->Sensormappings->delete($record)) {
					           $sucess= $sucess | true;
					        } else {
					           $failure= $failure | true;
					        }
					}
				}  	  
			}
		   		        
		
				if($sucess){
					$this->Flash->success(__('Selected Sensormappings has been deleted.'));
				}
		        if($failure){
					$this->Flash->error(__('The Sensormappings could not be deleted. Please, try again.'));
				}
		
		   }

             return $this->redirect(['action' => 'index']);	
     }
}
