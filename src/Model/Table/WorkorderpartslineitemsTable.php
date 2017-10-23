<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Datasource\ConnectionManager;

/**
 * Workorderpartslineitems Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Workorders
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\BelongsTo $Parts
 * @property \Cake\ORM\Association\BelongsTo $Servicetasks
 * @property \Cake\ORM\Association\BelongsTo $Workordertypes
 * @property \Cake\ORM\Association\BelongsTo $Issues
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
        $this->belongsTo('Servicetasks', [
            'foreignKey' => 'servicetask_id'
        ]);
        $this->belongsTo('Workordertypes', [
            'foreignKey' => 'workordertype_id'
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

        $validator
            ->allowEmpty('name');

        $validator
            ->numeric('unitcost')
            ->allowEmpty('unitcost');

        $validator
            ->integer('quantity')
            ->allowEmpty('quantity');

        $validator
            ->integer('workorderlineitems')
            ->allowEmpty('workorderlineitems');

        $validator
            ->integer('taxtype')
            ->allowEmpty('taxtype');

        $validator
            ->numeric('tax')
            ->allowEmpty('tax');

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
        $rules->add($rules->existsIn(['servicetask_id'], 'Servicetasks'));
        $rules->add($rules->existsIn(['workordertype_id'], 'Workordertypes'));
        $rules->add($rules->existsIn(['issue_id'], 'Issues'));

        return $rules;
    }
	
	public function deletePartsLineItems($cid,$lineitemid)
	{
		$con = ConnectionManager::get('default');
		$stmt = $con->execute("delete from zorba.workorderpartslineitems where id = $lineitemid  and customer_id = $cid  ");
		$results = $stmt->fetchAll('assoc');
		return $results;
	}
	
	public function deletePartsLineItemsFromIndex($cid,$lineitemid)
	{
		$con = ConnectionManager::get('default');
		$stmt = $con->execute("delete from zorba.workorderpartslineitems where workorder_id = $lineitemid  and customer_id = $cid  ");
		$results = $stmt->fetchAll('assoc');
		return $results;
	}
}
