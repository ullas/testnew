<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Datasource\ConnectionManager;

/**
 * Workorders Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Workorderstatuses
 * @property \Cake\ORM\Association\BelongsTo $Vehicles
 * @property \Cake\ORM\Association\BelongsTo $Vendors
 * @property \Cake\ORM\Association\BelongsTo $Issuedbies
 * @property \Cake\ORM\Association\BelongsTo $Assignedbies
 * @property \Cake\ORM\Association\BelongsTo $Assigntos
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\HasMany $Issues
 * @property \Cake\ORM\Association\HasMany $Workorderdocuments
 * @property \Cake\ORM\Association\HasMany $Workorderlabourlineitems
 * @property \Cake\ORM\Association\HasMany $Workorderlineitems
 * @property \Cake\ORM\Association\HasMany $Workorderpartslineitems
 *
 * @method \App\Model\Entity\Workorder get($primaryKey, $options = [])
 * @method \App\Model\Entity\Workorder newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Workorder[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Workorder|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Workorder patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Workorder[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Workorder findOrCreate($search, callable $callback = null)
 */
class WorkordersTable extends Table
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

        $this->table('workorders');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Workorderstatuses', [
            'foreignKey' => 'workorderstatus_id'
        ]);
        $this->belongsTo('Vehicles', [
            'foreignKey' => 'vehicle_id'
        ]);
        $this->belongsTo('Vendors', [
            'foreignKey' => 'vendor_id'
        ]);
        $this->belongsTo('Issuedbies', [
        	'className' =>'Addresses',
            'foreignKey' => 'issuedby_id'
        ]);
        $this->belongsTo('Assignedbies', [
        	'className' =>'Addresses',
            'foreignKey' => 'assignedby_id'
        ]);
        $this->belongsTo('Assigntos', [
        	'className' =>'Addresses',
            'foreignKey' => 'assignto_id'
        ]);
        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Issues', [
            'foreignKey' => 'workorder_id'
        ]);
        $this->hasMany('Workorderdocuments', [
            'foreignKey' => 'workorder_id'
        ]);
        $this->hasMany('Workorderlabourlineitems', [
            'foreignKey' => 'workorder_id'
        ]);
        $this->hasMany('Workorderlineitems', [
            'foreignKey' => 'workorder_id'
        ]);
        $this->hasMany('Workorderpartslineitems', [
            'foreignKey' => 'workorder_id'
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
            ->date('issuedate')
            ->allowEmpty('issuedate');

        $validator
            ->date('startdate')
            ->allowEmpty('startdate');

        $validator
            ->allowEmpty('lables');

        $validator
            ->numeric('odometer')
            ->allowEmpty('odometer');

        $validator
            ->boolean('void')
            ->allowEmpty('void');

        $validator
            ->date('completiondate')
            ->allowEmpty('completiondate');

        $validator
            ->numeric('labour')
            ->allowEmpty('labour');

        $validator
            ->numeric('parts')
            ->allowEmpty('parts');

        $validator
            ->numeric('dicount')
            ->allowEmpty('dicount');

        $validator
            ->numeric('tax')
            ->allowEmpty('tax');

        $validator
            ->allowEmpty('invoicenumber');

        $validator
            ->allowEmpty('description');

        $validator
            ->allowEmpty('phonenumber');

        $validator
            ->integer('taxtype')
            ->allowEmpty('taxtype');

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
        $rules->add($rules->existsIn(['workorderstatus_id'], 'Workorderstatuses'));
        $rules->add($rules->existsIn(['vehicle_id'], 'Vehicles'));
        $rules->add($rules->existsIn(['vendor_id'], 'Vendors'));
        $rules->add($rules->existsIn(['issuedby_id'], 'Issuedbies'));
        $rules->add($rules->existsIn(['assignedby_id'], 'Assignedbies'));
        $rules->add($rules->existsIn(['assignto_id'], 'Assigntos'));
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));

        return $rules;
    }
	
	public function updateWorkordersAfterItemsDeletion($cid,$wid,$labour,$parts)
	{
		$con = ConnectionManager::get('default');
		$stmt = $con->execute("update zorba.workorders set labour = $labour, parts = $parts  where id = $wid and customer_id = $cid ");
		$results = $stmt->fetchAll('assoc');
		return $results;
	}
	
	//set the status as close for selected workorders in datatable
	public function setClose($cid,$wid)
	{
		$con = ConnectionManager::get('default');
		$stmt = $con->execute("update zorba.workorders SET workorderstatus_id = 4 WHERE id  = $wid and customer_id = $cid");
		$results = $stmt->fetchAll('assoc');
		return $results;
		
	}
	
	public function setClose2($cid,$wid)
	{
		$con = ConnectionManager::get('default');
		$stmt = $con->execute('select * from zorba.workorders WHERE id  = $wid ');
		$results = $stmt ->fetchAll('assoc');
		
		
		
		return $results;
		
	}
}
