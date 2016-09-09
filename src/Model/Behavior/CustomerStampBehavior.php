<?php



namespace App\Model\Behavior;

use Cake\Datasource\EntityInterface;
use Cake\Event\Event;
use Cake\ORM\Behavior;
use Cake\ORM\Entity;
use Cake\ORM\Query;
use Cake\Utility\Inflector;

class CustomerStampBehavior extends Behavior 
{
	
	public function initialize(array $config)
   {
    // Some initialization code here
   }
   
   protected $_defaultConfig = [
        'field' => 'customer_id',
        
    ];

    public function setCustomer(Entity $entity)
    {
        $config = $this->config();
        $value = $entity->get($config['field']);
		
        //$entity->set('customer_id', '100');
		
    }

    public function beforeSave(Event $event, EntityInterface $entity)
    {
        $this->setCustomer($entity);
    }
}