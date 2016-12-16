<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Schedules Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Startlocs
 * @property \Cake\ORM\Association\BelongsTo $Endlocs
 * @property \Cake\ORM\Association\BelongsTo $Routes
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\BelongsTo $Timepolicies
 * @property \Cake\ORM\Association\BelongsTo $DefaultDrivers
 * @property \Cake\ORM\Association\BelongsTo $DefaultVehs
 *
 * @method \App\Model\Entity\Schedule get($primaryKey, $options = [])
 * @method \App\Model\Entity\Schedule newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Schedule[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Schedule|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Schedule patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Schedule[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Schedule findOrCreate($search, callable $callback = null)
 */
class SchedulesTable extends Table
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

        $this->table('schedules');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('Startlocs', [
            'className'  => 'Locations',
            'foreignKey' => 'startloc_id'
        ]);
        $this->belongsTo('Endlocs', [
             'className'  => 'Locations',
            'foreignKey' => 'endloc_id'
        ]);
        $this->belongsTo('Routes', [
            'foreignKey' => 'route_id'
        ]);
        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id'
        ]);
		$this->belongsTo('Passengergroups', [
            'foreignKey' => 'default_paxgrpid'
        ]);
		
        $this->belongsTo('Timepolicies', [
            'foreignKey' => 'timepolicy_id'
        ]);
        $this->belongsTo('DefaultDrivers', [
             'className' =>'Drivers',
            'foreignKey' => 'default_driver_id'
        ]);
        $this->belongsTo('DefaultVehs', [
            'className' =>'Vehicles',
            'foreignKey' => 'default_veh_id'
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
            ->date('validfrom')
            ->allowEmpty('validfrom');

        $validator
            ->date('validtill')
            ->allowEmpty('validtill');

        $validator
            ->time('start_time')
            ->allowEmpty('start_time');

        $validator
            ->time('end_time')
            ->allowEmpty('end_time');

        $validator
            ->allowEmpty('name');

        $validator
            ->integer('nodays')
            ->allowEmpty('nodays');

        $validator
            ->integer('brktime_bfr_nxt_trip')
            ->allowEmpty('brktime_bfr_nxt_trip');

        $validator
            ->integer('default_paxgrpid')
            ->allowEmpty('default_paxgrpid');

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
        $rules->add($rules->existsIn(['startloc_id'], 'Startlocs'));
        $rules->add($rules->existsIn(['endloc_id'], 'Endlocs'));
        $rules->add($rules->existsIn(['route_id'], 'Routes'));
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));
        $rules->add($rules->existsIn(['timepolicy_id'], 'Timepolicies'));
        $rules->add($rules->existsIn(['default_driver_id'], 'DefaultDrivers'));
        $rules->add($rules->existsIn(['default_veh_id'], 'DefaultVehs'));

        return $rules;
    }
}
