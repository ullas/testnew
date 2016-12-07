<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Vehicleoperationslimit Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Vehices
 * @property \Cake\ORM\Association\BelongsTo $IButtons
 *
 * @method \App\Model\Entity\Vehicleoperationslimit get($primaryKey, $options = [])
 * @method \App\Model\Entity\Vehicleoperationslimit newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Vehicleoperationslimit[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Vehicleoperationslimit|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Vehicleoperationslimit patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Vehicleoperationslimit[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Vehicleoperationslimit findOrCreate($search, callable $callback = null)
 */
class VehicleoperationslimitTable extends Table
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

        $this->table('vehicleoperationslimit');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Vehicles', [
            'foreignKey' => 'vehice_id'
        ]);
        $this->belongsTo('IButtons', [
            'foreignKey' => 'iButton_id'
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
            ->integer('speed_limit')
            ->allowEmpty('speed_limit');

        $validator
            ->integer('battery_voltage')
            ->allowEmpty('battery_voltage');

        $validator
            ->numeric('accelarationlimit')
            ->allowEmpty('accelarationlimit');

        $validator
            ->numeric('breakinglimit')
            ->allowEmpty('breakinglimit');

        $validator
            ->numeric('crashlimit')
            ->allowEmpty('crashlimit');

        $validator
            ->numeric('shutlimit')
            ->allowEmpty('shutlimit');

        $validator
            ->numeric('continiousruntime')
            ->allowEmpty('continiousruntime');

        $validator
            ->allowEmpty('odometer_offset');

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
        $rules->add($rules->existsIn(['vehice_id'], 'Vehicles'));
        $rules->add($rules->existsIn(['iButton_id'], 'IButtons'));

        return $rules;
    }
}
