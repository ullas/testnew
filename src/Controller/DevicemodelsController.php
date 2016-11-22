<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Devicemodels Controller
 *
 * @property \App\Model\Table\DevicemodelsTable $Devicemodels
 * @property \App\Controller\Component\DatatableComponent $Datatable
 */
class DevicemodelsController extends AppController
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
       $this->loadModel('Devicemodels');
       $configs=$this->Devicemodels->find('all')->toArray();
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
		

        $this->loadModel('Devicemodels');
        $dbout=$this->Devicemodels->find('all')->toArray();
     
         $fields = array();
		 
				$fields[0] = array("name" =>"Devicemodels.id"  , "type" => "num");
				$fields[1] = array("name" =>"Devicemodels.name"  , "type" => "char");
				$fields[2] = array("name" =>"Devicemodels.description"  , "type" => "char");
				
		
		$this->log($fields);
		$output =$this->Datatablemaster->getView($fields,['Customers'],$usrfiter);
		$out =json_encode($output);  
	   
		$this->response->body($out);
	    return $this->response;
	}

    /**
     * View method
     *
     * @param string|null $id Devicemodel id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $devicemodel = $this->Devicemodels->get($id, [
            'contain' => ['Customers', 'Devices']
        ]);

        $this->set('devicemodel', $devicemodel);
        $this->set('_serialize', ['devicemodel']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $devicemodel = $this->Devicemodels->newEntity();
        if ($this->request->is('post')) {
            $devicemodel = $this->Devicemodels->patchEntity($devicemodel, $this->request->data);
            $devicemodel['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Devicemodels->save($devicemodel)) {
          //      $this->Flash->success(__('The devicemodel has been saved.'));

          //      return $this->redirect(['action' => 'index']);
            } else {
           //     $this->Flash->error(__('The devicemodel could not be saved. Please, try again.'));
            }
        }
                
          $customers = $this->Devicemodels->Customers->find('list', ['limit' => 200])->where("id=".$this->loggedinuser['customer_id']);
      
        
                $this->set(compact('devicemodel', 'customers'));
        $this->set('_serialize', ['devicemodel']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Devicemodel id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $devicemodel = $this->Devicemodels->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $devicemodel = $this->Devicemodels->patchEntity($devicemodel, $this->request->data);
             $devicemodel['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Devicemodels->save($devicemodel)) {
        //        $this->Flash->success(__('The devicemodel has been saved.'));

        //        return $this->redirect(['action' => 'index']);
            } else {
         //       $this->Flash->error(__('The devicemodel could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Devicemodels->Customers->find('list', ['limit' => 200]);
        $this->set(compact('devicemodel', 'customers'));
        $this->set('_serialize', ['devicemodel']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Devicemodel id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
       // $this->request->allowMethod(['post', 'delete']);
        $devicemodel = $this->Devicemodels->get($id);
        if ($this->Devicemodels->delete($devicemodel)) {
       //     $this->Flash->success(__('The devicemodel has been deleted.'));
        } else {
       //     $this->Flash->error(__('The devicemodel could not be deleted. Please, try again.'));
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
			    	
					$record = $this->Devicemodels->get($value);
					
					 if($record['customer_id']== $this->loggedinuser['customer_id']) 
					 {
					 	
						   if ($this->Devicemodels->delete($record)) 
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
					$this->Flash->success(__('Selected Devicemodels has been deleted.'));
				}
		        if($failure)
		        {
					$this->Flash->error(__('The Devicemodels could not be deleted. Please, try again.'));
				}
		
		   }

             return $this->redirect(['action' => 'index']);	
     }
}
