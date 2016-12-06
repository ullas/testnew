<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Customers Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Mapregions
 * @property \Cake\ORM\Association\BelongsTo $Customertypes
 * @property \Cake\ORM\Association\HasMany $Addresses
 * @property \Cake\ORM\Association\HasMany $Contractors
 * @property \Cake\ORM\Association\HasMany $Departments
 * @property \Cake\ORM\Association\HasMany $Devices
 * @property \Cake\ORM\Association\HasMany $Distributionlists
 * @property \Cake\ORM\Association\HasMany $Drivers
 * @property \Cake\ORM\Association\HasMany $Fences
 * @property \Cake\ORM\Association\HasMany $Gpsdata
 * @property \Cake\ORM\Association\HasMany $Ibuttons
 * @property \Cake\ORM\Association\HasMany $Inspections
 * @property \Cake\ORM\Association\HasMany $Issues
 * @property \Cake\ORM\Association\HasMany $Jobs
 * @property \Cake\ORM\Association\HasMany $Locations
 * @property \Cake\ORM\Association\HasMany $Manufacturers
 * @property \Cake\ORM\Association\HasMany $Measurementunits
 * @property \Cake\ORM\Association\HasMany $Ownerships
 * @property \Cake\ORM\Association\HasMany $Partcategories
 * @property \Cake\ORM\Association\HasMany $Passengergroups
 * @property \Cake\ORM\Association\HasMany $Passengers
 * @property \Cake\ORM\Association\HasMany $Providers
 * @property \Cake\ORM\Association\HasMany $Purposes
 * @property \Cake\ORM\Association\HasMany $Renewalreminders
 * @property \Cake\ORM\Association\HasMany $Renewalstypes
 * @property \Cake\ORM\Association\HasMany $Rfids
 * @property \Cake\ORM\Association\HasMany $Routes
 * @property \Cake\ORM\Association\HasMany $Schedules
 * @property \Cake\ORM\Association\HasMany $Servicereminders
 * @property \Cake\ORM\Association\HasMany $Servicetasks
 * @property \Cake\ORM\Association\HasMany $Stations
 * @property \Cake\ORM\Association\HasMany $Subscriptions
 * @property \Cake\ORM\Association\HasMany $Symbols
 * @property \Cake\ORM\Association\HasMany $Templates
 * @property \Cake\ORM\Association\HasMany $Templatetypes
 * @property \Cake\ORM\Association\HasMany $Timepolicies
 * @property \Cake\ORM\Association\HasMany $Trackingobjects
 * @property \Cake\ORM\Association\HasMany $Trips
 * @property \Cake\ORM\Association\HasMany $Users
 * @property \Cake\ORM\Association\HasMany $Vehiclecategories
 * @property \Cake\ORM\Association\HasMany $Vehiclestatuses
 * @property \Cake\ORM\Association\HasMany $Vehicletypes
 * @property \Cake\ORM\Association\HasMany $Vendors
 * @property \Cake\ORM\Association\HasMany $Worklorderlineitems
 * @property \Cake\ORM\Association\HasMany $Workorderdocuments
 * @property \Cake\ORM\Association\HasMany $Workorderstatuses
 * @property \Cake\ORM\Association\HasMany $Zonetypes
 *
 * @method \App\Model\Entity\Customer get($primaryKey, $options = [])
 * @method \App\Model\Entity\Customer newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Customer[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Customer|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Customer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Customer[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Customer findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CustomersTable extends Table
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

        $this->table('customers');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        
        $this->belongsTo('Customertypes', [
            'foreignKey' => 'customertype_id'
        ]);
        $this->hasMany('Addresses', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Contractors', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Departments', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Devices', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Distributionlists', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Drivers', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Fences', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Gpsdata', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Ibuttons', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Inspections', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Issues', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Jobs', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Locations', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Manufacturers', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Measurementunits', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Ownerships', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Partcategories', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Passengergroups', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Passengers', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Providers', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Purposes', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Renewalreminders', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Renewalstypes', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Rfids', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Routes', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Schedules', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Servicereminders', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Servicetasks', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Stations', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Subscriptions', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Symbols', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Templates', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Templatetypes', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Timepolicies', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Trackingobjects', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Trips', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Users', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Vehiclecategories', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Vehiclestatuses', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Vehicletypes', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Vendors', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Worklorderlineitems', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Workorderdocuments', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Workorderstatuses', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Zonetypes', [
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
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->date('srv_exp_date')
            ->allowEmpty('srv_exp_date');

        $validator
            ->allowEmpty('contact_first_name');

        $validator
            ->allowEmpty('tech_cont_first_name');

        $validator
            ->allowEmpty('alert_email');

        $validator
            ->date('srv_str_date')
            ->allowEmpty('srv_str_date');

        $validator
            ->integer('no_of_lic')
            ->allowEmpty('no_of_lic');

        $validator
            ->allowEmpty('contact_phone');

        $validator
            ->allowEmpty('tech_cont_phone');

        $validator
            ->allowEmpty('address');

        $validator
            ->allowEmpty('contact_last_name');

        $validator
            ->allowEmpty('tech_cont_last_name');

        $validator
            ->allowEmpty('contact_email');

        $validator
            ->allowEmpty('city');

        $validator
            ->allowEmpty('state');

        $validator
            ->allowEmpty('country');

        $validator
            ->allowEmpty('zip');

        $validator
            ->allowEmpty('designation');

        $validator
            ->integer('parent_customer')
            ->allowEmpty('parent_customer');

        $validator
            ->allowEmpty('fax');

        $validator
            ->integer('timezone')
            ->allowEmpty('timezone');

        $validator
            ->integer('language')
            ->allowEmpty('language');

        $validator
            ->boolean('smsenabled')
            ->allowEmpty('smsenabled');

        $validator
            ->numeric('initlat')
            ->allowEmpty('initlat');

        $validator
            ->numeric('initlong')
            ->allowEmpty('initlong');

        $validator
            ->integer('updategroup')
            ->allowEmpty('updategroup');

        $validator
            ->integer('weekly_off1')
            ->allowEmpty('weekly_off1');

        $validator
            ->integer('weekly_off2')
            ->allowEmpty('weekly_off2');

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
       
        $rules->add($rules->existsIn(['customertype_id'], 'Customertypes'));

        return $rules;
    }
}
