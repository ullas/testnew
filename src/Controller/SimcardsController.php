<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Simcards Controller
 *
 * @property \App\Model\Table\SimcardsTable $Simcards
 * @property \App\Controller\Component\DatatableComponent $Datatable
 */
class SimcardsController extends AppController
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
         $configs=$this->CreateConfigs->find('all')->where(['table_name' => 'Simcards'])->order(['"order"' => 'ASC'])->toArray();
        
         	 $this->loadModel('Usersettings');
		 $usersettings=$this->Usersettings->find('all')->where(['user_id' => $this->loggedinuser['id']])->where(['module' => 'Simcards'])->where(['key' => 'INIT_VISIBLE_COLUMNS_SIMCARDS'])->toArray();
         if(isset($usersettings[0]['value'])){
         	$this->set('usersettings',$usersettings);	
			
         }else{
         	
         	$this->loadModel('Globalusersettings');
		    $usersettings=$this->Globalusersettings->find('all')->where(['module' => 'Simcards'])->where(['key' => 'INIT_VISIBLE_COLUMNS_SIMCARDS'])->toArray();
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
	   ->where(['key' => 'INIT_VISIBLE_COLUMNS_SIMCARDS'])
	  ->where(['user_id' => $this->loggedinuser['id']])
	   ->count();
	
	if($count>0)	{	 
	
	$query = $userSettings->query();
	$res=$query->update()
	    ->set(['value' => $columns])
		->set(['value1' => $visorder])
	    ->where(['key' => 'INIT_VISIBLE_COLUMNS_SIMCARDS'])
	    ->where(['user_id' => $this->loggedinuser['id']])
	    ->execute();
	$this->response->body($res);
	
   }else{
   	  
	   $query1 = $userSettings->query();
	   $res=$query1->insert(['key','value','user_id','module'])
	   ->values(
	       ['key'=>'INIT_VISIBLE_COLUMNS_SIMCARDS',
	        'value'=>$columns,
	        'user_id'=>$this->loggedinuser['id'],
	        'module'=>'Simcards'])
	    ->execute();
	   $this->response->body($res);
	
	   
   }
   }
	public function ajaxdata() {
        $this->autoRender= false;
      	$usrfiter="";
		$basic = isset($this->request->query['basic'])?$this->request->query['basic']:"" ;
		$additional = isset($this->request->query['additional'])?$this->request->query['additional']:"";
		
		
       
	  
	  
          
       $this->loadModel('CreateConfigs');
       $dbout=$this->CreateConfigs->find('all')->where(['table_name' => 'Simcards'])->order(['"order"' => 'ASC'])->toArray();
        
        $fields = array();
        foreach($dbout as $value){
            $fields[] = array("name" => $value['field_name'] , "type" => $value['datatype'] );
			
        }
      
		                           
        $output =$this->Datatable->getView($fields,['Simproviders', 'Customers'],$usrfiter);
        $out =json_encode($output);  
	
		$this->response->body($out);
	    return $this->response;
	     
             
 }  

    /**
     * View method
     *
     * @param string|null $id Simcard id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $simcard = $this->Simcards->get($id, [
            'contain' => ['Simproviders', 'Customers', 'Devices']
        ]);

        $this->set('simcard', $simcard);
        $this->set('_serialize', ['simcard']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $simcard = $this->Simcards->newEntity();
        if ($this->request->is('post')) {
            $simcard = $this->Simcards->patchEntity($simcard, $this->request->data);
            $simcard['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Simcards->save($simcard)) {
                $this->Flash->success(__('The simcard has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The simcard could not be saved. Please, try again.'));
            }
        }
        
        $simproviders = $this->Simcards->Simproviders->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id'])->where("customer_id=0");
        
                        
          $customers = $this->Simcards->Customers->find('list', ['limit' => 200])->where("id=".$this->loggedinuser['customer_id']);
      
        
                $this->set(compact('simcard', 'simproviders', 'customers'));
        $this->set('_serialize', ['simcard']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Simcard id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $simcard = $this->Simcards->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $simcard = $this->Simcards->patchEntity($simcard, $this->request->data);
             $simcard['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Simcards->save($simcard)) {
                $this->Flash->success(__('The simcard has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The simcard could not be saved. Please, try again.'));
            }
        }
        $simproviders = $this->Simcards->Simproviders->find('list', ['limit' => 200]);
        $customers = $this->Simcards->Customers->find('list', ['limit' => 200]);
        $this->set(compact('simcard', 'simproviders', 'customers'));
        $this->set('_serialize', ['simcard']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Simcard id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $simcard = $this->Simcards->get($id);
        if ($this->Simcards->delete($simcard)) {
            $this->Flash->success(__('The simcard has been deleted.'));
        } else {
            $this->Flash->error(__('The simcard could not be deleted. Please, try again.'));
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
			    	
					$record = $this->Simcards->get($value);
					
					 if($record['customer_id']== $this->loggedinuser['customer_id']) {
					 	
						   if ($this->Simcards->delete($record)) {
					           $sucess= $sucess | true;
					        } else {
					           $failure= $failure | true;
					        }
					}
				}  	  
			}
		   		        
		
				if($sucess){
					$this->Flash->success(__('Selected Simcards has been deleted.'));
				}
		        if($failure){
					$this->Flash->error(__('The Simcards could not be deleted. Please, try again.'));
				}
		
		   }

             return $this->redirect(['action' => 'index']);	
     }
}
