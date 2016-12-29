<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Todaysreminders Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Servicereminders
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\BelongsTo $Servicetasks
 *
 * @method \App\Model\Entity\Todaysreminder get($primaryKey, $options = [])
 * @method \App\Model\Entity\Todaysreminder newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Todaysreminder[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Todaysreminder|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Todaysreminder patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Todaysreminder[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Todaysreminder findOrCreate($search, callable $callback = null)
 */
class TodaysremindersTable extends Table
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

        $this->table('todaysreminders');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Servicereminders', [
            'foreignKey' => 'servicereminder_id'
        ]);
        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id'
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

        $validator
            ->date('date')
            ->allowEmpty('date');

        $validator
            ->integer('status')
            ->allowEmpty('status');

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
        $rules->add($rules->existsIn(['servicereminder_id'], 'Servicereminders'));
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));
        $rules->add($rules->existsIn(['servicetask_id'], 'Servicetasks'));

        return $rules;
    }
}
