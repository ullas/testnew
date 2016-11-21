<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Servicedocuments Controller
 *
 * @property \App\Model\Table\ServicedocumentsTable $Servicedocuments
 */
class ServicedocumentsController extends AppController
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
       $this->loadModel('Servicedocuments');
       $configs=$this->Servicedocuments->find('all')->toArray();
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
		

        $this->loadModel('Servicedocuments');
        $dbout=$this->Servicedocuments->find('all')->toArray();
     
         $fields = array();
		 
				$fields[0] = array("name" =>"Servicedocuments.id"  , "type" => "num");
				$fields[1] = array("name" =>"Servicesentries.name"  , "type" => "char");
				$fields[2] = array("name" =>"Servicedocuments.data"  , "type" => "char");				
		
		$this->log($fields);
		$output =$this->Datatablemaster->getView($fields,['Customers','Servicesentries'],$usrfiter);
		$out =json_encode($output);  
	   
		$this->response->body($out);
	    return $this->response;
	}

    /**
     * View method
     *
     * @param string|null $id Servicedocument id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $servicedocument = $this->Servicedocuments->get($id, [
            'contain' => ['Servicesentries']
        ]);

        $this->set('servicedocument', $servicedocument);
        $this->set('_serialize', ['servicedocument']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $servicedocument = $this->Servicedocuments->newEntity();
        if ($this->request->is('post')) {
            $servicedocument = $this->Servicedocuments->patchEntity($servicedocument, $this->request->data);
			$servicedocument['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Servicedocuments->save($servicedocument)) {
            //    $this->Flash->success(__('The servicedocument has been saved.'));

            //    return $this->redirect(['action' => 'index']);
            } else {
            //    $this->Flash->error(__('The servicedocument could not be saved. Please, try again.'));
            }
        }
        $servicesentries = $this->Servicedocuments->Servicesentries->find('list', ['limit' => 200]);
        $this->set(compact('servicedocument', 'servicesentries'));
        $this->set('_serialize', ['servicedocument']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Servicedocument id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $servicedocument = $this->Servicedocuments->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $servicedocument = $this->Servicedocuments->patchEntity($servicedocument, $this->request->data);
			$servicedocument['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Servicedocuments->save($servicedocument)) {
             //   $this->Flash->success(__('The servicedocument has been saved.'));

             //   return $this->redirect(['action' => 'index']);
            } else {
              //  $this->Flash->error(__('The servicedocument could not be saved. Please, try again.'));
            }
        }
        $servicesentries = $this->Servicedocuments->Servicesentries->find('list', ['limit' => 200]);
        $this->set(compact('servicedocument', 'servicesentries'));
        $this->set('_serialize', ['servicedocument']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Servicedocument id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        //$this->request->allowMethod(['post', 'delete']);
        $servicedocument = $this->Servicedocuments->get($id);
        if ($this->Servicedocuments->delete($servicedocument)) {
        //    $this->Flash->success(__('The servicedocument has been deleted.'));
        } else {
         //   $this->Flash->error(__('The servicedocument could not be deleted. Please, try again.'));
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
			    	
					$record = $this->Servicedocuments->get($value);
					
					 if($record['customer_id']== $this->loggedinuser['customer_id']) 
					 {
					 	
						   if ($this->Servicedocuments->delete($record)) 
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
					$this->Flash->success(__('Selected Service Documents has been deleted.'));
				}
		        if($failure)
		        {
					$this->Flash->error(__('The Service Documents could not be deleted. Please, try again.'));
				}
		
		   }

             return $this->redirect(['action' => 'index']);	
     }
}
