<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Currencies Controller
 *
 * @property \App\Model\Table\CurrenciesTable $Currencies
 */
class CurrenciesController extends AppController
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
       $this->loadModel('Currencies');
       $configs=$this->Currencies->find('all')->toArray();
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
		 
				$fields[0] = array("name" =>"Currencies.id"  , "type" => "num");
				$fields[1] = array("name" =>"Currencies.name"  , "type" => "char");
				$fields[2] = array("name" =>"Currencies.abbrev"  , "type" => "char");
				$fields[3] = array("name" =>"Currencies.symbol"  , "type" => "char");
				$fields[4] = array("name" =>"Currencies.description"  , "type" => "char");
		
		$this->log($fields);
		$output =$this->Datatablemaster->getView($fields,['Customers'],$usrfiter);
		$out =json_encode($output);  
	   
		$this->response->body($out);
	    return $this->response;
	     
             
	 }
	
    /**
     * View method
     *
     * @param string|null $id Currency id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $currency = $this->Currencies->get($id, [
            'contain' => ['Vehiclepurchases']
        ]);

        $this->set('currency', $currency);
        $this->set('_serialize', ['currency']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $currency = $this->Currencies->newEntity();
        if ($this->request->is('post')) {
            $currency = $this->Currencies->patchEntity($currency, $this->request->data);
            if ($this->Currencies->save($currency)) {
         //       $this->Flash->success(__('The currency has been saved.'));

         //       return $this->redirect(['action' => 'index']);
            } else {
          //      $this->Flash->error(__('The currency could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('currency'));
        $this->set('_serialize', ['currency']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Currency id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $currency = $this->Currencies->get($id, [
            'contain' => []
        ]);
		if($currency['customer_id']!= $this->loggedinuser['customer_id'])
		{
			 $this->Flash->success(__('You are not Authorized.'));
			 return $this->redirect(['action' => 'index']);
			
		}
        if ($this->request->is(['patch', 'post', 'put'])) {
            $currency = $this->Currencies->patchEntity($currency, $this->request->data);
            if ($this->Currencies->save($currency)) {
        //        $this->Flash->success(__('The currency has been saved.'));

        //        return $this->redirect(['action' => 'index']);
            } else {
        //        $this->Flash->error(__('The currency could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('currency'));
        $this->set('_serialize', ['currency']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Currency id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
       // $this->request->allowMethod(['post', 'delete']);
        $currency = $this->Currencies->get($id);
		 if($currency['customer_id'] = $this->loggedinuser['customer_id'])
		 {
		        if ($this->Currencies->delete($currency)) {
		       //     $this->Flash->success(__('The currency has been deleted.'));
		        } else {
		       //     $this->Flash->error(__('The currency could not be deleted. Please, try again.'));
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
			    	
					$record = $this->Currencies->get($value);
					
					 if($record['customer_id']== $this->loggedinuser['customer_id']) {
					 	
						   if ($this->Currencies->delete($record)) {
					           $sucess= $sucess | true;
					        } else {
					           $failure= $failure | true;
					        }
					}
				}  	  
			}
		   		        
		
				if($sucess){
					$this->Flash->success(__('Selected Currencies has been deleted.'));
				}
		        if($failure){
					$this->Flash->error(__('The Currencies could not be deleted. Please, try again.'));
				}
		
		   }

             return $this->redirect(['action' => 'index']);	
     }
}
