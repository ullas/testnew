<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * IssuesAddresses Controller
 *
 * @property \App\Model\Table\IssuesAddressesTable $IssuesAddresses
 * @property \App\Controller\Component\DatatableComponent $Datatable
 */
class IssuesAddressesController extends AppController
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
       $this->loadModel('IssuesAddresses');
       $configs=$this->IssuesAddresses->find('all')->toArray();
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
		

        $this->loadModel('IssuesAddresses');
        $dbout=$this->IssuesAddresses->find('all')->toArray();
     
         $fields = array();
		 
				$fields[0] = array("name" =>"IssuesAddresses.id"  , "type" => "num");
				$fields[1] = array("name" =>"IssuesAddresses.name"  , "type" => "char");
				$fields[2] = array("name" =>"IssuesAddresses.address_id"  , "type" => "char");
								
		
		$this->log($fields);
		$output =$this->Datatable->getView($fields,['Customers'],$usrfiter);
		$out =json_encode($output);  
	   
		$this->response->body($out);
	    return $this->response;
	}
    

    /**
     * View method
     *
     * @param string|null $id Issues Address id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $issuesAddress = $this->IssuesAddresses->get($id, [
            'contain' => ['Issues', 'Addresses']
        ]);

        $this->set('issuesAddress', $issuesAddress);
        $this->set('_serialize', ['issuesAddress']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $issuesAddress = $this->IssuesAddresses->newEntity();
        if ($this->request->is('post')) {
            $issuesAddress = $this->IssuesAddresses->patchEntity($issuesAddress, $this->request->data);
			$issuesAddress['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->IssuesAddresses->save($issuesAddress)) {
                $this->Flash->success(__('The issues address has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The issues address could not be saved. Please, try again.'));
            }
        }
        
        $issues = $this->IssuesAddresses->Issues->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id']);
        
                
        $addresses = $this->IssuesAddresses->Addresses->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id']);
        
                $this->set(compact('issuesAddress', 'issues', 'addresses'));
        $this->set('_serialize', ['issuesAddress']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Issues Address id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $issuesAddress = $this->IssuesAddresses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $issuesAddress = $this->IssuesAddresses->patchEntity($issuesAddress, $this->request->data);
             $issuesAddress['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->IssuesAddresses->save($issuesAddress)) {
                $this->Flash->success(__('The issues address has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The issues address could not be saved. Please, try again.'));
            }
        }
        $issues = $this->IssuesAddresses->Issues->find('list', ['limit' => 200]);
        $addresses = $this->IssuesAddresses->Addresses->find('list', ['limit' => 200]);
        $this->set(compact('issuesAddress', 'issues', 'addresses'));
        $this->set('_serialize', ['issuesAddress']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Issues Address id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $issuesAddress = $this->IssuesAddresses->get($id);
        if ($this->IssuesAddresses->delete($issuesAddress)) {
            $this->Flash->success(__('The issues address has been deleted.'));
        } else {
            $this->Flash->error(__('The issues address could not be deleted. Please, try again.'));
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
			    	
					$record = $this->IssuesAddresses->get($value);
					
					 if($record['customer_id']== $this->loggedinuser['customer_id']) 
					 {
					 	
						   if ($this->IssuesAddresses->delete($record)) 
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
					$this->Flash->success(__('Selected IssuesAddresses has been deleted.'));
				}
		        if($failure)
		        {
					$this->Flash->error(__('The IssuesAddresses could not be deleted. Please, try again.'));
				}
		
		   }

             return $this->redirect(['action' => 'index']);	
     }
}
