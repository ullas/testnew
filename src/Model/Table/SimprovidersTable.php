<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Simproviders Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\HasMany $Simcards
 *
 * @method \App\Model\Entity\Simprovider get($primaryKey, $options = [])
 * @method \App\Model\Entity\Simprovider newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Simprovider[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Simprovider|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Simprovider patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Simprovider[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Simprovider findOrCreate($search, callable $callback = null)
 */class SimprovidersTable extends Table
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

        $this->table('simproviders');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Simcards', [
            'foreignKey' => 'simprovider_id'
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
            ->integer('billdateofmonth')            ->allowEmpty('billdateofmonth');
        $validator
            ->integer('duedateofmonth')            ->allowEmpty('duedateofmonth');
        $validator
            ->integer('lastdatefineofmonth')            ->allowEmpty('lastdatefineofmonth');
		 $validator
            ->allowEmpty('description');
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
