<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Triptypes Controller
 *
 * @property \App\Model\Table\TriptypesTable $Triptypes
 * @property \App\Controller\Component\DatatableComponent $Datatable
 */
class TriptypesController extends AppController
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
        $this->paginate = [
            'contain' => ['Customers']
        ];
        $triptypes = $this->paginate($this->Triptypes);

        $this->set(compact('triptypes'));
        $this->set('_serialize', ['triptypes']);*/
       
         $this->loadModel('CreateConfigs');
         $configs=$this->CreateConfigs->find('all')->where(['table_name' => '$currentModelName'])->order(['id' => 'ASC'])->toArray();
        
         $this->set('configs',$configs);	
         $this->set('_serialize', ['configs']);
       
       
    }
    
    
public function ajaxdata() {
        $this->autoRender= false;
      
          
       $this->loadModel('CreateConfigs');
        $dbout=$this->CreateConfigs->find('all')->toArray();
        $fields = array();
        foreach($dbout as $value){
            $fields[] = array("name" => $value['field_name'] , "type" => $value['datatype'] );
			
        }
      
		                           
        $output =$this->Datatable->getView($fields,['Customers']);
        $out =json_encode($output);  
	
		$this->response->body($out);
	    return $this->response;
	     
             
 }  

    /**
     * View method
     *
     * @param string|null $id Triptype id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $triptype = $this->Triptypes->get($id, [
            'contain' => ['Customers', 'Trips']
        ]);

        $this->set('triptype', $triptype);
        $this->set('_serialize', ['triptype']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $triptype = $this->Triptypes->newEntity();
        if ($this->request->is('post')) {
            $triptype = $this->Triptypes->patchEntity($triptype, $this->request->data);
            $triptype['customer_id']=$this->currentuser['customer_id'];
            if ($this->Triptypes->save($triptype)) {
                $this->Flash->success(__('The triptype has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The triptype could not be saved. Please, try again.'));
            }
        }
                
          $customers = $this->Triptypes->Customers->find('list', ['limit' => 200])->where("id=".$this->loggedinuser['customer_id']);
      
        
                $this->set(compact('triptype', 'customers'));
        $this->set('_serialize', ['triptype']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Triptype id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $triptype = $this->Triptypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $triptype = $this->Triptypes->patchEntity($triptype, $this->request->data);
            if ($this->Triptypes->save($triptype)) {
                $this->Flash->success(__('The triptype has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The triptype could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Triptypes->Customers->find('list', ['limit' => 200]);
        $this->set(compact('triptype', 'customers'));
        $this->set('_serialize', ['triptype']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Triptype id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $triptype = $this->Triptypes->get($id);
        if ($this->Triptypes->delete($triptype)) {
            $this->Flash->success(__('The triptype has been deleted.'));
        } else {
            $this->Flash->error(__('The triptype could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
