<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Simproviders Controller
 *
 * @property \App\Model\Table\SimprovidersTable $Simproviders 
 * @property \App\Controller\Component\DatatableComponent $Datatable */
class SimprovidersController extends AppController
{

    /**
     * Components     *
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
    	 $this->loadModel('Simproviders');
         $configs=$this->Simproviders->find('all')->toArray();
		 
          
		 $actions =[
             
                ['name'=>'delete','title'=>'Delete','class'=>' label-danger ']
                ];
         $additional= [
      	                          'basic'=>['All'],
      	                          'additional'=>[
      	                                	                          
      	                          ]];
		$this->set('additional',$additional);
		 $this->set('actions',$actions);	
         $this->set('configs',$configs);	
         $this->set('_serialize', ['configs','actions']);
       
       
    }
    
    
public function ajaxdata() {
        $this->autoRender= false;
		$usrfiter="";
		$basic = isset($this->request->query['basic'])?$this->request->query['basic']:"" ;
		$additional = isset($this->request->query['additional'])?$this->request->query['additional']:"";
		
		

        $this->loadModel('Simproviders');
        $dbout=$this->Simproviders->find('all')->toArray();
     
         $fields = array();
		 
				$fields[0] = array("name" =>"Simproviders.id"  , "type" => "num");
				$fields[1] = array("name" =>"Simproviders.name"  , "type" => "char");
				$fields[2] = array("name" =>"Simproviders.billdateofmonth"  , "type" => "num");
				$fields[3] = array("name" =>"Simproviders.duedateofmonth"  , "type" => "num");
				$fields[4] = array("name" =>"Simproviders.lastdatefineofmonth"  , "type" => "num");
				$fields[5] = array("name" =>"Simproviders.description"  , "type" => "char");
				
		
		$this->log($fields);
		$output =$this->Datatablemaster->getView($fields,['Customers'],$usrfiter);
		$out =json_encode($output);  
	   
		$this->response->body($out);
	    return $this->response;
	     
             
 }  

    /**
     * View method
     *
     * @param string|null $id Simprovider id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $simprovider = $this->Simproviders->get($id, [
            'contain' => ['Customers', 'Simcards']
        ]);

        $this->set('simprovider', $simprovider);
        $this->set('_serialize', ['simprovider']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
       $simprovider = $this->Simproviders->newEntity();
        if ($this->request->is('post')) {
            $simprovider = $this->Simproviders->patchEntity($simprovider, $this->request->data);
			$simprovider['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Simproviders->save($simprovider)) {
             //   $this->Flash->success(__('The contractor has been saved.'));

           //     return $this->redirect(['action' => 'index']);
            } else {
            //    $this->Flash->error(__('The contractor could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Simproviders->Customers->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $this->set(compact('simprovider', 'customers'));
        $this->set('_serialize', ['contractor']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Simprovider id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
       $simprovider = $this->Simproviders->get($id, [
            'contain' => []
        ]);
		if($simprovider['customer_id']!= $this->loggedinuser['customer_id'])
		{
			 $this->Flash->success(__('You are not Authorized.'));
			 return $this->redirect(['action' => 'index']);
			
		}
        if ($this->request->is(['patch', 'post', 'put'])) {
            $simprovider = $this->Simproviders->patchEntity($simprovider, $this->request->data);
			$simprovider['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Simproviders->save($simprovider)) {
            //    $this->Flash->success(__('The contractor has been saved.'));

            //    return $this->redirect(['action' => 'index']);
            } else {
            //    $this->Flash->error(__('The contractor could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Simproviders->Customers->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $this->set(compact('simprovider', 'customers'));
        $this->set('_serialize', ['contractor']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Simprovider id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $simprovider = $this->Simproviders->get($id);
        if ($this->Simproviders->delete($simprovider)) {
      //      $this->Flash->success(__('The simprovider has been deleted.'));
        } else {
       //     $this->Flash->error(__('The simprovider could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
