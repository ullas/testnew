<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Providers Controller
 *
 * @property \App\Model\Table\ProvidersTable $Providers
 */
class ProvidersController extends AppController
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
       $this->loadModel('Providers');
       $configs=$this->Providers->find('all')->toArray();
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
		

        $this->loadModel('Providers');
        $dbout=$this->Providers->find('all')->toArray();
     
         $fields = array();
		 
				$fields[0] = array("name" =>"Providers.id"  , "type" => "num");
				$fields[1] = array("name" =>"Providers.name"  , "type" => "char");
				$fields[2] = array("name" =>"Providers.description"  , "type" => "char");
				$fields[3] = array("name" =>"Providers.modelno"  , "type" => "char");
				$fields[4] = array("name" =>"Providers.osver"  , "type" => "char");
				
				
		
		$this->log($fields);
		$output =$this->Datatable->getView($fields,['Customers'],$usrfiter);
		$out =json_encode($output);  
	   
		$this->response->body($out);
	    return $this->response;
	}
	
    /**
     * View method
     *
     * @param string|null $id Provider id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $provider = $this->Providers->get($id, [
            'contain' => ['Customers', 'Devices']
        ]);

        $this->set('provider', $provider);
        $this->set('_serialize', ['provider']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $provider = $this->Providers->newEntity();
        if ($this->request->is('post')) {
            $provider = $this->Providers->patchEntity($provider, $this->request->data);
			$provider['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Providers->save($provider)) {
                $this->Flash->success(__('The provider has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The provider could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Providers->Customers->find('list', ['limit' => 200]);
        $this->set(compact('provider', 'customers'));
        $this->set('_serialize', ['provider']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Provider id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $provider = $this->Providers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $provider = $this->Providers->patchEntity($provider, $this->request->data);
			$provider['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Providers->save($provider)) {
                $this->Flash->success(__('The provider has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The provider could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Providers->Customers->find('list', ['limit' => 200]);
        $this->set(compact('provider', 'customers'));
        $this->set('_serialize', ['provider']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Provider id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $provider = $this->Providers->get($id);
        if ($this->Providers->delete($provider)) {
            $this->Flash->success(__('The provider has been deleted.'));
        } else {
            $this->Flash->error(__('The provider could not be deleted. Please, try again.'));
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
			    	
					$record = $this->Providers->get($value);
					
					 if($record['customer_id']== $this->loggedinuser['customer_id']) 
					 {
					 	
						   if ($this->Providers->delete($record)) 
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
					$this->Flash->success(__('Selected Providers has been deleted.'));
				}
		        if($failure)
		        {
					$this->Flash->error(__('The Providers could not be deleted. Please, try again.'));
				}
		
		   }

             return $this->redirect(['action' => 'index']);	
     }
	
}
