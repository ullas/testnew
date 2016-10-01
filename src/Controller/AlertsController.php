<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;

/**
 * Alerts Controller
 *
 * @property \App\Model\Table\AlertsTable $Alerts
 */
class AlertsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
    	 $alertcategories = $this->Alerts->Alertcategories->find('list', ['limit' => 200]);
		 $groupsTable = TableRegistry::get('groups');
		 $cid=$this->loggedinuser['customer_id'];
		 $groups = $groupsTable->find('list');
		 $groups->where("id in (select group_id from trackingobjects_groups where customer_id=$cid)");
		 $this->set(compact( 'groups', 'alertcategories'));
        
    }

        
}
