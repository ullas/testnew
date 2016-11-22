<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Tripstatuses Controller
 *
 * @property \App\Model\Table\TripstatusesTable $Tripstatuses
 */
class TripstatusesController extends AppController
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
       $this->loadModel('Tripstatuses');
       $configs=$this->Tripstatuses->find('all')->toArray();
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
		

        $this->loadModel('Tripstatuses');
        $dbout=$this->Tripstatuses->find('all')->toArray();
     
         $fields = array();
		 
				$fields[0] = array("name" =>"Tripstatuses.id"  , "type" => "num");
				$fields[1] = array("name" =>"Tripstatuses.name"  , "type" => "char");
				$fields[2] = array("name" =>"Tripstatuses.description"  , "type" => "char");				
		
		$this->log($fields);
		$output =$this->Datatablemaster->getView($fields,['Customers'],$usrfiter);
		$out =json_encode($output);  
	   
		$this->response->body($out);
	    return $this->response;
	}

    /**
     * View method
     *
     * @param string|null $id Tripstatus id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tripstatus = $this->Tripstatuses->get($id, [
            'contain' => ['Trips']
        ]);

        $this->set('tripstatus', $tripstatus);
        $this->set('_serialize', ['tripstatus']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tripstatus = $this->Tripstatuses->newEntity();
        if ($this->request->is('post')) {
            $tripstatus = $this->Tripstatuses->patchEntity($tripstatus, $this->request->data);
			$tripstatus['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Tripstatuses->save($tripstatus)) {
             //   $this->Flash->success(__('The tripstatus has been saved.'));

            //    return $this->redirect(['action' => 'index']);
            } else {
             //   $this->Flash->error(__('The tripstatus could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('tripstatus'));
        $this->set('_serialize', ['tripstatus']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Tripstatus id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tripstatus = $this->Tripstatuses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tripstatus = $this->Tripstatuses->patchEntity($tripstatus, $this->request->data);
			$tripstatus['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Tripstatuses->save($tripstatus)) {
            //    $this->Flash->success(__('The tripstatus has been saved.'));

             //   return $this->redirect(['action' => 'index']);
            } else {
             //   $this->Flash->error(__('The tripstatus could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('tripstatus'));
        $this->set('_serialize', ['tripstatus']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Tripstatus id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
       // $this->request->allowMethod(['post', 'delete']);
        $tripstatus = $this->Tripstatuses->get($id);
        if ($this->Tripstatuses->delete($tripstatus)) {
       //     $this->Flash->success(__('The tripstatus has been deleted.'));
        } else {
        //    $this->Flash->error(__('The tripstatus could not be deleted. Please, try again.'));
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
			    	
					$record = $this->Purposes->get($value);
					
					 if($record['customer_id']== $this->loggedinuser['customer_id']) 
					 {
					 	
						   if ($this->Purposes->delete($record)) 
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
					$this->Flash->success(__('Selected Purposes has been deleted.'));
				}
		        if($failure)
		        {
					$this->Flash->error(__('The Purposes could not be deleted. Please, try again.'));
				}
		
		   }

             return $this->redirect(['action' => 'index']);	
     }
}
