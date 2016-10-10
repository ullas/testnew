<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Vehicles Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Vehicletypes
 * @property \Cake\ORM\Association\BelongsTo $Vehiclestatuses
 * @property \Cake\ORM\Association\BelongsTo $Ownerships
 * @property \Cake\ORM\Association\BelongsTo $Symbols
 * @property \Cake\ORM\Association\BelongsTo $Driverdetectionmodes
 * @property \Cake\ORM\Association\BelongsTo $Stations
 * @property \Cake\ORM\Association\BelongsTo $Departments
 * @property \Cake\ORM\Association\BelongsTo $Trackingobjects
 * @property \Cake\ORM\Association\BelongsTo $Purposes
 * @property \Cake\ORM\Association\BelongsTo $Transporters
 * @property \Cake\ORM\Association\BelongsTo $Activedrivers
 * @property \Cake\ORM\Association\HasMany $Drivers
 * @property \Cake\ORM\Association\HasMany $Fuelentries
 * @property \Cake\ORM\Association\HasMany $Issues
 * @property \Cake\ORM\Association\HasMany $Servicesentries
 * @property \Cake\ORM\Association\HasMany $Trips
 * @property \Cake\ORM\Association\HasMany $Vehicleengines
 * @property \Cake\ORM\Association\HasMany $Vehiclefluids
 * @property \Cake\ORM\Association\HasMany $Vehiclepermits
 * @property \Cake\ORM\Association\HasMany $Vehiclepurchases
 * @property \Cake\ORM\Association\HasMany $Vehiclespecifications
 * @property \Cake\ORM\Association\HasMany $Vehiclewheelstyres
 * @property \Cake\ORM\Association\HasMany $Workorders
 * @property \Cake\ORM\Association\BelongsToMany $Drivers
 *
 * @method \App\Model\Entity\Vehicle get($primaryKey, $options = [])
 * @method \App\Model\Entity\Vehicle newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Vehicle[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Vehicle|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Vehicle patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Vehicle[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Vehicle findOrCreate($search, callable $callback = null)
 */
class VehiclesTable extends Table
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

        $this->table('vehicles');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('Vehicletypes', [
            'foreignKey' => 'vehicletype_id'
        ]);
        $this->belongsTo('Vehiclestatuses', [
            'foreignKey' => 'vehiclestatus_id'
        ]);
        $this->belongsTo('Ownerships', [
            'foreignKey' => 'ownership_id'
        ]);
        $this->belongsTo('Symbols', [
            'foreignKey' => 'symbol_id'
        ]);
        $this->belongsTo('Driverdetectionmodes', [
            'foreignKey' => 'driverdetectionmode_id'
        ]);
        $this->belongsTo('Stations', [
            'foreignKey' => 'station_id'
        ]);
        $this->belongsTo('Departments', [
            'foreignKey' => 'department_id'
        ]);
        $this->belongsTo('Trackingobjects', [
            'foreignKey' => 'trackingobject_id'
        ]);
        $this->belongsTo('Purposes', [
            'foreignKey' => 'purpose_id'
        ]);
        $this->belongsTo('Transporters', [
            'className' => 'Vendors',
            'foreignKey' => 'transporter_id'
        ]);
        $this->belongsTo('Activedrivers', [
            'className' => 'Drivers',
            'foreignKey' => 'activedriver_id'
        ]);
        $this->hasMany('Drivers', [
            'foreignKey' => 'vehicle_id'
        ]);
        $this->hasMany('Fuelentries', [
            'foreignKey' => 'vehicle_id'
        ]);
        $this->hasMany('Issues', [
            'foreignKey' => 'vehicle_id'
        ]);
        $this->hasMany('Servicesentries', [
            'foreignKey' => 'vehicle_id'
        ]);
        $this->hasMany('Trips', [
            'foreignKey' => 'vehicle_id'
        ]);
        $this->hasMany('Vehicleengines', [
            'foreignKey' => 'vehicle_id'
        ]);
        $this->hasMany('Vehiclefluids', [
            'foreignKey' => 'vehicle_id'
        ]);
        $this->hasMany('Vehiclepermits', [
            'foreignKey' => 'vehicle_id'
        ]);
        $this->hasMany('Vehiclepurchases', [
            'foreignKey' => 'vehicle_id'
        ]);
        $this->hasMany('Vehiclespecifications', [
            'foreignKey' => 'vehicle_id'
        ]);
        $this->hasMany('Vehiclewheelstyres', [
            'foreignKey' => 'vehicle_id'
        ]);
        $this->hasMany('Workorders', [
            'foreignKey' => 'vehicle_id'
        ]);
        $this->belongsToMany('Drivers', [
            'foreignKey' => 'vehicle_id',
            'targetForeignKey' => 'driver_id',
            'joinTable' => 'vehicles_drivers'
        ]);
		$this->belongsTo('Customers', [
            'foreignKey' => 'customer_id'
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
            ->allowEmpty('code');

        $validator
            ->allowEmpty('plateno');

        $validator
            ->integer('year')
            ->allowEmpty('year');

        $validator
            ->allowEmpty('make');

        $validator
            ->allowEmpty('model');

        $validator
            ->allowEmpty('trim');

        $validator
            ->allowEmpty('registationloc');

        $validator
            ->numeric('odometer')
            ->allowEmpty('odometer');

        $validator
            ->allowEmpty('description');

        $validator
            ->allowEmpty('regstate');

        $validator
            ->allowEmpty('color');

        $validator
            ->allowEmpty('bodytype');

        $validator
            ->allowEmpty('bodysubtype');

        $validator
            ->allowEmpty('msrp');

        $validator
            ->allowEmpty('photo');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

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
        $rules->add($rules->existsIn(['vehicletype_id'], 'Vehicletypes'));
        $rules->add($rules->existsIn(['vehiclestatus_id'], 'Vehiclestatuses'));
        $rules->add($rules->existsIn(['ownership_id'], 'Ownerships'));
        $rules->add($rules->existsIn(['symbol_id'], 'Symbols'));
        $rules->add($rules->existsIn(['driverdetectionmode_id'], 'Driverdetectionmodes'));
        $rules->add($rules->existsIn(['station_id'], 'Stations'));
        $rules->add($rules->existsIn(['department_id'], 'Departments'));
        $rules->add($rules->existsIn(['trackingobject_id'], 'Trackingobjects'));
        $rules->add($rules->existsIn(['purpose_id'], 'Purposes'));
        $rules->add($rules->existsIn(['transporter_id'], 'Transporters'));
        $rules->add($rules->existsIn(['activedriver_id'], 'Activedrivers'));

        return $rules;
    }
}
