<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Vehiclecategories Controller
 *
 * @property \App\Model\Table\VehiclecategoriesTable $Vehiclecategories
 */
class VehiclecategoriesController extends AppController
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
       $this->loadModel('Vehiclecategories');
       $configs=$this->Vehiclecategories->find('all')->toArray();
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
		

        $this->loadModel('Vehiclecategories');
        $dbout=$this->Vehiclecategories->find('all')->toArray();
     
         $fields = array();
		 
				$fields[0] = array("name" =>"Vehiclecategories.id"  , "type" => "num");
				$fields[1] = array("name" =>"Vehiclecategories.name"  , "type" => "char");
				$fields[2] = array("name" =>"Vehiclecategories.description"  , "type" => "char");
								
		
		$this->log($fields);
		$output =$this->Datatablemaster->getView($fields,['Customers'],$usrfiter);
		$out =json_encode($output);  
	   
		$this->response->body($out);
	    return $this->response;
	}

    /**
     * View method
     *
     * @param string|null $id Vehiclecategory id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $vehiclecategory = $this->Vehiclecategories->get($id, [
            'contain' => ['Customers', 'Trips']
        ]);

        $this->set('vehiclecategory', $vehiclecategory);
        $this->set('_serialize', ['vehiclecategory']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $vehiclecategory = $this->Vehiclecategories->newEntity();
        if ($this->request->is('post')) {
            $vehiclecategory = $this->Vehiclecategories->patchEntity($vehiclecategory, $this->request->data);
			$vehiclecategory['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Vehiclecategories->save($vehiclecategory)) {
            //    $this->Flash->success(__('The vehiclecategory has been saved.'));

            //    return $this->redirect(['action' => 'index']);
            } else {
            //    $this->Flash->error(__('The vehiclecategory could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Vehiclecategories->Customers->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $this->set(compact('vehiclecategory', 'customers'));
        $this->set('_serialize', ['vehiclecategory']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Vehiclecategory id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $vehiclecategory = $this->Vehiclecategories->get($id, [
            'contain' => []
        ]);
		if($vehiclecategory['customer_id']!= $this->loggedinuser['customer_id'])
		{
			 $this->Flash->success(__('You are not Authorized.'));
			 return $this->redirect(['action' => 'index']);
			
		}
        if ($this->request->is(['patch', 'post', 'put'])) {
            $vehiclecategory = $this->Vehiclecategories->patchEntity($vehiclecategory, $this->request->data);
			$vehiclecategory['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Vehiclecategories->save($vehiclecategory)) {
            //    $this->Flash->success(__('The vehiclecategory has been saved.'));

            //    return $this->redirect(['action' => 'index']);
            } else {
            //    $this->Flash->error(__('The vehiclecategory could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Vehiclecategories->Customers->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $this->set(compact('vehiclecategory', 'customers'));
        $this->set('_serialize', ['vehiclecategory']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Vehiclecategory id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
       // $this->request->allowMethod(['post', 'delete']);
        $vehiclecategory = $this->Vehiclecategories->get($id);
		if($vehiclecategory['customer_id'] = $this->loggedinuser['customer_id'])
	    {
		        if ($this->Vehiclecategories->delete($vehiclecategory)) {
		       //     $this->Flash->success(__('The vehiclecategory has been deleted.'));
		        } else {
		       //     $this->Flash->error(__('The vehiclecategory could not be deleted. Please, try again.'));
		        }
		}
		 else
		 {
	   	    $this->Flash->error(__('You are not authorized'));
		
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
			    	
					$record = $this->Vehiclecategories->get($value);
					
					 if($record['customer_id']== $this->loggedinuser['customer_id']) 
					 {
					 	
						   if ($this->Vehiclecategories->delete($record)) 
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
					$this->Flash->success(__('Selected Vehiclecategories has been deleted.'));
				}
		        if($failure)
		        {
					$this->Flash->error(__('The Vehiclecategories could not be deleted. Please, try again.'));
				}
		
		   }

             return $this->redirect(['action' => 'index']);	
     }
}
