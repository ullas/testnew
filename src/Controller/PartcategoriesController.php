<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Partcategories Controller
 *
 * @property \App\Model\Table\PartcategoriesTable $Partcategories
 */
class PartcategoriesController extends AppController
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
        $this->loadModel('Partcategories');
       $configs=$this->Partcategories->find('all')->toArray();
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
		

        $this->loadModel('Partcategories');
        $dbout=$this->Partcategories->find('all')->toArray();
     
         $fields = array();
		 
				$fields[0] = array("name" =>"Partcategories.id"  , "type" => "num");
				$fields[1] = array("name" =>"Partcategories.name"  , "type" => "char");
				
				
		
		$this->log($fields);
		$output =$this->Datatablemaster->getView($fields,['Customers'],$usrfiter);
		$out =json_encode($output);  
	   
		$this->response->body($out);
	    return $this->response;
	}
	
    /**
     * View method
     *
     * @param string|null $id Partcategory id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $partcategory = $this->Partcategories->get($id, [
            'contain' => ['Customers', 'Parts']
        ]);

        $this->set('partcategory', $partcategory);
        $this->set('_serialize', ['partcategory']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $partcategory = $this->Partcategories->newEntity();
        if ($this->request->is('post')) {
            $partcategory = $this->Partcategories->patchEntity($partcategory, $this->request->data);
			$partcategory['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Partcategories->save($partcategory)) {
            //    $this->Flash->success(__('The partcategory has been saved.'));

            //    return $this->redirect(['action' => 'index']);
            } else {
            //    $this->Flash->error(__('The partcategory could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Partcategories->Customers->find('list', ['limit' => 200]);
        $this->set(compact('partcategory', 'customers'));
        $this->set('_serialize', ['partcategory']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Partcategory id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $partcategory = $this->Partcategories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $partcategory = $this->Partcategories->patchEntity($partcategory, $this->request->data);
			$partcategory['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Partcategories->save($partcategory)) {
          //      $this->Flash->success(__('The partcategory has been saved.'));

          //      return $this->redirect(['action' => 'index']);
            } else {
          //      $this->Flash->error(__('The partcategory could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Partcategories->Customers->find('list', ['limit' => 200]);
        $this->set(compact('partcategory', 'customers'));
        $this->set('_serialize', ['partcategory']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Partcategory id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
       // $this->request->allowMethod(['post', 'delete']);
        $partcategory = $this->Partcategories->get($id);
        if ($this->Partcategories->delete($partcategory)) {
      //      $this->Flash->success(__('The partcategory has been deleted.'));
        } else {
      //      $this->Flash->error(__('The partcategory could not be deleted. Please, try again.'));
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
			    	
					$record = $this->Partcategories->get($value);
					
					 if($record['customer_id']== $this->loggedinuser['customer_id']) 
					 {
					 	
						   if ($this->Partcategories->delete($record)) 
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
					$this->Flash->success(__('Selected Partcategories has been deleted.'));
				}
		        if($failure)
		        {
					$this->Flash->error(__('The Partcategories could not be deleted. Please, try again.'));
				}
		
		   }

             return $this->redirect(['action' => 'index']);	
     }
}
