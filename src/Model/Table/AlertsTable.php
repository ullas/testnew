<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Alerts Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Trackingobjects
 * @property \Cake\ORM\Association\BelongsTo $Alertcategories
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\BelongsTo $Drivers
 *
 * @method \App\Model\Entity\Alert get($primaryKey, $options = [])
 * @method \App\Model\Entity\Alert newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Alert[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Alert|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Alert patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Alert[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Alert findOrCreate($search, callable $callback = null)
 */
class AlertsTable extends Table
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

        $this->table('alerts');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Trackingobjects', [
            'foreignKey' => 'trackingobject_id'
        ]);
        $this->belongsTo('Alertcategories', [
            'foreignKey' => 'alertcategories_id'
        ]);
        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id'
        ]);
        $this->belongsTo('Drivers', [
            'foreignKey' => 'driver_id'
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
            ->allowEmpty('alert');

        $validator
            ->numeric('latitude')
            ->allowEmpty('latitude');

        $validator
            ->numeric('longitude')
            ->allowEmpty('longitude');

        $validator
            ->integer('alert_type')
            ->allowEmpty('alert_type');

        $validator
            ->integer('priority')
            ->allowEmpty('priority');

        $validator
            ->integer('send_option')
            ->allowEmpty('send_option');

        $validator
            ->boolean('ack')
            ->allowEmpty('ack');

        $validator
            ->allowEmpty('ack_by');

        $validator
            ->dateTime('alert_dtime')
            ->allowEmpty('alert_dtime');

        $validator
            ->allowEmpty('location');

        $validator
            ->integer('velocity')
            ->allowEmpty('velocity');

        $validator
            ->dateTime('ack_dtime')
            ->allowEmpty('ack_dtime');

        $validator
            ->integer('notification_send')
            ->allowEmpty('notification_send');

        $validator
            ->integer('odometer')
            ->allowEmpty('odometer');

        $validator
            ->allowEmpty('extinfo');

        $validator
            ->integer('frid')
            ->allowEmpty('frid');

        $validator
            ->allowEmpty('driver_key');

        $validator
            ->dateTime('endtime')
            ->allowEmpty('endtime');

        $validator
            ->integer('duration')
            ->allowEmpty('duration');

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
        $rules->add($rules->existsIn(['alertcategories_id'], 'Alertcategories'));
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));
        $rules->add($rules->existsIn(['driver_id'], 'Drivers'));

        return $rules;
    }
}
