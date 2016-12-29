<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Messages Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Devices
 * @property \Cake\ORM\Association\BelongsTo $Messagecategories
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\BelongsTo $Trackingobjects
 * @property \Cake\ORM\Association\BelongsTo $Drivers
 *
 * @method \App\Model\Entity\Message get($primaryKey, $options = [])
 * @method \App\Model\Entity\Message newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Message[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Message|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Message patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Message[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Message findOrCreate($search, callable $callback = null)
 */
class MessagesTable extends Table
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

        $this->table('messages');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Devices', [
            'foreignKey' => 'device_id'
        ]);
        $this->belongsTo('Messagecategories', [
            'foreignKey' => 'messagecategory_id'
        ]);
        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id'
        ]);
        $this->belongsTo('Trackingobjects', [
            'foreignKey' => 'trackingobject_id'
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
            ->allowEmpty('message');

        $validator
            ->dateTime('msg_dtime')
            ->allowEmpty('msg_dtime');

        $validator
            ->allowEmpty('ip');

        $validator
            ->numeric('longitude')
            ->allowEmpty('longitude');

        $validator
            ->numeric('latitude')
            ->allowEmpty('latitude');

        $validator
            ->integer('type')
            ->allowEmpty('type');

        $validator
            ->integer('priority')
            ->allowEmpty('priority');

        $validator
            ->dateTime('activate_at')
            ->allowEmpty('activate_at');

        $validator
            ->boolean('ack')
            ->allowEmpty('ack');

        $validator
            ->allowEmpty('ack_by');

        $validator
            ->dateTime('ack_dtime')
            ->allowEmpty('ack_dtime');

        $validator
            ->allowEmpty('location');

        $validator
            ->allowEmpty('send_option');

        $validator
            ->boolean('direction')
            ->allowEmpty('direction');

        $validator
            ->allowEmpty('id', 'create');

        $validator
            ->integer('status')
            ->allowEmpty('status');

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
        $rules->add($rules->existsIn(['device_id'], 'Devices'));
        $rules->add($rules->existsIn(['messagecategory_id'], 'Messagecategories'));
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));
        $rules->add($rules->existsIn(['trackingobject_id'], 'Trackingobjects'));
        $rules->add($rules->existsIn(['driver_id'], 'Drivers'));

        return $rules;
    }
}
