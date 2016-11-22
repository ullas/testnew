<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Renewalstypes Controller
 *
 * @property \App\Model\Table\RenewalstypesTable $Renewalstypes
 */
class RenewalstypesController extends AppController
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
       $this->loadModel('Renewalstypes');
       $configs=$this->Renewalstypes->find('all')->toArray();
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
		

        $this->loadModel('Renewalstypes');
        $dbout=$this->Renewalstypes->find('all')->toArray();
     
         $fields = array();
		 
				$fields[0] = array("name" =>"Renewalstypes.id"  , "type" => "num");
				$fields[1] = array("name" =>"Renewalstypes.name"  , "type" => "char");
				$fields[2] = array("name" =>"Renewalstypes.description"  , "type" => "char");
								
		
		$this->log($fields);
		$output =$this->Datatablemaster->getView($fields,['Customers'],$usrfiter);
		$out =json_encode($output);  
	   
		$this->response->body($out);
	    return $this->response;
	}

    /**
     * View method
     *
     * @param string|null $id Renewalstype id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $renewalstype = $this->Renewalstypes->get($id, [
            'contain' => ['Customers', 'Renewalreminders']
        ]);

        $this->set('renewalstype', $renewalstype);
        $this->set('_serialize', ['renewalstype']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $renewalstype = $this->Renewalstypes->newEntity();
        if ($this->request->is('post')) {
            $renewalstype = $this->Renewalstypes->patchEntity($renewalstype, $this->request->data);
			$renewalstype['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Renewalstypes->save($renewalstype)) {
            //    $this->Flash->success(__('The renewalstype has been saved.'));

            //    return $this->redirect(['action' => 'index']);
            } else {
            //    $this->Flash->error(__('The renewalstype could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Renewalstypes->Customers->find('list', ['limit' => 200]);
        $this->set(compact('renewalstype', 'customers'));
        $this->set('_serialize', ['renewalstype']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Renewalstype id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $renewalstype = $this->Renewalstypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $renewalstype = $this->Renewalstypes->patchEntity($renewalstype, $this->request->data);
			$renewalstype['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Renewalstypes->save($renewalstype)) {
            //    $this->Flash->success(__('The renewalstype has been saved.'));

            //    return $this->redirect(['action' => 'index']);
            } else {
            //    $this->Flash->error(__('The renewalstype could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Renewalstypes->Customers->find('list', ['limit' => 200]);
        $this->set(compact('renewalstype', 'customers'));
        $this->set('_serialize', ['renewalstype']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Renewalstype id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        //$this->request->allowMethod(['post', 'delete']);
        $renewalstype = $this->Renewalstypes->get($id);
        if ($this->Renewalstypes->delete($renewalstype)) {
         //   $this->Flash->success(__('The renewalstype has been deleted.'));
        } else {
         //   $this->Flash->error(__('The renewalstype could not be deleted. Please, try again.'));
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
			    	
					$record = $this->Renewalstypes->get($value);
					
					 if($record['customer_id']== $this->loggedinuser['customer_id']) 
					 {
					 	
						   if ($this->Renewalstypes->delete($record)) 
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
					$this->Flash->success(__('Selected Renewalstypes has been deleted.'));
				}
		        if($failure)
		        {
					$this->Flash->error(__('The Renewalstypes could not be deleted. Please, try again.'));
				}
		
		   }

             return $this->redirect(['action' => 'index']);	
     }
}
