<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Core\Configure;
use Cake\ORM\TableRegistry;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
 
    protected $loggedinuser;
	protected $customer;

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
		 $this->loadComponent('Auth', [
        'authorize' => ['Controller'], // Added this line
        'loginRedirect' => [
            'controller' => 'Dashboard',
            'action' => 'index'
        ],
        'logoutRedirect' => [
            'controller' => 'Users',
            'action' => 'login'
        ]
    ]);
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
    public function beforeRender(Event $event)
    {
        	 $this->set('theme', Configure::read('Theme'));	
        	$this->viewBuilder()->theme('AdminLTE');
			$this->set('mptlusercurrencyfaclass',"fa fa-rupee");
			$this->set('mptluserlengthunitmini','in');
			$this->set('mptluserlengthunitmajor','ft');
			$this->set('mptluservolumeunit','lt');
			
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }
	
	public function isAuthorized($user)
	{
   		 // Admin can access every action
    	if (isset($user['role']) && $user['role'] === 'admin') {
        		 $this->set('loggedinuser', $user);		    
			     $this->loggedinuser=$user;
				 
				 
				 $custTable = TableRegistry::get('Customers');
	    
		         $customer=$custTable->get($user['customer_id'], [
                      'contain' => []
                 ]);
				 
				 $this->customer=$customer;
				 $this->set('loggedincustomer', $customer);
        	return true;
    	}
    	// Default deny
    	return false;
	}
	
}
