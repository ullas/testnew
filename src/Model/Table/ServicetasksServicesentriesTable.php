<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ServicetasksServicesentries Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Servicesentries
 * @property \Cake\ORM\Association\BelongsTo $Servicetasks
 *
 * @method \App\Model\Entity\ServicetasksServicesentry get($primaryKey, $options = [])
 * @method \App\Model\Entity\ServicetasksServicesentry newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ServicetasksServicesentry[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ServicetasksServicesentry|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ServicetasksServicesentry patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ServicetasksServicesentry[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ServicetasksServicesentry findOrCreate($search, callable $callback = null)
 */
class ServicetasksServicesentriesTable extends Table
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

        $this->table('servicetasks_servicesentries');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Servicesentries', [
            'foreignKey' => 'servicesentry_id'
        ]);
        $this->belongsTo('Servicetasks', [
            'foreignKey' => 'servicetask_id'
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
        $rules->add($rules->existsIn(['servicetask_id'], 'Servicetasks'));

        return $rules;
    }
}
