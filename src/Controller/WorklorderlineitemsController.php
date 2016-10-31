<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Worklorderlineitems Controller
 *
 * @property \App\Model\Table\WorklorderlineitemsTable $Worklorderlineitems
 * @property \App\Controller\Component\DatatableComponent $Datatable
 */
class WorklorderlineitemsController extends AppController
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
    	/*
      		    
        */
       
         $this->loadModel('CreateConfigs');
         $configs=$this->CreateConfigs->find('all')->where(['table_name' => 'Worklorderlineitems'])->order(['id' => 'ASC'])->toArray();
        
         $this->set('configs',$configs);	
         $this->set('_serialize', ['configs']);
         
         
         
         $this->loadModel('CreateConfigs');
         $configs=$this->CreateConfigs->find('all')->where(['table_name' => 'Worklorderlineitems'])->order(['"order"' => 'ASC'])->toArray();
		 $this->loadModel('Usersettings');
		 $usersettings=$this->Usersettings->find('all')->where(['user_id' => $this->loggedinuser['id']])->where(['module' => 'Workorders'])->where(['key' => 'INIT_VISIBLE_COLUMNS_Worklorderlineitems'])->toArray();
         if(isset($usersettings[0]['value'])){
         	$this->set('usersettings',$usersettings);	
			
         }else{
         	
         	$this->loadModel('Globalusersettings');
		    $usersettings=$this->Globalusersettings->find('all')->where(['module' => 'Workorders'])->where(['key' => 'INIT_VISIBLE_COLUMNS_WORKORDERS'])->toArray();
            $this->set('usersettings',$usersettings);
			
         }
		 $actions =[
                ['name'=>'assign','title'=>'Assign','class'=>'label-success'],
                ['name'=>'unassign','title'=>'Unassign','class'=>'label-warning'],
                ['name'=>'close','title'=>'Close','class'=>' label-danger ']
                ];
         $additional= [
      	                          'basic'=>['Open','OverDue','Resolved','Closed'],
      	                          'additional'=>[
      	                                ['name'=>'issueddate','title'=>'Issued Date'],
      	                                ['name'=>'startdate','title' =>'Start Date'],
      	                                ['name'=>'completiondate','title'=>'Completion Date']   	                          
      	                          ]];
		 $this->set('additional',$additional);
		 $this->set('actions',$actions);	
         $this->set('configs',$configs);	
         $this->set('_serialize', ['configs','usersettings','actions','additional']);
       
       
    }
    
    
public function ajaxdata() {
        $this->autoRender= false;
      
          
       $this->loadModel('CreateConfigs');
       $dbout=$this->CreateConfigs->find('all')->where(['table_name' => 'Worklorderlineitems'])->order(['id' => 'ASC'])->toArray();
        
        $fields = array();
        foreach($dbout as $value){
            $fields[] = array("name" => $value['field_name'] , "type" => $value['datatype'] );
			
        }
      
		                           
        $output =$this->Datatable->getView($fields,['Workorders', 'Workordertypes', 'Customers']);
        $out =json_encode($output);  
	
		$this->response->body($out);
	    return $this->response;
	     
             
 }  

    /**
     * View method
     *
     * @param string|null $id Worklorderlineitem id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $worklorderlineitem = $this->Worklorderlineitems->get($id, [
            'contain' => ['Workorders', 'Workordertypes', 'Customers']
        ]);

        $this->set('worklorderlineitem', $worklorderlineitem);
        $this->set('_serialize', ['worklorderlineitem']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $worklorderlineitem = $this->Worklorderlineitems->newEntity();
        if ($this->request->is('post')) {
            $worklorderlineitem = $this->Worklorderlineitems->patchEntity($worklorderlineitem, $this->request->data);
            $worklorderlineitem['customer_id']=$this->currentuser['customer_id'];
            if ($this->Worklorderlineitems->save($worklorderlineitem)) {
                $this->Flash->success(__('The worklorderlineitem has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The worklorderlineitem could not be saved. Please, try again.'));
            }
        }
        
        $workorders = $this->Worklorderlineitems->Workorders->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id'])->where("customer_id=0");
        
                
        $workordertypes = $this->Worklorderlineitems->Workordertypes->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id'])->where("customer_id=0");
        
                        
          $customers = $this->Worklorderlineitems->Customers->find('list', ['limit' => 200])->where("id=".$this->loggedinuser['customer_id']);
      
        
                $this->set(compact('worklorderlineitem', 'workorders', 'workordertypes', 'customers'));
        $this->set('_serialize', ['worklorderlineitem']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Worklorderlineitem id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $worklorderlineitem = $this->Worklorderlineitems->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $worklorderlineitem = $this->Worklorderlineitems->patchEntity($worklorderlineitem, $this->request->data);
             $worklorderlineitem['customer_id']=$this->currentuser['customer_id'];
            if ($this->Worklorderlineitems->save($worklorderlineitem)) {
                $this->Flash->success(__('The worklorderlineitem has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The worklorderlineitem could not be saved. Please, try again.'));
            }
        }
        $workorders = $this->Worklorderlineitems->Workorders->find('list', ['limit' => 200]);
        $workordertypes = $this->Worklorderlineitems->Workordertypes->find('list', ['limit' => 200]);
        $customers = $this->Worklorderlineitems->Customers->find('list', ['limit' => 200]);
        $this->set(compact('worklorderlineitem', 'workorders', 'workordertypes', 'customers'));
        $this->set('_serialize', ['worklorderlineitem']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Worklorderlineitem id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $worklorderlineitem = $this->Worklorderlineitems->get($id);
        if ($this->Worklorderlineitems->delete($worklorderlineitem)) {
            $this->Flash->success(__('The worklorderlineitem has been deleted.'));
        } else {
            $this->Flash->error(__('The worklorderlineitem could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
