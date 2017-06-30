<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Datasource\ConnectionManager;
/**
 * Issues Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Vehicles
 * @property \Cake\ORM\Association\BelongsTo $Reportedbies
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\BelongsTo $Workorders
 * @property \Cake\ORM\Association\BelongsTo $Servicesentries
 * @property \Cake\ORM\Association\BelongsTo $Issuestatuses
 * @property \Cake\ORM\Association\HasMany $Issuedocuments
 * @property \Cake\ORM\Association\HasMany $Workorderlineitems
 * @property \Cake\ORM\Association\BelongsToMany $Addresses
 *
 * @method \App\Model\Entity\Issue get($primaryKey, $options = [])
 * @method \App\Model\Entity\Issue newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Issue[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Issue|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Issue patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Issue[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Issue findOrCreate($search, callable $callback = null)
 */
class IssuesTable extends Table
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

        $this->table('issues');
        $this->displayField('summary');
        $this->primaryKey('id');

        $this->belongsTo('Vehicles', [
            'foreignKey' => 'vehicle_id'
        ]);
        $this->belongsTo('Reportedbies', [
            'className' =>'Addresses',
            'foreignKey' => 'reportedby_id'
        ]);
        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id'
        ]);
        $this->belongsTo('Workorders', [
            'foreignKey' => 'workorder_id'
        ]);
        $this->belongsTo('Servicesentries', [
            'foreignKey' => 'servicesentry_id'
        ]);
        $this->belongsTo('Issuestatuses', [
            'foreignKey' => 'issuestatus_id'
        ]);
        $this->hasMany('Issuedocuments', [
            'foreignKey' => 'issue_id'
        ]);
        $this->hasMany('Workorderlineitems', [
            'foreignKey' => 'issue_id'
        ]);
        $this->belongsToMany('Addresses', [
            'foreignKey' => 'issue_id',
            'targetForeignKey' => 'address_id',
            'joinTable' => 'issues_addresses'
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
            ->date('reportedon')
            ->allowEmpty('reportedon');

        $validator
            ->allowEmpty('summary');

        $validator
            ->allowEmpty('description');

        $validator
            ->numeric('odometer')
            ->allowEmpty('odometer');

        $validator
            ->allowEmpty('tags');

        $validator
            ->date('duedate')
            ->allowEmpty('duedate');

        $validator
            ->integer('overdueodometer')
            ->allowEmpty('overdueodometer');

        $validator
            ->boolean('markasvoid')
            ->allowEmpty('markasvoid');

        $validator
            ->integer('documentcount')
            ->allowEmpty('documentcount');

        $validator
            ->integer('commentscount')
            ->allowEmpty('commentscount');

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
        $rules->add($rules->existsIn(['vehicle_id'], 'Vehicles'));
        $rules->add($rules->existsIn(['reportedby_id'], 'Reportedbies'));
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));
        $rules->add($rules->existsIn(['workorder_id'], 'Workorders'));
        $rules->add($rules->existsIn(['servicesentry_id'], 'Servicesentries'));
        $rules->add($rules->existsIn(['issuestatus_id'], 'Issuestatuses'));

        return $rules;
    }
	
	//Change status of resolved issues as 'Resolved' in Issues table when saving a serviceentry
	public function updateIssuesFromServiceentries($cid,$issueid)
	{
		$con = ConnectionManager::get('default');
		// $stmt = $con->execute("update zorba.issues SET issuestatus_id = 3 WHERE id  = ? ",[$issueid],['integer']);
	    $stmt = $con->execute("update zorba.issues SET issuestatus_id = 3 WHERE id  = $issueid ");
		$results = $stmt->fetchAll('assoc');
		return $results;
	}
	
	//Change status of resolved issues as 'Open' in Issues table when deleting a serviceentry
	public function changeStatus($cid,$issueid)
	{
		$con = ConnectionManager::get('default');
		// $stmt = $con->execute("update zorba.issues SET issuestatus_id = 3 WHERE id  = ? ",[$issueid],['integer']);
	    $stmt = $con->execute("update zorba.issues SET issuestatus_id = 1 WHERE id  = $issueid ");
		$results = $stmt->fetchAll('assoc');
		return $results;
	}

	//Change status of  issues as 'Closed' in Issues table when clcking Close button in Issues Index table
	public function changeStatusClose($cid,$issueid)
	{
		$con = ConnectionManager::get('default');
		// $stmt = $con->execute("update zorba.issues SET issuestatus_id = 3 WHERE id  = ? ",[$issueid],['integer']);
	    $stmt = $con->execute("update zorba.issues SET issuestatus_id = 4 WHERE id  = $issueid ");
		$results = $stmt->fetchAll('assoc');
		return $results;
	}
}
