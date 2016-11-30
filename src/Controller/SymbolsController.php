<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Symbols Controller
 *
 * @property \App\Model\Table\SymbolsTable $Symbols
 */
class SymbolsController extends AppController
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
       $this->loadModel('Symbols');
       $configs=$this->Symbols->find('all')->toArray();
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
		

        $this->loadModel('Symbols');
        $dbout=$this->Symbols->find('all')->toArray();
     
         $fields = array();
		 
		$fields[0] = array("name" =>"id"  , "type" => "num");
		$fields[1] = array("name" =>"name"  , "type" => "char");
		$fields[2] = array("name" =>"symbol"  , "type" => "char");		
		$fields[3] = array("name" =>"description"  , "type" => "char");	
				
								
		
		$this->log($fields);
		$output =$this->Datatablemaster->getView($fields,['Customers', 'Vehicles'],$usrfiter);
		$out =json_encode($output);  
	   
		$this->response->body($out);
	    return $this->response;
	}

    /**
     * View method
     *
     * @param string|null $id Symbol id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $symbol = $this->Symbols->get($id, [
            'contain' => ['Customers', 'Vehicles']
        ]);

        $this->set('symbol', $symbol);
        $this->set('_serialize', ['symbol']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $symbol = $this->Symbols->newEntity();
        if ($this->request->is('post')) {
            $symbol = $this->Symbols->patchEntity($symbol, $this->request->data);
			$symbol['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Symbols->save($symbol)) {
             //   $this->Flash->success(__('The symbol has been saved.'));

             //   return $this->redirect(['action' => 'index']);
            } else {
             //   $this->Flash->error(__('The symbol could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Symbols->Customers->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $this->set(compact('symbol', 'customers'));
        $this->set('_serialize', ['symbol']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Symbol id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $symbol = $this->Symbols->get($id, [
            'contain' => []
        ]);
		if($symbol['customer_id']!= $this->loggedinuser['customer_id'])
		{
			 $this->Flash->success(__('You are not Authorized.'));
			 return $this->redirect(['action' => 'index']);
			
		}
        if ($this->request->is(['patch', 'post', 'put'])) {
            $symbol = $this->Symbols->patchEntity($symbol, $this->request->data);
			$symbol['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Symbols->save($symbol)) {
            //    $this->Flash->success(__('The symbol has been saved.'));

            //    return $this->redirect(['action' => 'index']);
            } else {
             //   $this->Flash->error(__('The symbol could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Symbols->Customers->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $this->set(compact('symbol', 'customers'));
        $this->set('_serialize', ['symbol']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Symbol id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        //$this->request->allowMethod(['post', 'delete']);
        $symbol = $this->Symbols->get($id);
		if($symbol['customer_id'] = $this->loggedinuser['customer_id'])
	    {
		        if ($this->Symbols->delete($symbol)) {
		         //   $this->Flash->success(__('The symbol has been deleted.'));
		        } else {
		        //    $this->Flash->error(__('The symbol could not be deleted. Please, try again.'));
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
			    	
					$record = $this->Symbols->get($value);
					
					 if($record['customer_id']== $this->loggedinuser['customer_id']) 
					 {
					 	
						   if ($this->Symbols->delete($record)) 
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
					$this->Flash->success(__('Selected Symbols has been deleted.'));
				}
		        if($failure)
		        {
					$this->Flash->error(__('The Symbols could not be deleted. Please, try again.'));
				}
		
		   }

             return $this->redirect(['action' => 'index']);	
     }
}
