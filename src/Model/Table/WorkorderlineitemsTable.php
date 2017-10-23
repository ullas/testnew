<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Datasource\ConnectionManager;

/**
 * Workorderlineitems Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Workorders
 * @property \Cake\ORM\Association\BelongsTo $Servicetasks
 * @property \Cake\ORM\Association\BelongsTo $Workordertypes
 * @property \Cake\ORM\Association\BelongsTo $Issues
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\HasMany $Workorderlabourlineitems
 *
 * @method \App\Model\Entity\Workorderlineitem get($primaryKey, $options = [])
 * @method \App\Model\Entity\Workorderlineitem newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Workorderlineitem[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Workorderlineitem|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Workorderlineitem patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Workorderlineitem[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Workorderlineitem findOrCreate($search, callable $callback = null)
 */
class WorkorderlineitemsTable extends Table
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

        $this->table('workorderlineitems');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('Workorders', [
            'foreignKey' => 'workorder_id'
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
        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Workorderlabourlineitems', [
            'foreignKey' => 'workorderlineitem_id'
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

        $validator
            ->integer('numitems')
            ->allowEmpty('numitems');

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
        $rules->add($rules->existsIn(['servicetask_id'], 'Servicetasks'));
        $rules->add($rules->existsIn(['workordertype_id'], 'Workordertypes'));
        $rules->add($rules->existsIn(['issue_id'], 'Issues'));
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));

        return $rules;
    }
	
	public function deleteLineItems($cid,$lineitemid)
	{
		$con = ConnectionManager::get('default');
		$stmt = $con->execute("delete from zorba.workorderlineitems where id = $lineitemid    ");
		$results = $stmt->fetchAll('assoc');
		return $results;
	}
	
	public function deleteLineItemsFromIndex($cid,$lineitemid)
	{
		$con = ConnectionManager::get('default');
		$stmt = $con->execute("delete from zorba.workorderlineitems where workorder_id = $lineitemid    ");
		$results = $stmt->fetchAll('assoc');
		return $results;
	}
}
