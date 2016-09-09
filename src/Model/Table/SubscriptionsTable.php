<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Subscriptions Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Schedules
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\BelongsTo $Locations
 * @property \Cake\ORM\Association\BelongsTo $Notifications
 *
 * @method \App\Model\Entity\Subscription get($primaryKey, $options = [])
 * @method \App\Model\Entity\Subscription newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Subscription[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Subscription|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Subscription patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Subscription[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Subscription findOrCreate($search, callable $callback = null)
 */
class SubscriptionsTable extends Table
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

        $this->table('subscriptions');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('Schedules', [
            'foreignKey' => 'schedule_id'
        ]);
        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id'
        ]);
        $this->belongsTo('Locations', [
            'foreignKey' => 'location_id'
        ]);
        $this->belongsTo('Notifications', [
            'foreignKey' => 'notification_id'
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
            ->boolean('active')
            ->allowEmpty('active');

        $validator
            ->date('validfrom')
            ->allowEmpty('validfrom');

        $validator
            ->date('validtill')
            ->allowEmpty('validtill');

        $validator
            ->allowEmpty('loctype');

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
        $rules->add($rules->existsIn(['schedule_id'], 'Schedules'));
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));
        $rules->add($rules->existsIn(['location_id'], 'Locations'));
        $rules->add($rules->existsIn(['notification_id'], 'Notifications'));

        return $rules;
    }
}
