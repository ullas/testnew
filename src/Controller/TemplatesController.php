<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Templates Controller
 *
 * @property \App\Model\Table\TemplatesTable $Templates
 */
class TemplatesController extends AppController
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
         $configs=$this->CreateConfigs->find('all')->where(['table_name' => 'Templates'])->order(['"order"' => 'ASC'])->toArray();
		 $this->loadModel('Usersettings');
		 $usersettings=$this->Usersettings->find('all')->where(['user_id' => $this->loggedinuser['id']])->where(['module' => 'Templates'])->where(['key' => 'INIT_VISIBLE_COLUMNS_TEMPLATES'])->toArray();
         if(isset($usersettings[0]['value'])){
         	$this->set('usersettings',$usersettings);	
			
         }else{
         	
         	$this->loadModel('Globalusersettings');
		    $usersettings=$this->Globalusersettings->find('all')->where(['module' => 'Templates'])->where(['key' => 'INIT_VISIBLE_COLUMNS_TEMPLATES'])->toArray();
            $this->set('usersettings',$usersettings);
			
         }
		 $actions =[
               /* ['name'=>'assign','title'=>'Assign','class'=>'label-success'],
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
	   ->where(['key' => 'INIT_VISIBLE_COLUMNS_TEMPLATES'])
	  ->where(['user_id' => $this->loggedinuser['id']])
	   ->count();
	
	if($count>0)	{	 
	
	$query = $userSettings->query();
	$res=$query->update()
	    ->set(['value' => $columns])
		->set(['value1' => $visorder])
	    ->where(['key' => 'INIT_VISIBLE_COLUMNS_TEMPLATES'])
	    ->where(['user_id' => $this->loggedinuser['id']])
	    ->execute();
	$this->response->body($res);
	
   }else{
   	  
	   $query1 = $userSettings->query();
	   $res=$query1->insert(['key','value','user_id','module'])
	   ->values(
	       ['key'=>'INIT_VISIBLE_COLUMNS_TEMPLATES',
	        'value'=>$columns,
	        'user_id'=>$this->loggedinuser['id'],
	        'module'=>'Templates'])
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
       $dbout=$this->CreateConfigs->find('all')->where(['table_name' => 'Templates'])->order(['"order"' => 'ASC'])->toArray();
        
        $fields = array();
        foreach($dbout as $value){
            $fields[] = array("name" => $value['field_name'] , "type" => $value['datatype'] );
			
        }
        
		
		
		                           
        $output =$this->Datatable->getView($fields,['Customers','Templatetypes','Alertcategories'],$usrfiter);
        $out =json_encode($output);  
	   
		$this->response->body($out);
	    return $this->response;
	     
             
 }  

    /**
     * View method
     *
     * @param string|null $id Template id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $template = $this->Templates->get($id, [
            'contain' => ['Customers', 'Templatetypes', 'Alertcategories', 'Jobs']
        ]);

       if($address['customer_id']==$this->loggedinuser['customer_id']){
        $this->set('template', $template);
        $this->set('_serialize', ['template']);
		
	   }else{
	   	  $this->redirect(['action' => 'logout','controller'=>'users']);
	   }
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $template = $this->Templates->newEntity();
        if ($this->request->is('post')) {
            $template = $this->Templates->patchEntity($template, $this->request->data);
			 $template['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Templates->save($template)) {
                $this->Flash->success(__('The template has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
            	
                $this->Flash->error(__('The template could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Templates->Customers->find('list', ['limit' => 200]);
        $templatetypes = $this->Templates->Templatetypes->find('list', ['limit' => 200]);
        $alertcategories = $this->Templates->Alertcategories->find('list', ['limit' => 200]);
        $this->set(compact('template', 'customers', 'templatetypes', 'alertcategories'));
        $this->set('_serialize', ['template']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Template id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $template = $this->Templates->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $template = $this->Templates->patchEntity($template, $this->request->data);
			$template['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Templates->save($template)) {
                $this->Flash->success(__('The template has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The template could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Templates->Customers->find('list', ['limit' => 200]);
        $templatetypes = $this->Templates->Templatetypes->find('list', ['limit' => 200]);
        $alertcategories = $this->Templates->Alertcategories->find('list', ['limit' => 200]);
        $this->set(compact('template', 'customers', 'templatetypes', 'alertcategories'));
        $this->set('_serialize', ['template']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Template id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $template = $this->Templates->get($id);
        if ($this->Templates->delete($template)) {
            $this->Flash->success(__('The template has been deleted.'));
        } else {
            $this->Flash->error(__('The template could not be deleted. Please, try again.'));
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
			    	
					$record = $this->Templates->get($value);
					
					 if($record['customer_id']== $this->loggedinuser['customer_id']) {
					 	
						   if ($this->Templates->delete($record)) {
					           $sucess= $sucess | true;
					        } else {
					           $failure= $failure | true;
					        }
					}
				}  	  
			}
		   		        
		
				if($sucess){
					$this->Flash->success(__('Selected Templates has been deleted.'));
				}
		        if($failure){
					$this->Flash->error(__('The Templates could not be deleted. Please, try again.'));
				}
		
		   }

             return $this->redirect(['action' => 'index']);	
     }
	
}
