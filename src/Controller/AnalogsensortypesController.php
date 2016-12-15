<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Analogsensortypes Controller
 *
 * @property \App\Model\Table\AnalogsensortypesTable $Analogsensortypes * @property \App\Controller\Component\DatatableComponent $Datatable */
class AnalogsensortypesController extends AppController
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
    	/*
      		    
        */
       
        $this->loadModel('Analogsensortypes');
         $configs=$this->Analogsensortypes->find('all')->toArray();
		 
          
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
		 //$this->set('_serialize', ['configs','usersettings','actions','additional']);
       
       
    }
    
    
public function ajaxdata() {
        	
        $this->autoRender= false;
		$usrfiter="";
		$basic = isset($this->request->query['basic'])?$this->request->query['basic']:"" ;
		$additional = isset($this->request->query['additional'])?$this->request->query['additional']:"";
		$this->loadModel('Analogsensortypes');
        $dbout=$this->Analogsensortypes->find('all')->toArray();
     	$fields = array();
		 
				$fields[0] = array("name" =>"Analogsensortypes.id"  , "type" => "num");
				$fields[1] = array("name" =>"Analogsensortypes.name"  , "type" => "char");
				$fields[2] = array("name" =>"Analogsensortypes.description"  , "type" => "char");
				$fields[3] = array("name" =>"Analogsensortypes.icon"  , "type" => "char");
				$fields[4] = array("name" =>"Analogsensortypes.unit"  , "type" => "char");
				// $fields[5] = array("name" =>"Analogsensortypes.atmessage"  , "type" => "char");
				// $fields[6] = array("name" =>"Analogsensortypes.btmessage"  , "type" => "char");
				// $fields[7] = array("name" =>"Analogsensortypes.irmessage"  , "type" => "char");
				// $fields[8] = array("name" =>"Analogsensortypes.ormessage"  , "type" => "char");
				
		
		$this->log($fields);
		$output =$this->Datatablemaster->getView($fields,['Customers'],$usrfiter);
		$out =json_encode($output);  
	    $this->response->body($out);
	    return $this->response;
             
 }  

    /**
     * View method
     *
     * @param string|null $id Analogsensortype id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $analogsensortype = $this->Analogsensortypes->get($id, [
            'contain' => ['Customers']
        ]);

        $this->set('analogsensortype', $analogsensortype);
        $this->set('_serialize', ['analogsensortype']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $analogsensortype = $this->Analogsensortypes->newEntity();
        if ($this->request->is('post')) {
            $analogsensortype = $this->Analogsensortypes->patchEntity($analogsensortype, $this->request->data);
            $analogsensortype['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Analogsensortypes->save($analogsensortype)) {
              //  $this->Flash->success(__('The analogsensortype has been saved.'));

              //  return $this->redirect(['action' => 'index']);
            } else {
              //  $this->Flash->error(__('The analogsensortype could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Analogsensortypes->Customers->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $this->set(compact('analogsensortype', 'customers'));
        $this->set('_serialize', ['analogsensortype']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Analogsensortype id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $analogsensortype = $this->Analogsensortypes->get($id, [
            'contain' => []
        ]);
		if($analogsensortype['customer_id']!= $this->loggedinuser['customer_id'])
		{
			 $this->Flash->success(__('You are not Authorized.'));
			 return $this->redirect(['action' => 'index']);
			
		}
        if ($this->request->is(['patch', 'post', 'put'])) {
            $analogsensortype = $this->Analogsensortypes->patchEntity($analogsensortype, $this->request->data);
             $analogsensortype['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Analogsensortypes->save($analogsensortype)) {
              //  $this->Flash->success(__('The analogsensortype has been saved.'));

              //  return $this->redirect(['action' => 'index']);
            } else {
              //  $this->Flash->error(__('The analogsensortype could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Analogsensortypes->Customers->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $this->set(compact('analogsensortype', 'customers'));
        $this->set('_serialize', ['analogsensortype']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Analogsensortype id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $analogsensortype = $this->Analogsensortypes->get($id);
        if ($this->Analogsensortypes->delete($analogsensortype)) {
          //  $this->Flash->success(__('The analogsensortype has been deleted.'));
        } else {
           // $this->Flash->error(__('The analogsensortype could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
