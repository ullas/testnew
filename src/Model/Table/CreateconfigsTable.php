<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Createconfigs Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Customers
 *
 * @method \App\Model\Entity\Createconfig get($primaryKey, $options = [])
 * @method \App\Model\Entity\Createconfig newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Createconfig[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Createconfig|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Createconfig patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Createconfig[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Createconfig findOrCreate($search, callable $callback = null)
 */
class CreateconfigsTable extends Table
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

        $this->table('createconfigs');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id'
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
            ->allowEmpty('table_name');

        $validator
            ->allowEmpty('field_name');

        $validator
            ->allowEmpty('datatype');

        $validator
            ->allowEmpty('title');

        $validator
            ->allowEmpty('helpmessage');

        $validator
            ->integer('order')
            ->allowEmpty('order');

        $validator
            ->boolean('isselect')
            ->allowEmpty('isselect');

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
