<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pdaccounts Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\HasMany $Deiveryorders
 *
 * @method \App\Model\Entity\Pdaccount get($primaryKey, $options = [])
 * @method \App\Model\Entity\Pdaccount newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Pdaccount[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Pdaccount|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pdaccount patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Pdaccount[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Pdaccount findOrCreate($search, callable $callback = null)
 */class PdaccountsTable extends Table
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

        $this->table('pdaccounts');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Deiveryorders', [
            'foreignKey' => 'pdaccount_id'
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
            ->integer('code')            ->allowEmpty('code');
        $validator
            ->email('email')            ->allowEmpty('email');
        $validator
            ->allowEmpty('phone');
        $validator
            ->allowEmpty('aprtment');
        $validator
            ->allowEmpty('street');
        $validator
            ->allowEmpty('landmark');
        $validator
            ->allowEmpty('locality');
        $validator
            ->allowEmpty('city');
        $validator
            ->allowEmpty('state');
        $validator
            ->allowEmpty('country');
        $validator
            ->allowEmpty('pincode');
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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));

        return $rules;
    }
}
