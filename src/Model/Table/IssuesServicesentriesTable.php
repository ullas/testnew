<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * IssuesServicesentries Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Servicesentries
 * @property \Cake\ORM\Association\BelongsTo $Issues
 *
 * @method \App\Model\Entity\IssuesServicesentry get($primaryKey, $options = [])
 * @method \App\Model\Entity\IssuesServicesentry newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\IssuesServicesentry[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\IssuesServicesentry|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\IssuesServicesentry patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\IssuesServicesentry[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\IssuesServicesentry findOrCreate($search, callable $callback = null)
 */
class IssuesServicesentriesTable extends Table
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

        $this->table('issues_servicesentries');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Servicesentries', [
            'foreignKey' => 'servicesentry_id'
        ]);
        $this->belongsTo('Issues', [
            'foreignKey' => 'issue_id'
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
        $rules->add($rules->existsIn(['issue_id'], 'Issues'));

        return $rules;
    }
}
