<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Driverdetectionmodes Controller
 *
 * @property \App\Model\Table\DriverdetectionmodesTable $Driverdetectionmodes
 */
class DriverdetectionmodesController extends AppController
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
       $this->loadModel('Driverdetectionmodes');
       $configs=$this->Driverdetectionmodes->find('all')->toArray();
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
		

        $this->loadModel('Driverdetectionmodes');
        $dbout=$this->Driverdetectionmodes->find('all')->toArray();
     
         $fields = array();
		 
				$fields[0] = array("name" =>"Driverdetectionmodes.id"  , "type" => "num");
				$fields[1] = array("name" =>"Driverdetectionmodes.name"  , "type" => "char");
				
				
		
		$this->log($fields);
		$output =$this->Datatable->getView($fields,['Customers'],$usrfiter);
		$out =json_encode($output);  
	   
		$this->response->body($out);
	    return $this->response;
	}
    /**
     * View method
     *
     * @param string|null $id Driverdetectionmode id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $driverdetectionmode = $this->Driverdetectionmodes->get($id, [
            'contain' => ['Vehicles']
        ]);

        $this->set('driverdetectionmode', $driverdetectionmode);
        $this->set('_serialize', ['driverdetectionmode']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $driverdetectionmode = $this->Driverdetectionmodes->newEntity();
        if ($this->request->is('post')) {
            $driverdetectionmode = $this->Driverdetectionmodes->patchEntity($driverdetectionmode, $this->request->data);
            $driverdetectionmode['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Driverdetectionmodes->save($driverdetectionmode)) {
                $this->Flash->success(__('The driverdetectionmode has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The driverdetectionmode could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('driverdetectionmode'));
        $this->set('_serialize', ['driverdetectionmode']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Driverdetectionmode id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $driverdetectionmode = $this->Driverdetectionmodes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $driverdetectionmode = $this->Driverdetectionmodes->patchEntity($driverdetectionmode, $this->request->data);
			$driverdetectionmode['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Driverdetectionmodes->save($driverdetectionmode)) {
                $this->Flash->success(__('The driverdetectionmode has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The driverdetectionmode could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('driverdetectionmode'));
        $this->set('_serialize', ['driverdetectionmode']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Driverdetectionmode id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $driverdetectionmode = $this->Driverdetectionmodes->get($id);
        if ($this->Driverdetectionmodes->delete($driverdetectionmode)) {
            $this->Flash->success(__('The driverdetectionmode has been deleted.'));
        } else {
            $this->Flash->error(__('The driverdetectionmode could not be deleted. Please, try again.'));
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
			    	
					$record = $this->Driverdetectionmodes->get($value);
					
					 if($record['customer_id']== $this->loggedinuser['customer_id']) {
					 	
						   if ($this->Driverdetectionmodes->delete($record)) {
					           $sucess= $sucess | true;
					        } else {
					           $failure= $failure | true;
					        }
					}
				}  	  
			}
		   		        
		
				if($sucess){
					$this->Flash->success(__('Selected Driverdetectionmodes has been deleted.'));
				}
		        if($failure){
					$this->Flash->error(__('The Driverdetectionmodes could not be deleted. Please, try again.'));
				}
		
		   }

             return $this->redirect(['action' => 'index']);	
     }
}
