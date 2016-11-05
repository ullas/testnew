<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Drivers Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Addresses
 * @property \Cake\ORM\Association\BelongsTo $Ibuttons
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\BelongsTo $Vehicles
 * @property \Cake\ORM\Association\BelongsTo $Contractors
 * @property \Cake\ORM\Association\BelongsTo $Stations
 * @property \Cake\ORM\Association\BelongsTo $Supervisors
 * @property \Cake\ORM\Association\BelongsTo $Shifts
 * @property \Cake\ORM\Association\HasMany $Alerts
 * @property \Cake\ORM\Association\HasMany $Ibuttons
 * @property \Cake\ORM\Association\HasMany $Rfids
 * @property \Cake\ORM\Association\BelongsToMany $Drivergroups
 * @property \Cake\ORM\Association\BelongsToMany $Languages
 * @property \Cake\ORM\Association\BelongsToMany $Vehicles
 *
 * @method \App\Model\Entity\Driver get($primaryKey, $options = [])
 * @method \App\Model\Entity\Driver newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Driver[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Driver|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Driver patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Driver[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Driver findOrCreate($search, callable $callback = null)
 */
class DriversTable extends Table
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

        $this->table('drivers');
        $this->displayField('firstname');
        $this->primaryKey('id');

        $this->belongsTo('Addresses', [
            'foreignKey' => 'address_id'
        ]);
        $this->belongsTo('Ibuttons', [
            'foreignKey' => 'ibutton_id'
        ]);
        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id'
        ]);
        $this->belongsTo('Vehicles', [
            'foreignKey' => 'vehicle_id'
        ]);
        $this->belongsTo('Contractors', [
            'foreignKey' => 'contractor_id'
        ]);
        $this->belongsTo('Stations', [
            'foreignKey' => 'station_id'
        ]);
        $this->belongsTo('Supervisors', [
            'className' => 'Drivers',
            'foreignKey' => 'supervisor_id'
        ]);
        $this->belongsTo('Shifts', [
            'foreignKey' => 'shift_id'
        ]);
        $this->hasMany('Alerts', [
            'foreignKey' => 'driver_id'
        ]);
        $this->hasOne('Ibuttons', [
            'foreignKey' => 'driver_id'
        ]);
        $this->hasOne('Rfids', [
            'foreignKey' => 'driver_id'
        ]);
        $this->belongsToMany('Drivergroups', [
            'foreignKey' => 'driver_id',
            'targetForeignKey' => 'drivergroup_id',
            'joinTable' => 'drivers_drivergroups'
        ]);
        $this->belongsToMany('Languages', [
            'foreignKey' => 'driver_id',
            'targetForeignKey' => 'language_id',
            'joinTable' => 'drivers_languages'
        ]);
        $this->belongsToMany('Vehicles', [
            'foreignKey' => 'driver_id',
            'targetForeignKey' => 'vehicle_id',
            'joinTable' => 'vehicles_drivers'
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
            ->date('dob')
            ->allowEmpty('dob');

        $validator
            ->integer('sex')
            ->allowEmpty('sex');

        $validator
            ->allowEmpty('nationality');

        $validator
            ->allowEmpty('idcardno');

        $validator
            ->allowEmpty('licenceno');

        $validator
            ->allowEmpty('licenceexpdate');

        $validator
            ->allowEmpty('nextofkin');

        $validator
            ->allowEmpty('comments');

        $validator
            ->allowEmpty('photo');

        $validator
            ->allowEmpty('drivingpassportno');

        $validator
            ->date('drivingpassportexp')
            ->allowEmpty('drivingpassportexp');

        $validator
            ->allowEmpty('drivinglicenseclass');

        $validator
            ->time('reporingtime')
            ->allowEmpty('reporingtime');

        $validator
            ->integer('offday1')
            ->allowEmpty('offday1');

        $validator
            ->integer('offday2')
            ->allowEmpty('offday2');

        $validator
            ->boolean('isasupervisor')
            ->allowEmpty('isasupervisor');

        $validator
            ->numeric('ragscore')
            ->allowEmpty('ragscore');

        $validator
            ->allowEmpty('ragsummary');

        $validator
            ->numeric('salary')
            ->allowEmpty('salary');

        $validator
            ->integer('maritalstatus')
            ->allowEmpty('maritalstatus');

        $validator
            ->numeric('experience')
            ->allowEmpty('experience');

        $validator
            ->allowEmpty('licenseissuedby');

        $validator
            ->allowEmpty('previouscompanyname');

        $validator
            ->boolean('ismarker')
            ->allowEmpty('ismarker');

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
        $rules->add($rules->existsIn(['address_id'], 'Addresses'));
        $rules->add($rules->existsIn(['ibutton_id'], 'Ibuttons'));
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));
        $rules->add($rules->existsIn(['vehicle_id'], 'Vehicles'));
        $rules->add($rules->existsIn(['contractor_id'], 'Contractors'));
        $rules->add($rules->existsIn(['station_id'], 'Stations'));
        $rules->add($rules->existsIn(['supervisor_id'], 'Supervisors'));
        $rules->add($rules->existsIn(['shift_id'], 'Shifts'));

        return $rules;
    }
}
