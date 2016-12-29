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
class TripmonitorController extends AppController
{


  
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->loadModel('Trips');
		$trips = $this->Trips->getTripmondata( $this->loggedinuser['id']);
		//$this->log($trips );
		 $this->set('trips',$trips);
		// $this->set('lastid',-1);
			
         $this->set('_serialize', ['trips']);
    }
	
	 public function operations()
    {
        
		
    }

    
}