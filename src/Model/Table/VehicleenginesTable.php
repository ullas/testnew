<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Vehicleengines Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Vehicles
 *
 * @method \App\Model\Entity\Vehicleengine get($primaryKey, $options = [])
 * @method \App\Model\Entity\Vehicleengine newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Vehicleengine[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Vehicleengine|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Vehicleengine patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Vehicleengine[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Vehicleengine findOrCreate($search, callable $callback = null)
 */
class VehicleenginesTable extends Table
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

        $this->table('vehicleengines');
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
            ->allowEmpty('enginesummary');

        $validator
            ->allowEmpty('brand');

        $validator
            ->allowEmpty('aspiration');

        $validator
            ->allowEmpty('blocktype');

        $validator
            ->allowEmpty('bore');

        $validator
            ->allowEmpty('camtype');

        $validator
            ->numeric('compression')
            ->allowEmpty('compression');

        $validator
            ->integer('cylinders')
            ->allowEmpty('cylinders');

        $validator
            ->numeric('displacement')
            ->allowEmpty('displacement');

        $validator
            ->allowEmpty('fuel_induction');

        $validator
            ->allowEmpty('fuel_quality');

        $validator
            ->allowEmpty('max_hp');

        $validator
            ->allowEmpty('max_torque');

        $validator
            ->allowEmpty('redline_rpm');

        $validator
            ->allowEmpty('stroke');

        $validator
            ->integer('valves')
            ->allowEmpty('valves');

        $validator
            ->allowEmpty('transmission_summary');

        $validator
            ->allowEmpty('trasmission_brand');

        $validator
            ->allowEmpty('transmission_type');

        $validator
            ->allowEmpty('traasmission_gears');

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
