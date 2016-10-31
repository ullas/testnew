<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Workorderpartslineitems Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Workorders
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\BelongsTo $Parts
 *
 * @method \App\Model\Entity\Workorderpartslineitem get($primaryKey, $options = [])
 * @method \App\Model\Entity\Workorderpartslineitem newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Workorderpartslineitem[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Workorderpartslineitem|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Workorderpartslineitem patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Workorderpartslineitem[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Workorderpartslineitem findOrCreate($search, callable $callback = null)
 */
class WorkorderpartslineitemsTable extends Table
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

        $this->table('workorderpartslineitems');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('Workorders', [
            'foreignKey' => 'workorder_id'
        ]);
        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id'
        ]);
        $this->belongsTo('Parts', [
            'foreignKey' => 'part_id'
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
            ->numeric('unitcost')
            ->allowEmpty('unitcost');

        $validator
            ->integer('quantity')
            ->allowEmpty('quantity');

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
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));
        $rules->add($rules->existsIn(['part_id'], 'Parts'));

        return $rules;
    }
}
