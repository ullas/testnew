<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Templatetypes Controller
 *
 * @property \App\Model\Table\TemplatetypesTable $Templatetypes
 */
class TemplatetypesController extends AppController
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
       $this->loadModel('Templatetypes');
       $configs=$this->Templatetypes->find('all')->toArray();
	   $actions =[['name'=>'delete','title'=>'Delete','class'=>' label-danger ']];
       $additional= ['basic'=>['All'],
      	                'additional'=>[ ]
      	            ];
	   $this->set('additional',$additional);
	   $this->set('actions',$actions);	
       $this->set('configs',$configs);	
       $this->set('_serialize', ['configs','actions']);
    }
	
	public function ajaxdata() 
	{
        $this->autoRender= false;
		$usrfiter="";
		$basic = isset($this->request->query['basic'])?$this->request->query['basic']:"" ;
		$additional = isset($this->request->query['additional'])?$this->request->query['additional']:"";
		

        $this->loadModel('Templatetypes');
        $dbout=$this->Templatetypes->find('all')->toArray();
     
         $fields = array();
		 
				$fields[0] = array("name" =>"Templatetypes.id"  , "type" => "num");
				$fields[1] = array("name" =>"Templatetypes.name"  , "type" => "char");
				$fields[2] = array("name" =>"Templatetypes.description"  , "type" => "char");				
		
		$this->log($fields);
		$output =$this->Datatablemaster->getView($fields,['Customers'],$usrfiter);
		$out =json_encode($output);  
	   
		$this->response->body($out);
	    return $this->response;
	}

    /**
     * View method
     *
     * @param string|null $id Templatetype id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $templatetype = $this->Templatetypes->get($id, [
            'contain' => ['Customers', 'Templates']
        ]);

        $this->set('templatetype', $templatetype);
        $this->set('_serialize', ['templatetype']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $templatetype = $this->Templatetypes->newEntity();
        if ($this->request->is('post')) {
            $templatetype = $this->Templatetypes->patchEntity($templatetype, $this->request->data);
			$templatetype['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Templatetypes->save($templatetype)) {
            //    $this->Flash->success(__('The templatetype has been saved.'));

            //    return $this->redirect(['action' => 'index']);
            } else {
            //    $this->Flash->error(__('The templatetype could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Templatetypes->Customers->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $this->set(compact('templatetype', 'customers'));
        $this->set('_serialize', ['templatetype']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Templatetype id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $templatetype = $this->Templatetypes->get($id, [
            'contain' => []
        ]);
		if($templatetype['customer_id']!= $this->loggedinuser['customer_id'])
		{
			 $this->Flash->success(__('You are not Authorized.'));
			 return $this->redirect(['action' => 'index']);
			
		}
        if ($this->request->is(['patch', 'post', 'put'])) {
            $templatetype = $this->Templatetypes->patchEntity($templatetype, $this->request->data);
			$templatetype['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Templatetypes->save($templatetype)) {
             //   $this->Flash->success(__('The templatetype has been saved.'));

            //    return $this->redirect(['action' => 'index']);
            } else {
            //    $this->Flash->error(__('The templatetype could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Templatetypes->Customers->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $this->set(compact('templatetype', 'customers'));
        $this->set('_serialize', ['templatetype']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Templatetype id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
       // $this->request->allowMethod(['post', 'delete']);
        $templatetype = $this->Templatetypes->get($id);
		if($templatetype['customer_id'] = $this->loggedinuser['customer_id'])
	    {
	        if ($this->Templatetypes->delete($templatetype)) {
	        //    $this->Flash->success(__('The templatetype has been deleted.'));
	        } else {
	        //    $this->Flash->error(__('The templatetype could not be deleted. Please, try again.'));
	        }
		 }
		 else
		 {
	   	    $this->Flash->error(__('You are not authorized'));
		
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
			    	
					$record = $this->Templatetypes->get($value);
					
					 if($record['customer_id']== $this->loggedinuser['customer_id']) 
					 {
					 	
						   if ($this->Templatetypes->delete($record)) 
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
					$this->Flash->success(__('Selected Templatetypes has been deleted.'));
				}
		        if($failure)
		        {
					$this->Flash->error(__('The Purposes Templatetypes not be deleted. Please, try again.'));
				}
		
		   }

             return $this->redirect(['action' => 'index']);	
     }
}
