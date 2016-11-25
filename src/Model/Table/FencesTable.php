<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Fences Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $Groups
 * @property \Cake\ORM\Association\BelongsTo $Vehicles
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\BelongsTo $Zonetypes
 *
 * @method \App\Model\Entity\Fence get($primaryKey, $options = [])
 * @method \App\Model\Entity\Fence newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Fence[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Fence|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Fence patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Fence[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Fence findOrCreate($search, callable $callback = null)
 */
class FencesTable extends Table
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

        $this->table('fences');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
        $this->belongsTo('Groups', [
            'foreignKey' => 'group_id'
        ]);
        $this->belongsTo('Trackingobjects', [
            'foreignKey' => 'trackingobject_id'
        ]);
        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id'
        ]);
        $this->belongsTo('Zonetypes', [
            'foreignKey' => 'zonetype_id'
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
            ->allowEmpty('fencedata');

        $validator
            ->boolean('show_on_map')
            ->allowEmpty('show_on_map');

        $validator
            ->boolean('alerts_on')
            ->allowEmpty('alerts_on');

        $validator
            ->boolean('enter_alert')
            ->allowEmpty('enter_alert');

        $validator
            ->boolean('enter_in')
            ->allowEmpty('enter_in');

        $validator
            ->boolean('leave_alert')
            ->allowEmpty('leave_alert');

        $validator
            ->boolean('leave_out')
            ->allowEmpty('leave_out');

        $validator
            ->integer('leave_out_time')
            ->allowEmpty('leave_out_time');

        $validator
            ->integer('enter_in_time')
            ->allowEmpty('enter_in_time');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['group_id'], 'Groups'));
        $rules->add($rules->existsIn(['trackingobject_id'], 'Trackingobjects'));
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));
        $rules->add($rules->existsIn(['zonetype_id'], 'Zonetypes'));

        return $rules;
    }
}
