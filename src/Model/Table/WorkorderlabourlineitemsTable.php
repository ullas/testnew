<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Datasource\ConnectionManager;

/**
 * Workorderlabourlineitems Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Workorders
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\BelongsTo $Addresses
 * @property \Cake\ORM\Association\BelongsTo $Workorderlineitems
 *
 * @method \App\Model\Entity\Workorderlabourlineitem get($primaryKey, $options = [])
 * @method \App\Model\Entity\Workorderlabourlineitem newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Workorderlabourlineitem[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Workorderlabourlineitem|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Workorderlabourlineitem patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Workorderlabourlineitem[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Workorderlabourlineitem findOrCreate($search, callable $callback = null)
 */
class WorkorderlabourlineitemsTable extends Table
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

        $this->table('workorderlabourlineitems');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('Workorders', [
            'foreignKey' => 'workorder_id'
        ]);
        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id'
        ]);
        $this->belongsTo('Addresses', [
            'foreignKey' => 'address_id'
        ]);
        $this->belongsTo('Workorderlineitems', [
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
            ->numeric('hours')
            ->allowEmpty('hours');

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
        $rules->add($rules->existsIn(['address_id'], 'Addresses'));
        $rules->add($rules->existsIn(['workorderlineitem_id'], 'Workorderlineitems'));

        return $rules;
    }
	
	public function deleteLabourLineItems($cid,$lineitemid)
	{
		$con = ConnectionManager::get('default');
		$stmt = $con->execute("delete from zorba.workorderlabourlineitems where id = $lineitemid  and customer_id = $cid  ");
		$results = $stmt->fetchAll('assoc');
		return $results;
	}
}
