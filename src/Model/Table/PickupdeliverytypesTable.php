<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pickupdeliverytypes Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\HasMany $Deiveryorders
 * @property \Cake\ORM\Association\HasMany $Pickupdeiveryorders
 * @property \Cake\ORM\Association\HasMany $Pickuporders
 *
 * @method \App\Model\Entity\Pickupdeliverytype get($primaryKey, $options = [])
 * @method \App\Model\Entity\Pickupdeliverytype newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Pickupdeliverytype[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Pickupdeliverytype|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pickupdeliverytype patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Pickupdeliverytype[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Pickupdeliverytype findOrCreate($search, callable $callback = null)
 */class PickupdeliverytypesTable extends Table
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

        $this->table('pickupdeliverytypes');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Deiveryorders', [
            'foreignKey' => 'pickupdeliverytype_id'
        ]);
        $this->hasMany('Pickupdeiveryorders', [
            'foreignKey' => 'pickupdeliverytype_id'
        ]);
        $this->hasMany('Pickuporders', [
            'foreignKey' => 'pickupdeliverytype_id'
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

        return $rules;
    }
}
