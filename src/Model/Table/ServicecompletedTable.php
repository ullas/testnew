<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Servicecompleted Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Servicesentries
 *
 * @method \App\Model\Entity\Servicecompleted get($primaryKey, $options = [])
 * @method \App\Model\Entity\Servicecompleted newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Servicecompleted[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Servicecompleted|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Servicecompleted patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Servicecompleted[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Servicecompleted findOrCreate($search, callable $callback = null)
 */
class ServicecompletedTable extends Table
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

        $this->table('servicecompleted');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Servicesentries', [
            'foreignKey' => 'servicesentry_id'
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
            ->allowEmpty('servicescompleted');

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
        $rules->add($rules->existsIn(['servicesentry_id'], 'Servicesentries'));

        return $rules;
    }
}
