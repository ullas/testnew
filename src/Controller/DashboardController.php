<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class DashboardController extends AppController
{


  
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        
		  $tobjTable = TableRegistry::get('Trackingobjects');
		  $vehicleTable = TableRegistry::get('Vehicles');
		  $peopleTable = TableRegistry::get('People');
		  $assetTable = TableRegistry::get('Assets');
		  $query=$tobjTable->find('All')->where(['customer_id'=>$this->loggedinuser['customer_id']]);
		  $totalcount=$query->count();
		  
		  $query=$vehicleTable->find('All')->where(['customer_id'=>$this->loggedinuser['customer_id']]);
		  $vehiclescount=$query->count();
		  
		  $query=$peopleTable->find('All')->where(['customer_id'=>$this->loggedinuser['customer_id']]);
		  $peoplecount=$query->count();
		  $query=$assetTable->find('All')->where(['customer_id'=>$this->loggedinuser['customer_id']]);
		  $assetcount=$query->count();
		  $this->set(compact('totalcount','vehiclescount','peoplecount','assetcount'));
    }
	
	 public function operations()
    {
        
		
    }

    
}
