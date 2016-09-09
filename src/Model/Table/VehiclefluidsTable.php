<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Vehiclefluids Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Vehicles
 *
 * @method \App\Model\Entity\Vehiclefluid get($primaryKey, $options = [])
 * @method \App\Model\Entity\Vehiclefluid newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Vehiclefluid[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Vehiclefluid|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Vehiclefluid patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Vehiclefluid[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Vehiclefluid findOrCreate($search, callable $callback = null)
 */
class VehiclefluidsTable extends Table
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

        $this->table('vehiclefluids');
        $this->displayField('id');
        $this->primaryKey('id');

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
            ->integer('fueltype')
            ->allowEmpty('fueltype');

        $validator
            ->allowEmpty('fuelquality');

        $validator
            ->numeric('fueltank1_capacity')
            ->allowEmpty('fueltank1_capacity');

        $validator
            ->numeric('fueltank2_capacity')
            ->allowEmpty('fueltank2_capacity');

        $validator
            ->numeric('oil_capacity')
            ->allowEmpty('oil_capacity');

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

        return $rules;
    }
}
