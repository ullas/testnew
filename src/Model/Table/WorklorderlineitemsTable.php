<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Worklorderlineitems Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Workorders
 * @property \Cake\ORM\Association\BelongsTo $Workordertypes
 * @property \Cake\ORM\Association\BelongsTo $Customers
 *
 * @method \App\Model\Entity\Worklorderlineitem get($primaryKey, $options = [])
 * @method \App\Model\Entity\Worklorderlineitem newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Worklorderlineitem[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Worklorderlineitem|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Worklorderlineitem patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Worklorderlineitem[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Worklorderlineitem findOrCreate($search, callable $callback = null)
 */
class WorklorderlineitemsTable extends Table
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

        $this->table('worklorderlineitems');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('Workorders', [
            'foreignKey' => 'workorder_id'
        ]);
        $this->belongsTo('Workordertypes', [
            'foreignKey' => 'workordertype_id'
        ]);
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
            ->allowEmpty('name');

        $validator
            ->numeric('labour')
            ->allowEmpty('labour');

        $validator
            ->numeric('parts')
            ->allowEmpty('parts');

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
        $rules->add($rules->existsIn(['workorder_id'], 'Workorders'));
        $rules->add($rules->existsIn(['workordertype_id'], 'Workordertypes'));
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));

        return $rules;
    }
}
