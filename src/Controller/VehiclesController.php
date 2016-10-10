<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Utility\Inflector;


/**
 * Vehicles Controller
 *
 * @property \App\Model\Table\VehiclesTable $Vehicles
 */
class VehiclesController extends AppController
{
	 var $components = array('Datatable');

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
     
    public function ajaxData() {
        $this->autoRender= false;
      
          
        $this->loadModel('CreateConfigs');
        $dbout=$this->CreateConfigs->find('all')->where(['table_name' => 'Vehicles'])->order(['id' => 'ASC'])->toArray();
        $fields = array();
        foreach($dbout as $value){
            $fields[] = array("name" => $value['field_name'] , "type" => $value['datatype'] );
			
        }
      
		                             
        $output =$this->Datatable->getView($fields,['Vehicletypes']);
        $out =json_encode($output);  
	
		$this->response->body($out);
	    return $this->response;
	     
             
    }  
     
    public function index()
    {
       /* $this->paginate = [
            'contain' => ['Vehicletypes', 'Vehiclestatuses', 'Ownerships', 'Symbols', 'Driverdetectionmodes', 'Stations', 'Departments', 'Trackingobjects', 'Purposes', 'Transporters', 'Activedrivers']
        ];
        $vehicles = $this->paginate($this->Vehicles);

        $this->set(compact('vehicles'));
        $this->set('_serialize', ['vehicles']);*/
        
         $this->loadModel('CreateConfigs');
         $configs=$this->CreateConfigs->find('all')->where(['table_name' => 'Vehicles'])->order(['id' => 'ASC'])->toArray();
        
         $this->set('configs',$configs);	
         $this->set('_serialize', ['configs']);
    }

    /**
     * View method
     *
     * @param string|null $id Vehicle id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $vehicle = $this->Vehicles->get($id, [
            'contain' => ['Vehicletypes', 'Vehiclestatuses', 'Ownerships', 'Symbols', 'Driverdetectionmodes', 'Stations', 'Departments', 'Trackingobjects', 'Purposes', 'Transporters', 'Activedrivers', 'Drivers', 'Fuelentries', 'Issues', 'Servicesentries', 'Trips', 'Vehicleengines', 'Vehiclefluids',  'Vehiclepurchases', 'Vehiclespecifications', 'Vehiclewheelstyres', 'Workorders']
        ]);

        $this->set('vehicle', $vehicle);
        $this->set('_serialize', ['vehicle']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $vehicle = $this->Vehicles->newEntity();
        if ($this->request->is('post')) {
            $vehicle = $this->Vehicles->patchEntity($vehicle, $this->request->data);
            $vehicle['customer_id']=$this->currentuser['customer_id'];
			$trobjTable = TableRegistry::get('Trackingobjects');
			$trobj=$trobjTable->newEntity();
			
			
			 $trobj->name=$vehicle->name;
			 $trobjTable->save($trobj);
				
			 $vehicle['trackingobject_id']=$trobj->id;
			
			
            if ($this->Vehicles->save($vehicle)) {
                $this->Flash->success(__('The vehicle has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The vehicle could not be saved. Please, try again.'));
            }
        }
        $vehicletypes = $this->Vehicles->Vehicletypes->find('list', ['limit' => 200]);
        $vehiclestatuses = $this->Vehicles->Vehiclestatuses->find('list', ['limit' => 200]);
        $ownerships = $this->Vehicles->Ownerships->find('list', ['limit' => 200]);
        $symbols = $this->Vehicles->Symbols->find('list', ['limit' => 200]);
        $driverdetectionmodes = $this->Vehicles->Driverdetectionmodes->find('list', ['limit' => 200]);
        $stations = $this->Vehicles->Stations->find('list', ['limit' => 200]);
        $departments = $this->Vehicles->Departments->find('list', ['limit' => 200]);
        $trackingobjects = $this->Vehicles->Trackingobjects->find('list', ['limit' => 200]);
        $purposes = $this->Vehicles->Purposes->find('list', ['limit' => 200]);
        $transporters = $this->Vehicles->Transporters->find('list', ['limit' => 200]);
        $activedrivers = $this->Vehicles->Activedrivers->find('list', ['limit' => 200]);
        $drivers = $this->Vehicles->Drivers->find('list', ['limit' => 200]);
        $this->set(compact('vehicle', 'vehicletypes', 'vehiclestatuses', 'ownerships', 'symbols', 'driverdetectionmodes', 'stations', 'departments', 'trackingobjects', 'purposes', 'transporters', 'activedrivers', 'drivers'));
        $this->set('_serialize', ['vehicle']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Vehicle id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $trobjTable = TableRegistry::get('Trackingobjects');	
        $vehicle = $this->Vehicles->get($id, [
            'contain' => ['Drivers']
        ]);
		$trobj=$trobjTable->get($vehicle->trackingobject_id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $vehicle = $this->Vehicles->patchEntity($vehicle, $this->request->data);
			$trobj->name=$vehicle->name;
		    $trobjTable->save($trobj);
            if ($this->Vehicles->save($vehicle)) {
                $this->Flash->success(__('The vehicle has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The vehicle could not be saved. Please, try again.'));
            }
        }
        $vehicletypes = $this->Vehicles->Vehicletypes->find('list', ['limit' => 200]);
        $vehiclestatuses = $this->Vehicles->Vehiclestatuses->find('list', ['limit' => 200]);
        $ownerships = $this->Vehicles->Ownerships->find('list', ['limit' => 200]);
        $symbols = $this->Vehicles->Symbols->find('list', ['limit' => 200]);
        $driverdetectionmodes = $this->Vehicles->Driverdetectionmodes->find('list', ['limit' => 200]);
        $stations = $this->Vehicles->Stations->find('list', ['limit' => 200]);
        $departments = $this->Vehicles->Departments->find('list', ['limit' => 200]);
        $trackingobjects = $this->Vehicles->Trackingobjects->find('list', ['limit' => 200]);
        $purposes = $this->Vehicles->Purposes->find('list', ['limit' => 200]);
        $transporters = $this->Vehicles->Transporters->find('list', ['limit' => 200]);
        $activedrivers = $this->Vehicles->Activedrivers->find('list', ['limit' => 200]);
        $drivers = $this->Vehicles->Drivers->find('list', ['limit' => 200]);
        $this->set(compact('vehicle', 'vehicletypes', 'vehiclestatuses', 'ownerships', 'symbols', 'driverdetectionmodes', 'stations', 'departments', 'trackingobjects', 'purposes', 'transporters', 'activedrivers', 'drivers'));
        $this->set('_serialize', ['vehicle']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Vehicle id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $vehicle = $this->Vehicles->get($id);
        if ($this->Vehicles->delete($vehicle)) {
            $this->Flash->success(__('The vehicle has been deleted.'));
        } else {
            $this->Flash->error(__('The vehicle could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
