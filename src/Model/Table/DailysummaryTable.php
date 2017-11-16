<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Datasource\ConnectionManager;

/**
 * Dailysummary Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Trackingobjects
 * @property \Cake\ORM\Association\BelongsTo $Customers
 *
 * @method \App\Model\Entity\Dailysummary get($primaryKey, $options = [])
 * @method \App\Model\Entity\Dailysummary newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Dailysummary[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Dailysummary|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Dailysummary patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Dailysummary[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Dailysummary findOrCreate($search, callable $callback = null)
 */
class DailysummaryTable extends Table
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

        $this->table('dailysummary');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Trackingobjects', [
            'foreignKey' => 'trackingobject_id'
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
            ->date('mdate')
            ->allowEmpty('mdate');

        $validator
            ->numeric('odometerstart')
            ->allowEmpty('odometerstart');

        $validator
            ->numeric('odometerend')
            ->allowEmpty('odometerend');

        $validator
            ->numeric('distance')
            ->allowEmpty('distance');

        $validator
            ->numeric('fuel')
            ->allowEmpty('fuel');

        $validator
            ->integer('runningtime')
            ->allowEmpty('runningtime');

        $validator
            ->integer('stoppedtime')
            ->allowEmpty('stoppedtime');

        $validator
            ->integer('parkedtime')
            ->allowEmpty('parkedtime');

        $validator
            ->numeric('idletime')
            ->allowEmpty('idletime');

        $validator
            ->integer('businesstime')
            ->allowEmpty('businesstime');

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
        $rules->add($rules->existsIn(['trackingobject_id'], 'Trackingobjects'));
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));

        return $rules;
    }

//Get the monthly sum of businesstime and fuel for displaying in chart in Dashboard
	public function getSumOfBtime($cid)
	{
		$con = ConnectionManager::get('default');
		$stmt = $con->execute("select   sum(dailysummary.businesstime) as sum1,date_trunc('month', mdate),sum(fuel) as sum2 from zorba.dailysummary  group by  date_trunc('month', mdate) order by date_trunc ");
		$results = $stmt->fetchAll('assoc');
		return $results;
	}
}
