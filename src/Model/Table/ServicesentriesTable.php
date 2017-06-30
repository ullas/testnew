<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Servicesentries Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Vehicles
 * @property \Cake\ORM\Association\BelongsTo $Vendors
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\HasMany $Servicecompleted
 * @property \Cake\ORM\Association\HasMany $Servicedocuments
 *
 * @method \App\Model\Entity\Servicesentry get($primaryKey, $options = [])
 * @method \App\Model\Entity\Servicesentry newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Servicesentry[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Servicesentry|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Servicesentry patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Servicesentry[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Servicesentry findOrCreate($search, callable $callback = null)
 */
class ServicesentriesTable extends Table
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

        $this->table('servicesentries');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('Vehicles', [
            'foreignKey' => 'vehicle_id'
        ]);
        $this->belongsTo('Vendors', [
            'foreignKey' => 'vendor_id'
        ]);
        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Servicecompleted', [
            'foreignKey' => 'servicesentry_id'
        ]);
        $this->hasMany('Servicedocuments', [
            'foreignKey' => 'servicesentry_id'
        ]);
		$this->belongsToMany('Servicetasks', [
            'foreignKey' => 'servicesentry_id',
            'targetForeignKey' => 'servicetask_id',
            'joinTable' => 'servicetasks_servicesentries'
        ]);
		$this->belongsToMany('Issues', [
            'foreignKey' => 'servicesentry_id',
            'targetForeignKey' => 'issue_id',
            'joinTable' => 'issues_servicesentries'
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
            ->numeric('odo')
            ->allowEmpty('odo');

        $validator
            ->allowEmpty('refer');

        $validator
            ->numeric('labour')
            ->allowEmpty('labour');

        $validator
            ->allowEmpty('parts');

        $validator
            ->numeric('tax')
            ->allowEmpty('tax');

        $validator
            ->boolean('markasvoid')
            ->allowEmpty('markasvoid');

        $validator
            ->allowEmpty('comments');

        $validator
            ->date('dateofservice')
            ->allowEmpty('dateofservice');

        $validator
            ->allowEmpty('name');

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
        $rules->add($rules->existsIn(['vendor_id'], 'Vendors'));
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));

        return $rules;
    }
}
