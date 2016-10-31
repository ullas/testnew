<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Simcards Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Simproviders
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\HasMany $Devices
 *
 * @method \App\Model\Entity\Simcard get($primaryKey, $options = [])
 * @method \App\Model\Entity\Simcard newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Simcard[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Simcard|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Simcard patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Simcard[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Simcard findOrCreate($search, callable $callback = null)
 */
class SimcardsTable extends Table
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

        $this->table('simcards');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('Simproviders', [
            'foreignKey' => 'simprovider_id'
        ]);
        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Devices', [
            'foreignKey' => 'simcard_id'
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
            ->allowEmpty('name');

        $validator
            ->allowEmpty('id', 'create');

        $validator
            ->integer('billdayofmonth')
            ->allowEmpty('billdayofmonth');

        $validator
            ->integer('duedayofmonth')
            ->allowEmpty('duedayofmonth');

        $validator
            ->integer('lastdatewithfine')
            ->allowEmpty('lastdatewithfine');

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
        $rules->add($rules->existsIn(['simprovider_id'], 'Simproviders'));
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));

        return $rules;
    }
}
