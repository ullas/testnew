<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Eventtypes Controller
 *
 * @property \App\Model\Table\EventtypesTable $Eventtypes
 */
class EventtypesController extends AppController
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
        $this->loadModel('EventTypes');
       $configs=$this->EventTypes->find('all')->toArray();
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
		

        $this->loadModel('EventTypes');
        $dbout=$this->EventTypes->find('all')->toArray();
     
         $fields = array();
		 
				$fields[0] = array("name" =>"Eventtypes.id"  , "type" => "num");
				$fields[1] = array("name" =>"Eventtypes.name"  , "type" => "char");
				$fields[2] = array("name" =>"Eventtypes.code"  , "type" => "num");
				$fields[3] = array("name" =>"Eventtypes.provider"  , "type" => "num");
				$fields[4] = array("name" =>"Eventtypes.model"  , "type" => "char");
				
		
		$this->log($fields);
		$output =$this->Datatablemaster->getView($fields,['Customers'],$usrfiter);
		$out =json_encode($output);  
	   
		$this->response->body($out);
	    return $this->response;
	     
             
	 }

    /**
     * View method
     *
     * @param string|null $id Eventtype id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $eventtype = $this->Eventtypes->get($id, [
            'contain' => ['Gpsdata']
        ]);

        $this->set('eventtype', $eventtype);
        $this->set('_serialize', ['eventtype']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $eventtype = $this->Eventtypes->newEntity();
        if ($this->request->is('post')) {
            $eventtype = $this->Eventtypes->patchEntity($eventtype, $this->request->data);
			$eventtype['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Eventtypes->save($eventtype)) {
         //       $this->Flash->success(__('The eventtype has been saved.'));

         //       return $this->redirect(['action' => 'index']);
            } else {
         //       $this->Flash->error(__('The eventtype could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('eventtype'));
        $this->set('_serialize', ['eventtype']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Eventtype id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $eventtype = $this->Eventtypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $eventtype = $this->Eventtypes->patchEntity($eventtype, $this->request->data);
			$eventtype['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Eventtypes->save($eventtype)) {
         //       $this->Flash->success(__('The eventtype has been saved.'));

         //       return $this->redirect(['action' => 'index']);
            } else {
         //       $this->Flash->error(__('The eventtype could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('eventtype'));
        $this->set('_serialize', ['eventtype']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Eventtype id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $eventtype = $this->Eventtypes->get($id);
        if ($this->Eventtypes->delete($eventtype)) {
       //     $this->Flash->success(__('The eventtype has been deleted.'));
        } else {
      //      $this->Flash->error(__('The eventtype could not be deleted. Please, try again.'));
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
			    	
					$record = $this->Eventtypes->get($value);
					
					 if($record['customer_id']== $this->loggedinuser['customer_id']) {
					 	
						   if ($this->Eventtypes->delete($record)) {
					           $sucess= $sucess | true;
					        } else {
					           $failure= $failure | true;
					        }
					}
				}  	  
			}
		   		        
		
				if($sucess){
					$this->Flash->success(__('Selected Eventtypes has been deleted.'));
				}
		        if($failure){
					$this->Flash->error(__('The Eventtypes could not be deleted. Please, try again.'));
				}
		
		   }

             return $this->redirect(['action' => 'index']);	
     }
}
