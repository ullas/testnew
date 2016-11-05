<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Alertcategories Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Providers
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\HasMany $Templates
 *
 * @method \App\Model\Entity\Alertcategory get($primaryKey, $options = [])
 * @method \App\Model\Entity\Alertcategory newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Alertcategory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Alertcategory|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Alertcategory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Alertcategory[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Alertcategory findOrCreate($search, callable $callback = null)
 */
class AlertcategoriesTable extends Table
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

        $this->table('alertcategories');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('Providers', [
            'foreignKey' => 'provider_id'
        ]);
        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Templates', [
            'foreignKey' => 'alertcategory_id'
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
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->boolean('fence')
            ->allowEmpty('fence');

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
        $rules->add($rules->existsIn(['provider_id'], 'Providers'));
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));

        return $rules;
    }
}
