<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Measurementunits Controller
 *
 * @property \App\Model\Table\MeasurementunitsTable $Measurementunits
 */
class MeasurementunitsController extends AppController
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
         $this->loadModel('Measurementunits');
       $configs=$this->Measurementunits->find('all')->toArray();
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
		

        $this->loadModel('Measurementunits');
        $dbout=$this->Measurementunits->find('all')->toArray();
     
         $fields = array();
		 
				$fields[0] = array("name" =>"Measurementunits.id"  , "type" => "num");
				$fields[1] = array("name" =>"Measurementunits.name"  , "type" => "char");
				$fields[2] = array("name" =>"Measurementunits.description"  , "type" => "char");
				
				
		
		$this->log($fields);
		$output =$this->Datatablemaster->getView($fields,['Customers'],$usrfiter);
		$out =json_encode($output);  
	   
		$this->response->body($out);
	    return $this->response;
	}
	
    /**
     * View method
     *
     * @param string|null $id Measurementunit id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $measurementunit = $this->Measurementunits->get($id, [
            'contain' => ['Customers', 'Parts']
        ]);

        $this->set('measurementunit', $measurementunit);
        $this->set('_serialize', ['measurementunit']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $measurementunit = $this->Measurementunits->newEntity();
        if ($this->request->is('post')) {
            $measurementunit = $this->Measurementunits->patchEntity($measurementunit, $this->request->data);
			$measurementunit['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Measurementunits->save($measurementunit)) {
           //     $this->Flash->success(__('The measurementunit has been saved.'));

            //    return $this->redirect(['action' => 'index']);
            } else {
           //     $this->Flash->error(__('The measurementunit could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Measurementunits->Customers->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $this->set(compact('measurementunit', 'customers'));
        $this->set('_serialize', ['measurementunit']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Measurementunit id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $measurementunit = $this->Measurementunits->get($id, [
            'contain' => []
        ]);
		if($measurementunit['customer_id']!= $this->loggedinuser['customer_id'])
		{
			 $this->Flash->success(__('You are not Authorized.'));
			 return $this->redirect(['action' => 'index']);
			
		}
        if ($this->request->is(['patch', 'post', 'put'])) {
            $measurementunit = $this->Measurementunits->patchEntity($measurementunit, $this->request->data);
			$measurementunit['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Measurementunits->save($measurementunit)) {
           //     $this->Flash->success(__('The measurementunit has been saved.'));

           //     return $this->redirect(['action' => 'index']);
            } else {
            //    $this->Flash->error(__('The measurementunit could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Measurementunits->Customers->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $this->set(compact('measurementunit', 'customers'));
        $this->set('_serialize', ['measurementunit']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Measurementunit id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        //$this->request->allowMethod(['post', 'delete']);
        $measurementunit = $this->Measurementunits->get($id);
		if($measurementunit['customer_id'] = $this->loggedinuser['customer_id'])
	    {
	        if ($this->Measurementunits->delete($measurementunit)) {
	       //     $this->Flash->success(__('The measurementunit has been deleted.'));
	        } else {
	        //    $this->Flash->error(__('The measurementunit could not be deleted. Please, try again.'));
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
			    	
					$record = $this->Measurementunits->get($value);
					
					 if($record['customer_id']== $this->loggedinuser['customer_id']) {
					 	
						   if ($this->Measurementunits->delete($record)) {
					           $sucess= $sucess | true;
					        } else {
					           $failure= $failure | true;
					        }
					}
				}  	  
			}
		   		        
		
				if($sucess){
					$this->Flash->success(__('Selected Measurementunits has been deleted.'));
				}
		        if($failure){
					$this->Flash->error(__('The Measurementunits could not be deleted. Please, try again.'));
				}
		
		   }

             return $this->redirect(['action' => 'index']);	
     }
}
