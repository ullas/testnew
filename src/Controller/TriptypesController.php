<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Triptypes Controller
 *
 * @property \App\Model\Table\TriptypesTable $Triptypes
 * @property \App\Controller\Component\DatatableComponent $Datatable
 */
class TriptypesController extends AppController
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
       $this->loadModel('Triptypes');
       $configs=$this->Triptypes->find('all')->toArray();
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
		

        $this->loadModel('Triptypes');
        $dbout=$this->Triptypes->find('all')->toArray();
     
         $fields = array();
		 
				$fields[0] = array("name" =>"Triptypes.id"  , "type" => "num");
				$fields[1] = array("name" =>"Triptypes.name"  , "type" => "char");
								
		
		$this->log($fields);
		$output =$this->Datatablemaster->getView($fields,['Customers'],$usrfiter);
		$out =json_encode($output);  
	   
		$this->response->body($out);
	    return $this->response;
	}
    
    

    /**
     * View method
     *
     * @param string|null $id Triptype id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $triptype = $this->Triptypes->get($id, [
            'contain' => ['Customers', 'Trips']
        ]);

        $this->set('triptype', $triptype);
        $this->set('_serialize', ['triptype']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $triptype = $this->Triptypes->newEntity();
        if ($this->request->is('post')) {
            $triptype = $this->Triptypes->patchEntity($triptype, $this->request->data);
			$triptype['customer_id']=$this->loggedinuser['customer_id'];
            $triptype['customer_id']=$this->currentuser['customer_id'];
            if ($this->Triptypes->save($triptype)) {
            //    $this->Flash->success(__('The triptype has been saved.'));

            //    return $this->redirect(['action' => 'index']);
            } else {
            //    $this->Flash->error(__('The triptype could not be saved. Please, try again.'));
            }
        }
                
          $customers = $this->Triptypes->Customers->find('list', ['limit' => 200])->where("id=".$this->loggedinuser['customer_id']);
      
        
                $this->set(compact('triptype', 'customers'));
        $this->set('_serialize', ['triptype']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Triptype id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $triptype = $this->Triptypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $triptype = $this->Triptypes->patchEntity($triptype, $this->request->data);
			$triptype['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Triptypes->save($triptype)) {
            //    $this->Flash->success(__('The triptype has been saved.'));

            //    return $this->redirect(['action' => 'index']);
            } else {
             //   $this->Flash->error(__('The triptype could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Triptypes->Customers->find('list', ['limit' => 200]);
        $this->set(compact('triptype', 'customers'));
        $this->set('_serialize', ['triptype']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Triptype id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        //$this->request->allowMethod(['post', 'delete']);
        $triptype = $this->Triptypes->get($id);
        if ($this->Triptypes->delete($triptype)) {
        //    $this->Flash->success(__('The triptype has been deleted.'));
        } else {
        //    $this->Flash->error(__('The triptype could not be deleted. Please, try again.'));
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
			    	
					$record = $this->Triptypes->get($value);
					
					 if($record['customer_id']== $this->loggedinuser['customer_id']) 
					 {
					 	
						   if ($this->Triptypes->delete($record)) 
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
					$this->Flash->success(__('Selected Triptypes has been deleted.'));
				}
		        if($failure)
		        {
					$this->Flash->error(__('The Triptypes could not be deleted. Please, try again.'));
				}
		
		   }

             return $this->redirect(['action' => 'index']);	
     }
}
