<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Digitalsensortypes Controller
 *
 * @property \App\Model\Table\DigitalsensortypesTable $Digitalsensortypes * @property \App\Controller\Component\DatatableComponent $Datatable */
class DigitalsensortypesController extends AppController
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
       
         $this->loadModel('Digitalsensortypes');
         $configs=$this->Digitalsensortypes->find('all')->toArray();
		 
          
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
		$this->loadModel('Digitalsensortypes');
        $dbout=$this->Digitalsensortypes->find('all')->toArray();
     	$fields = array();
		 
				$fields[0] = array("name" =>"Digitalsensortypes.id"  , "type" => "num");
				$fields[1] = array("name" =>"Digitalsensortypes.name"  , "type" => "char");
				$fields[2] = array("name" =>"Digitalsensortypes.description"  , "type" => "char");
				$fields[3] = array("name" =>"Digitalsensortypes.icon"  , "type" => "char");
				//$fields[4] = array("name" =>"Digitalsensortypes.unit"  , "type" => "char");
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
     * @param string|null $id Digitalsensortype id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $digitalsensortype = $this->Digitalsensortypes->get($id, [
            'contain' => ['Customers']
        ]);

        $this->set('digitalsensortype', $digitalsensortype);
        $this->set('_serialize', ['digitalsensortype']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $digitalsensortype = $this->Digitalsensortypes->newEntity();
        if ($this->request->is('post')) {
            $digitalsensortype = $this->Digitalsensortypes->patchEntity($digitalsensortype, $this->request->data);
            $digitalsensortype['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Digitalsensortypes->save($digitalsensortype)) {
              //  $this->Flash->success(__('The digitalsensortype has been saved.'));

              //  return $this->redirect(['action' => 'index']);
            } else {
             //   $this->Flash->error(__('The digitalsensortype could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Digitalsensortypes->Customers->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $this->set(compact('digitalsensortype', 'customers'));
        $this->set('_serialize', ['digitalsensortype']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Digitalsensortype id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $digitalsensortype = $this->Digitalsensortypes->get($id, [
            'contain' => []
        ]);
		if($digitalsensortype['customer_id']!= $this->loggedinuser['customer_id'])
		{
			 $this->Flash->success(__('You are not Authorized.'));
			 return $this->redirect(['action' => 'index']);
			
		}
        if ($this->request->is(['patch', 'post', 'put'])) {
            $digitalsensortype = $this->Digitalsensortypes->patchEntity($digitalsensortype, $this->request->data);
             $digitalsensortype['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Digitalsensortypes->save($digitalsensortype)) {
              //  $this->Flash->success(__('The digitalsensortype has been saved.'));

              //  return $this->redirect(['action' => 'index']);
            } else {
              //  $this->Flash->error(__('The digitalsensortype could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Digitalsensortypes->Customers->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $this->set(compact('digitalsensortype', 'customers'));
        $this->set('_serialize', ['digitalsensortype']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Digitalsensortype id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $digitalsensortype = $this->Digitalsensortypes->get($id);
        if ($this->Digitalsensortypes->delete($digitalsensortype)) {
           // $this->Flash->success(__('The digitalsensortype has been deleted.'));
        } else {
            //$this->Flash->error(__('The digitalsensortype could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
