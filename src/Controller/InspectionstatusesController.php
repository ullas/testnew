<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Inspectionstatuses Controller
 *
 * @property \App\Model\Table\InspectionstatusesTable $Inspectionstatuses
 * @property \App\Controller\Component\DatatableComponent $Datatable
 */
class InspectionstatusesController extends AppController
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
    	$this->loadModel('Inspectionstatuses');
       $configs=$this->Inspectionstatuses->find('all')->toArray();
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
		

        $this->loadModel('Inspectionstatuses');
        $dbout=$this->Inspectionstatuses->find('all')->toArray();
     
         $fields = array();
		 
				$fields[0] = array("name" =>"Inspectionstatuses.id"  , "type" => "num");
				$fields[1] = array("name" =>"Inspectionstatuses.name"  , "type" => "char");
				$fields[2] = array("name" =>"Inspectionstatuses.description"  , "type" => "char");
				
				
		
		$this->log($fields);
		$output =$this->Datatablemaster->getView($fields,['Customers'],$usrfiter);
		$out =json_encode($output);  
	   
		$this->response->body($out);
	    return $this->response;
	}

    /**
     * View method
     *
     * @param string|null $id Inspectionstatus id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $inspectionstatus = $this->Inspectionstatuses->get($id, [
            'contain' => ['Customers', 'Inspections']
        ]);

        $this->set('inspectionstatus', $inspectionstatus);
        $this->set('_serialize', ['inspectionstatus']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $inspectionstatus = $this->Inspectionstatuses->newEntity();
        if ($this->request->is('post')) {
            $inspectionstatus = $this->Inspectionstatuses->patchEntity($inspectionstatus, $this->request->data);
            $inspectionstatus['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Inspectionstatuses->save($inspectionstatus)) {
             //   $this->Flash->success(__('The inspectionstatus has been saved.'));

             //  return $this->redirect(['action' => 'index']);
            } else {
              //  $this->Flash->error(__('The inspectionstatus could not be saved. Please, try again.'));
            }
        }
                
          $customers = $this->Inspectionstatuses->Customers->find('list', ['limit' => 200])->where("id=".$this->loggedinuser['customer_id']);
      
        
                $this->set(compact('inspectionstatus', 'customers'));
        $this->set('_serialize', ['inspectionstatus']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Inspectionstatus id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $inspectionstatus = $this->Inspectionstatuses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $inspectionstatus = $this->Inspectionstatuses->patchEntity($inspectionstatus, $this->request->data);
             $inspectionstatus['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Inspectionstatuses->save($inspectionstatus)) {
             //   $this->Flash->success(__('The inspectionstatus has been saved.'));

             //   return $this->redirect(['action' => 'index']);
            } else {
             //   $this->Flash->error(__('The inspectionstatus could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Inspectionstatuses->Customers->find('list', ['limit' => 200]);
        $this->set(compact('inspectionstatus', 'customers'));
        $this->set('_serialize', ['inspectionstatus']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Inspectionstatus id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $inspectionstatus = $this->Inspectionstatuses->get($id);
        if ($this->Inspectionstatuses->delete($inspectionstatus)) {
         //   $this->Flash->success(__('The inspectionstatus has been deleted.'));
        } else {
         //   $this->Flash->error(__('The inspectionstatus could not be deleted. Please, try again.'));
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
			    	
					$record = $this->Inspectionstatuses->get($value);
					
					 if($record['customer_id']== $this->loggedinuser['customer_id']) {
					 	
						   if ($this->Inspectionstatuses->delete($record)) {
					           $sucess= $sucess | true;
					        } else {
					           $failure= $failure | true;
					        }
					}
				}  	  
			}
		   		        
		
				if($sucess){
					$this->Flash->success(__('Selected Inspectionstatuses has been deleted.'));
				}
		        if($failure){
					$this->Flash->error(__('The Inspectionstatuses could not be deleted. Please, try again.'));
				}
		
		   }

             return $this->redirect(['action' => 'index']);	
     }
}
