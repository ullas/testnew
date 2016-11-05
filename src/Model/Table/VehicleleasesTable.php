<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Vehicleleases Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Vendors
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\BelongsTo $Vehicles
 *
 * @method \App\Model\Entity\Vehiclelease get($primaryKey, $options = [])
 * @method \App\Model\Entity\Vehiclelease newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Vehiclelease[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Vehiclelease|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Vehiclelease patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Vehiclelease[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Vehiclelease findOrCreate($search, callable $callback = null)
 */
class VehicleleasesTable extends Table
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

        $this->table('vehicleleases');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Vendors', [
            'foreignKey' => 'vendor_id'
        ]);
        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id'
        ]);
        $this->belongsTo('Vehicles', [
            'foreignKey' => 'vehicle_id'
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
            ->numeric('maonthypayment')
            ->allowEmpty('maonthypayment');

        $validator
            ->date('startdate')
            ->allowEmpty('startdate');

        $validator
            ->date('enddate')
            ->allowEmpty('enddate');

        $validator
            ->numeric('amountfinanced')
            ->allowEmpty('amountfinanced');

        $validator
            ->numeric('interestrate')
            ->allowEmpty('interestrate');

        $validator
            ->numeric('residualvalue')
            ->allowEmpty('residualvalue');

        $validator
            ->decimal('accountnumber')
            ->allowEmpty('accountnumber');

        $validator
            ->allowEmpty('ifsccode');

        $validator
            ->allowEmpty('swiftcode');

        $validator
            ->allowEmpty('notes');

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
        $rules->add($rules->existsIn(['vendor_id'], 'Vendors'));
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));
        $rules->add($rules->existsIn(['vehicle_id'], 'Vehicles'));

        return $rules;
    }
}
