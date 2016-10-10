<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VehiclesDrivers Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Vehicles
 * @property \Cake\ORM\Association\BelongsTo $Drivers
 * @property \Cake\ORM\Association\BelongsTo $Customers
 *
 * @method \App\Model\Entity\VehiclesDriver get($primaryKey, $options = [])
 * @method \App\Model\Entity\VehiclesDriver newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\VehiclesDriver[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VehiclesDriver|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VehiclesDriver patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\VehiclesDriver[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\VehiclesDriver findOrCreate($search, callable $callback = null)
 */
class VehiclesDriversTable extends Table
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

        $this->table('vehicles_drivers');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Vehicles', [
            'foreignKey' => 'vehicle_id'
        ]);
        $this->belongsTo('Drivers', [
            'foreignKey' => 'driver_id'
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
        $rules->add($rules->existsIn(['driver_id'], 'Drivers'));
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));

        return $rules;
    }
}
