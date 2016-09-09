<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

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
 * @property \Cake\ORM\Association\BelongsTo $Passengergroups
 * @property \Cake\ORM\Association\BelongsTo $Tripstatuses
 * @property \Cake\ORM\Association\BelongsTo $Vehiclecategories
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
            'className' => 'Locations',
            'foreignKey' => 'startpoint_id'
        ]);
        $this->belongsTo('Endpoints', [
             'className' => 'Locations',
            'foreignKey' => 'endpoint_id'
        ]);
        $this->belongsTo('Schedules', [
            'foreignKey' => 'schedule_id'
        ]);
        $this->belongsTo('Passengergroups', [
            'foreignKey' => 'passengergroup_id'
        ]);
        $this->belongsTo('Tripstatuses', [
            'foreignKey' => 'tripstatus_id'
        ]);
        $this->belongsTo('Vehiclecategories', [
            'foreignKey' => 'vehiclecategory_id'
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
            ->boolean('fromitinerary')
            ->allowEmpty('fromitinerary');

        $validator
            ->integer('trackingcode')
            ->allowEmpty('trackingcode');

        $validator
            ->dateTime('adt')
            ->allowEmpty('adt');

        $validator
            ->dateTime('aat')
            ->allowEmpty('aat');

        $validator
            ->dateTime('edt')
            ->allowEmpty('edt');

        $validator
            ->dateTime('eat')
            ->allowEmpty('eat');

        $validator
            ->integer('platform')
            ->allowEmpty('platform');

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
        $rules->add($rules->existsIn(['passengergroup_id'], 'Passengergroups'));
        $rules->add($rules->existsIn(['tripstatus_id'], 'Tripstatuses'));
        $rules->add($rules->existsIn(['vehiclecategory_id'], 'Vehiclecategories'));

        return $rules;
    }
}
