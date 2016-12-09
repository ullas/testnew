<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Contractors Controller
 *
 * @property \App\Model\Table\ContractorsTable $Contractors
 */
class ContractorsController extends AppController
{
	/**
     * Components
     *
     * @var array
     */
    public $components = ['Datatablemaster'];
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
         $this->loadModel('Contractors');
         $configs=$this->Contractors->find('all')->toArray();
		 
          
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
         $this->set('_serialize', ['configs','actions']);
		 //$this->set('_serialize', ['configs','usersettings','actions','additional']);
    }


	
	public function ajaxdata() 
	{
        $this->autoRender= false;
		$usrfiter="";
		$basic = isset($this->request->query['basic'])?$this->request->query['basic']:"" ;
		$additional = isset($this->request->query['additional'])?$this->request->query['additional']:"";
		
		

        $this->loadModel('Contractors');
        $dbout=$this->Contractors->find('all')->toArray();
     
         $fields = array();
		 
				$fields[0] = array("name" =>"Contractors.id"  , "type" => "num");
				$fields[1] = array("name" =>"Contractors.name"  , "type" => "char");
				$fields[2] = array("name" =>"Contractors.description"  , "type" => "char");
				
		
		$this->log($fields);
		$output =$this->Datatablemaster->getView($fields,['Customers'],$usrfiter);
		$out =json_encode($output);  
	   
		$this->response->body($out);
	    return $this->response;
	}

    /**
     * View method
     *
     * @param string|null $id Contractor id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $contractor = $this->Contractors->get($id, [
            'contain' => ['Customers', 'Drivers']
        ]);

        $this->set('contractor', $contractor);
        $this->set('_serialize', ['contractor']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $contractor = $this->Contractors->newEntity();
        if ($this->request->is('post')) {
            $contractor = $this->Contractors->patchEntity($contractor, $this->request->data);
			$contractor['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Contractors->save($contractor)) {
             //   $this->Flash->success(__('The contractor has been saved.'));

           //     return $this->redirect(['action' => 'index']);
            } else {
            //    $this->Flash->error(__('The contractor could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Contractors->Customers->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $this->set(compact('contractor', 'customers'));
        $this->set('_serialize', ['contractor']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Contractor id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $contractor = $this->Contractors->get($id, [
            'contain' => []
        ]);
		if($contractor['customer_id']!= $this->loggedinuser['customer_id'])
		{
			 $this->Flash->success(__('You are not Authorized.'));
			 return $this->redirect(['action' => 'index']);
			
		}
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contractor = $this->Contractors->patchEntity($contractor, $this->request->data);
			$contractor['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Contractors->save($contractor)) {
            //    $this->Flash->success(__('The contractor has been saved.'));

            //    return $this->redirect(['action' => 'index']);
            } else {
            //    $this->Flash->error(__('The contractor could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Contractors->Customers->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $this->set(compact('contractor', 'customers'));
        $this->set('_serialize', ['contractor']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Contractor id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
       // $this->request->allowMethod(['post', 'delete']);
        $contractor = $this->Contractors->get($id);
		if($contractor['customer_id'] = $this->loggedinuser['customer_id'])
		{
	        if ($this->Contractors->delete($contractor)) {
	        //    $this->Flash->success(__('The contractor has been deleted.'));
	        } else {
	        //    $this->Flash->error(__('The contractor could not be deleted. Please, try again.'));
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
			    	
					$record = $this->Contractors->get($value);
					
					 if($record['customer_id']== $this->loggedinuser['customer_id']) {
					 	
						   if ($this->Contractors->delete($record)) {
					           $sucess= $sucess | true;
					        } else {
					           $failure= $failure | true;
					        }
					}
				}  	  
			}
		   		        
		
				if($sucess){
					$this->Flash->success(__('Selected Contractors has been deleted.'));
				}
		        if($failure){
					$this->Flash->error(__('The Contractors could not be deleted. Please, try again.'));
				}
		
		   }

             return $this->redirect(['action' => 'index']);	
     }
}
