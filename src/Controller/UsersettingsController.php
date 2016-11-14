<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Usersettings Controller
 *
 * @property \App\Model\Table\UsersettingsTable $Usersettings
 * @property \App\Controller\Component\DatatableComponent $Datatable
 */
class UsersettingsController extends AppController
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
         $configs=$this->CreateConfigs->find('all')->where(['table_name' => 'Usersettings'])->order(['"order"' => 'ASC'])->toArray();
        
         	 $this->loadModel('Usersettings');
		 $usersettings=$this->Usersettings->find('all')->where(['user_id' => $this->loggedinuser['id']])->where(['module' => 'Usersettings'])->where(['key' => 'INIT_VISIBLE_COLUMNS_USERSETTINGS'])->toArray();
         if(isset($usersettings[0]['value'])){
         	$this->set('usersettings',$usersettings);	
			
         }else{
         	
         	$this->loadModel('Globalusersettings');
		    $usersettings=$this->Globalusersettings->find('all')->where(['module' => 'Usersettings'])->where(['key' => 'INIT_VISIBLE_COLUMNS_USERSETTINGS'])->toArray();
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
	   ->where(['key' => 'INIT_VISIBLE_COLUMNS_USERSETTINGS'])
	  ->where(['user_id' => $this->loggedinuser['id']])
	   ->count();
	
	if($count>0)	{	 
	
	$query = $userSettings->query();
	$res=$query->update()
	    ->set(['value' => $columns])
		->set(['value1' => $visorder])
	    ->where(['key' => 'INIT_VISIBLE_COLUMNS_USERSETTINGS'])
	    ->where(['user_id' => $this->loggedinuser['id']])
	    ->execute();
	$this->response->body($res);
	
   }else{
   	  
	   $query1 = $userSettings->query();
	   $res=$query1->insert(['key','value','user_id','module'])
	   ->values(
	       ['key'=>'INIT_VISIBLE_COLUMNS_USERSETTINGS',
	        'value'=>$columns,
	        'user_id'=>$this->loggedinuser['id'],
	        'module'=>'Usersettings'])
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
		
	// $alldates=explode(",",$dates);
 	
	// $pre=($basic>0)?" and ":"";
	
	// $datecol=explode("-",$alldates[0]);
 	
	// $sql .=  count($datecol)>1? " $pre dateofservice between '" . $this->toPostDBDate($datecol[0]) . "' and '" . $this->toPostDBDate($datecol[1]) . "'": "" ;
// 	
	//$datecol=explode("-",$alldates[1]);
	
	//$pre=(strlen($sql)>0)?" and ":"";
	
	//$sql .=  count($datecol)>1? " $pre startdate between '" . $this->toPostDBDate($datecol[0]) . "' and '" . $this->toPostDBDate($datecol[1]) . "'": "" ;
	
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
		
		
       $this->loadModel('CreateConfigs');
       $dbout=$this->CreateConfigs->find('all')->where(['table_name' => 'Usersettings'])->order(['"order"' => 'ASC'])->toArray();
        
        $fields = array();
        foreach($dbout as $value){
            $fields[] = array("name" => $value['field_name'] , "type" => $value['datatype'] );
			
        }
        
		
		
		                           
        $output =$this->Datatable->getView($fields,[ 'Users'],$usrfiter);
        $out =json_encode($output);  
	   
		$this->response->body($out);
	    return $this->response;
	     
             
 }  

    /**
     * View method
     *
     * @param string|null $id Usersetting id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $usersetting = $this->Usersettings->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('usersetting', $usersetting);
        $this->set('_serialize', ['usersetting']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $usersetting = $this->Usersettings->newEntity();
        if ($this->request->is('post')) {
            $usersetting = $this->Usersettings->patchEntity($usersetting, $this->request->data);
            $usersetting['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Usersettings->save($usersetting)) {
                $this->Flash->success(__('The usersetting has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The usersetting could not be saved. Please, try again.'));
            }
        }
        
        $users = $this->Usersettings->Users->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id'])->where("customer_id=0");
        
                $this->set(compact('usersetting', 'users'));
        $this->set('_serialize', ['usersetting']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Usersetting id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $usersetting = $this->Usersettings->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $usersetting = $this->Usersettings->patchEntity($usersetting, $this->request->data);
             $usersetting['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Usersettings->save($usersetting)) {
                $this->Flash->success(__('The usersetting has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The usersetting could not be saved. Please, try again.'));
            }
        }
        $users = $this->Usersettings->Users->find('list', ['limit' => 200]);
        $this->set(compact('usersetting', 'users'));
        $this->set('_serialize', ['usersetting']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Usersetting id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $usersetting = $this->Usersettings->get($id);
        if ($this->Usersettings->delete($usersetting)) {
            $this->Flash->success(__('The usersetting has been deleted.'));
        } else {
            $this->Flash->error(__('The usersetting could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
