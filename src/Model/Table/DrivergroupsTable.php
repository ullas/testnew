<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Drivergroups Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Defaultdrivers
 * @property \Cake\ORM\Association\BelongsToMany $Drivers
 *
 * @method \App\Model\Entity\Drivergroup get($primaryKey, $options = [])
 * @method \App\Model\Entity\Drivergroup newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Drivergroup[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Drivergroup|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Drivergroup patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Drivergroup[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Drivergroup findOrCreate($search, callable $callback = null)
 */
class DrivergroupsTable extends Table
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

        $this->table('drivergroups');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('Defaultdrivers', [
            'className'=>'Drivers',
            'foreignKey' => 'defaultdriver_id'
        ]);
		$this->belongsTo('Customers', [
            'foreignKey' => 'customer_id'
        ]);
        $this->belongsToMany('Drivers', [
            'foreignKey' => 'drivergroup_id',
            'targetForeignKey' => 'driver_id',
            'joinTable' => 'drivers_drivergroups'
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
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->allowEmpty('description');

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
        $rules->add($rules->existsIn(['defaultdriver_id'], 'Defaultdrivers'));

        return $rules;
    }
}
