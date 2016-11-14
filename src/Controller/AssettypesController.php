<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Assettypes Controller
 *
 * @property \App\Model\Table\AssettypesTable $Assettypes
 */
class AssettypesController extends AppController
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
       $this->loadModel('AssetTypes');
       $configs=$this->AssetTypes->find('all')->toArray();
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
		

        $this->loadModel('AssetTypes');
        $dbout=$this->AssetTypes->find('all')->toArray();
     
         $fields = array();
		 
				$fields[0] = array("name" =>"Assettypes.id"  , "type" => "num");
				$fields[1] = array("name" =>"Assettypes.name"  , "type" => "char");
				$fields[2] = array("name" =>"Assettypes.description"  , "type" => "char");
				
		
		$this->log($fields);
		$output =$this->Datatable->getView($fields,['Customers'],$usrfiter);
		$out =json_encode($output);  
	   
		$this->response->body($out);
	    return $this->response;
	     
             
	 }


    /**
     * View method
     *
     * @param string|null $id Assettype id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $assettype = $this->Assettypes->get($id, [
            'contain' => ['Trackingobjects']
        ]);

        $this->set('assettype', $assettype);
        $this->set('_serialize', ['assettype']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $assettype = $this->Assettypes->newEntity();
        if ($this->request->is('post')) {
            $assettype = $this->Assettypes->patchEntity($assettype, $this->request->data);
			$assettype['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Assettypes->save($assettype)) {
                $this->Flash->success(__('The assettype has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The assettype could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('assettype'));
        $this->set('_serialize', ['assettype']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Assettype id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $assettype = $this->Assettypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $assettype = $this->Assettypes->patchEntity($assettype, $this->request->data);
			$assettype['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Assettypes->save($assettype)) {
                $this->Flash->success(__('The assettype has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The assettype could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('assettype'));
        $this->set('_serialize', ['assettype']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Assettype id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $assettype = $this->Assettypes->get($id);
        if ($this->Assettypes->delete($assettype)) {
            $this->Flash->success(__('The assettype has been deleted.'));
        } else {
            $this->Flash->error(__('The assettype could not be deleted. Please, try again.'));
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
			    	
					$record = $this->Assettypes->get($value);
					
					 if($record['customer_id']== $this->loggedinuser['customer_id']) {
					 	
						   if ($this->Assettypes->delete($record)) {
					           $sucess= $sucess | true;
					        } else {
					           $failure= $failure | true;
					        }
					}
				}  	  
			}
		   		        
		
				if($sucess){
					$this->Flash->success(__('Selected Assetypes has been deleted.'));
				}
		        if($failure){
					$this->Flash->error(__('The Assetypes could not be deleted. Please, try again.'));
				}
		
		   }

             return $this->redirect(['action' => 'index']);	
     }
}
