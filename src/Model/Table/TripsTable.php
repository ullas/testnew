<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Datasource\ConnectionManager;

/**
 * Trips Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\BelongsTo $Vehicles
 * @property \Cake\ORM\Association\BelongsTo $Timepolicies
 * @property \Cake\ORM\Association\BelongsTo $Routes
 * @property \Cake\ORM\Association\BelongsTo $Startpoints
 * @property \Cake\ORM\Association\BelongsTo $Endpoints
 * @property \Cake\ORM\Association\BelongsTo $Schedules
 * @property \Cake\ORM\Association\BelongsTo $Tripstatuses
 * @property \Cake\ORM\Association\BelongsTo $Vehiclecategories
 * @property \Cake\ORM\Association\BelongsTo $Triptypes
 * @property \Cake\ORM\Association\BelongsToMany $Locations
 *
 * @method \App\Model\Entity\Trip get($primaryKey, $options = [])
 * @method \App\Model\Entity\Trip newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Trip[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Trip|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Trip patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Trip[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Trip findOrCreate($search, callable $callback = null)
 */
class TripsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('trips');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id'
        ]);
        $this->belongsTo('Vehicles', [
            'foreignKey' => 'vehicle_id'
        ]);
        $this->belongsTo('Timepolicies', [
            'foreignKey' => 'timepolicy_id'
        ]);
        $this->belongsTo('Routes', [
            'foreignKey' => 'route_id'
        ]);
        $this->belongsTo('Startpoints', [
            'className' =>'Locations',
            'foreignKey' => 'startpoint_id'
        ]);
        $this->belongsTo('Endpoints', [
            'className' =>'Locations',
            'foreignKey' => 'endpoint_id'
        ]);
        $this->belongsTo('Schedules', [
            'foreignKey' => 'schedule_id'
        ]);
        $this->belongsTo('Tripstatuses', [
            'foreignKey' => 'tripstatus_id'
        ]);
        $this->belongsTo('Vehiclecategories', [
            'foreignKey' => 'vehiclecategory_id'
        ]);
        $this->belongsTo('Triptypes', [
            'foreignKey' => 'triptype_id'
        ]);
        $this->belongsToMany('Locations', [
            'foreignKey' => 'trip_id',
            'targetForeignKey' => 'location_id',
            'joinTable' => 'locations_trips'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('name');

        $validator
            ->date('start_date')
            ->allowEmpty('start_date');

        $validator
            ->date('end_date')
            ->allowEmpty('end_date');

        $validator
            ->time('start_time')
            ->allowEmpty('start_time');

        $validator
            ->time('end_time')
            ->allowEmpty('end_time');

        $validator
            ->boolean('autogen')
            ->allowEmpty('autogen');

        $validator
            ->allowEmpty('last_location');

        $validator
            ->boolean('canceled')
            ->allowEmpty('canceled');

        $validator
            ->boolean('active')
            ->allowEmpty('active');

        $validator
            ->boolean('fromschedule')
            ->allowEmpty('fromschedule');

        $validator
            ->integer('trackingcode')
            ->allowEmpty('trackingcode');

        // $validator
            // ->dateTime('adt')
            // ->allowEmpty('adt');
// 
        // $validator
            // ->dateTime('aat')
            // ->allowEmpty('aat');
// 
        // $validator
            // ->dateTime('edt')
            // ->allowEmpty('edt');
// 
        // $validator
            // ->dateTime('eat')
            // ->allowEmpty('eat');

        $validator
            ->integer('platform')
            ->allowEmpty('platform');

        $validator
            ->boolean('softwaretriggered')
            ->allowEmpty('softwaretriggered');

        $validator
            ->boolean('hwtriggered')
            ->allowEmpty('hwtriggered');

        $validator
            ->integer('completedstops')
            ->allowEmpty('completedstops');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));
        $rules->add($rules->existsIn(['vehicle_id'], 'Vehicles'));
        $rules->add($rules->existsIn(['timepolicy_id'], 'Timepolicies'));
        $rules->add($rules->existsIn(['route_id'], 'Routes'));
        $rules->add($rules->existsIn(['startpoint_id'], 'Startpoints'));
        $rules->add($rules->existsIn(['endpoint_id'], 'Endpoints'));
        $rules->add($rules->existsIn(['schedule_id'], 'Schedules'));
        $rules->add($rules->existsIn(['tripstatus_id'], 'Tripstatuses'));
        $rules->add($rules->existsIn(['vehiclecategory_id'], 'Vehiclecategories'));
        $rules->add($rules->existsIn(['triptype_id'], 'Triptypes'));

        return $rules;
    }
	public function getActiveTrips($cid)
	{
		
		$con = ConnectionManager::get('default');
		$stmt = $con->execute("select trips.name,percent from (select trip_id, (sum(case completed when true then 1 when false then 0 end )*100/(count(*) + 2)) as percent from zorba.locations_trips where customer_id = $cid group by trip_id ) as p left join zorba.trips on trips.id= p.trip_id where tripstatus_id = 1");
		$results = $stmt->fetchAll('assoc');
		
		return $results;
	}
	
	public function getTripmondata($cid)
	{
		
		$con = ConnectionManager::get('default');
		//$stmt = $con->execute("select  trips.start_time, trips.end_time,trips.id, locations.name,orderid, trips.name,locations_trips.aat from zorba.trips left join zorba.locations_trips on trips.id = locations_trips.trip_id left join zorba.locations on locations.id =locations_trips.location_id where start_date = date(now()) order by trips.id,orderid");
		$stmt = $con->execute("select  trips.start_date,trips.end_date, trips.start_time, trips.end_time,trips.id, locations.name,orderid, trips.name,locations_trips.aat,locations_trips.adt  from zorba.trips left join zorba.locations_trips on trips.id = locations_trips.trip_id left join zorba.locations on locations.id =locations_trips.location_id where start_date = date(now()) order by trips.id,orderid");
		$results = $stmt->fetchAll('assoc');
		return $results;
	}
}
