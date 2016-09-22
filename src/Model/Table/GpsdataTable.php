<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Gpsdata Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Trackingobjects
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\BelongsTo $Devices
 * @property \Cake\ORM\Association\BelongsTo $Eventtypes
 *
 * @method \App\Model\Entity\Gpsdata get($primaryKey, $options = [])
 * @method \App\Model\Entity\Gpsdata newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Gpsdata[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Gpsdata|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Gpsdata patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Gpsdata[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Gpsdata findOrCreate($search, callable $callback = null)
 */
class GpsdataTable extends Table
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

        $this->table('gpsdata');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Trackingobjects', [
            'foreignKey' => 'trackingobject_id'
        ]);
        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id'
        ]);
        $this->belongsTo('Devices', [
            'foreignKey' => 'device_id'
        ]);
        $this->belongsTo('Eventtypes', [
            'foreignKey' => 'eventtype_id'
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
            ->allowEmpty('imei');

        $validator
            ->dateTime('gpstime')
            ->allowEmpty('gpstime');

        $validator
            ->dateTime('msgdtime')
            ->allowEmpty('msgdtime');

        $validator
            ->numeric('latitude')
            ->allowEmpty('latitude');

        $validator
            ->numeric('longitude')
            ->allowEmpty('longitude');

        $validator
            ->numeric('speed')
            ->allowEmpty('speed');

        $validator
            ->allowEmpty('heading');

        $validator
            ->numeric('altitude')
            ->allowEmpty('altitude');

        $validator
            ->numeric('distance')
            ->allowEmpty('distance');

        $validator
            ->allowEmpty('status');

        $validator
            ->numeric('odometer')
            ->allowEmpty('odometer');

        $validator
            ->integer('digitalvalues')
            ->allowEmpty('digitalvalues');

        $validator
            ->allowEmpty('analogvalues');

        $validator
            ->numeric('acceleration')
            ->allowEmpty('acceleration');

        $validator
            ->numeric('deceleration')
            ->allowEmpty('deceleration');

        $validator
            ->integer('extstatus')
            ->allowEmpty('extstatus');

        $validator
            ->allowEmpty('location');

        $validator
            ->allowEmpty('humidity');

        $validator
            ->allowEmpty('temperature');

        $validator
            ->allowEmpty('ibuttoncode');

        $validator
            ->integer('supporttype')
            ->allowEmpty('supporttype');

        $validator
            ->integer('servacc')
            ->allowEmpty('servacc');

        $validator
            ->numeric('fuellevel')
            ->allowEmpty('fuellevel');

        $validator
            ->numeric('batteryvoltage')
            ->allowEmpty('batteryvoltage');

        $validator
            ->numeric('batterycurrent')
            ->allowEmpty('batterycurrent');

        $validator
            ->numeric('gsmsignal')
            ->allowEmpty('gsmsignal');

        $validator
            ->integer('noofsatellite')
            ->allowEmpty('noofsatellite');

        $validator
            ->numeric('pcbtemp')
            ->allowEmpty('pcbtemp');

        $validator
            ->numeric('powersupply')
            ->allowEmpty('powersupply');

        $validator
            ->numeric('gpspwer')
            ->allowEmpty('gpspwer');

        $validator
            ->numeric('fuelcounter')
            ->allowEmpty('fuelcounter');

        $validator
            ->allowEmpty('canmessage');

        $validator
            ->allowEmpty('extramessage');

        $validator
            ->integer('tripstatus')
            ->allowEmpty('tripstatus');

        $validator
            ->numeric('tripdistance')
            ->allowEmpty('tripdistance');

        $validator
            ->allowEmpty('activesimid');

        $validator
            ->integer('additionalstat')
            ->allowEmpty('additionalstat');

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
        $rules->add($rules->existsIn(['trackingobject_id'], 'Trackingobjects'));
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));
        $rules->add($rules->existsIn(['device_id'], 'Devices'));
        $rules->add($rules->existsIn(['eventtype_id'], 'Eventtypes'));

        return $rules;
    }
}
