<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Sensormappings Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Devices
 * @property \Cake\ORM\Association\BelongsTo $Customers
 *
 * @method \App\Model\Entity\Sensormapping get($primaryKey, $options = [])
 * @method \App\Model\Entity\Sensormapping newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Sensormapping[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Sensormapping|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Sensormapping patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Sensormapping[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Sensormapping findOrCreate($search, callable $callback = null)
 */class SensormappingsTable extends Table
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

        $this->table('sensormappings');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Devices', [
            'foreignKey' => 'device_id'
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
            ->integer('AI0')            ->allowEmpty('AI0');
        $validator
            ->integer('AI1')            ->allowEmpty('AI1');
        $validator
            ->integer('AI2')            ->allowEmpty('AI2');
        $validator
            ->integer('AI3')            ->allowEmpty('AI3');
        $validator
            ->integer('AI4')            ->allowEmpty('AI4');
        $validator
            ->integer('AI5')            ->allowEmpty('AI5');
        $validator
            ->integer('AI6')            ->allowEmpty('AI6');
        $validator
            ->integer('AI7')            ->allowEmpty('AI7');
        $validator
            ->integer('DI0')            ->allowEmpty('DI0');
        $validator
            ->integer('DI1')            ->allowEmpty('DI1');
        $validator
            ->integer('DI2')            ->allowEmpty('DI2');
        $validator
            ->integer('DI3')            ->allowEmpty('DI3');
        $validator
            ->integer('DI4')            ->allowEmpty('DI4');
        $validator
            ->integer('DI5')            ->allowEmpty('DI5');
        $validator
            ->integer('DI6')            ->allowEmpty('DI6');
        $validator
            ->integer('DI7')            ->allowEmpty('DI7');
        $validator
            ->integer('AO0')            ->allowEmpty('AO0');
        $validator
            ->integer('AO1')            ->allowEmpty('AO1');
        $validator
            ->integer('AO2')            ->allowEmpty('AO2');
        $validator
            ->integer('AO3')            ->allowEmpty('AO3');
        $validator
            ->integer('AO4')            ->allowEmpty('AO4');
        $validator
            ->integer('AO5')            ->allowEmpty('AO5');
        $validator
            ->integer('AO6')            ->allowEmpty('AO6');
        $validator
            ->integer('AO7')            ->allowEmpty('AO7');
        $validator
            ->integer('DO0')            ->allowEmpty('DO0');
        $validator
            ->integer('DO1')            ->allowEmpty('DO1');
        $validator
            ->integer('DO2')            ->allowEmpty('DO2');
        $validator
            ->integer('DO3')            ->allowEmpty('DO3');
        $validator
            ->integer('DO4')            ->allowEmpty('DO4');
        $validator
            ->integer('DO5')            ->allowEmpty('DO5');
        $validator
            ->integer('DO6')            ->allowEmpty('DO6');
        $validator
            ->integer('DO7')            ->allowEmpty('DO7');
        $validator
            ->numeric('AI0_VAL1')            ->allowEmpty('AI0_VAL1');
        $validator
            ->numeric('AI1_VAL1')            ->allowEmpty('AI1_VAL1');
        $validator
            ->numeric('AI2_VAL1')            ->allowEmpty('AI2_VAL1');
        $validator
            ->numeric('AI3_VAL1')            ->allowEmpty('AI3_VAL1');
        $validator
            ->numeric('AI4_VAL1')            ->allowEmpty('AI4_VAL1');
        $validator
            ->numeric('AI5_VAL1')            ->allowEmpty('AI5_VAL1');
        $validator
            ->numeric('AI6_VAL1')            ->allowEmpty('AI6_VAL1');
        $validator
            ->numeric('AI7_VAL1')            ->allowEmpty('AI7_VAL1');
        $validator
            ->numeric('AI0_VAL2')            ->allowEmpty('AI0_VAL2');
        $validator
            ->numeric('AI1_VAL2')            ->allowEmpty('AI1_VAL2');
        $validator
            ->numeric('AI2_VAL2')            ->allowEmpty('AI2_VAL2');
        $validator
            ->numeric('AI3_VAL2')            ->allowEmpty('AI3_VAL2');
        $validator
            ->numeric('AI4_VAL2')            ->allowEmpty('AI4_VAL2');
        $validator
            ->numeric('AI5_VAL2')            ->allowEmpty('AI5_VAL2');
        $validator
            ->numeric('AI6_VAL2')            ->allowEmpty('AI6_VAL2');
        $validator
            ->numeric('AI7_VAL2')            ->allowEmpty('AI7_VAL2');
        $validator
            ->integer('AI0_TYPE')            ->allowEmpty('AI0_TYPE');
        $validator
            ->integer('AI1_TYPE')            ->allowEmpty('AI1_TYPE');
        $validator
            ->integer('AI2_TYPE')            ->allowEmpty('AI2_TYPE');
        $validator
            ->integer('AI3_TYPE')            ->allowEmpty('AI3_TYPE');
        $validator
            ->integer('AI4_TYPE')            ->allowEmpty('AI4_TYPE');
        $validator
            ->integer('AI5_TYPE')            ->allowEmpty('AI5_TYPE');
        $validator
            ->integer('AI6_TYPE')            ->allowEmpty('AI6_TYPE');
        $validator
            ->integer('AI7_TYPE')            ->allowEmpty('AI7_TYPE');
        $validator
            ->integer('DI0_TYPE')            ->allowEmpty('DI0_TYPE');
        $validator
            ->integer('DI1_TYPE')            ->allowEmpty('DI1_TYPE');
        $validator
            ->integer('DI2_TYPE')            ->allowEmpty('DI2_TYPE');
        $validator
            ->integer('DI3_TYPE')            ->allowEmpty('DI3_TYPE');
        $validator
            ->integer('DI4_TYPE')            ->allowEmpty('DI4_TYPE');
        $validator
            ->integer('DI5_TYPE')            ->allowEmpty('DI5_TYPE');
        $validator
            ->integer('DI6_TYPE')            ->allowEmpty('DI6_TYPE');
        $validator
            ->integer('DI7_TYPE')            ->allowEmpty('DI7_TYPE');
        $validator
            ->numeric('AI0_REF')            ->allowEmpty('AI0_REF');
        $validator
            ->numeric('AI1_REF')            ->allowEmpty('AI1_REF');
        $validator
            ->numeric('AI2_REF')            ->allowEmpty('AI2_REF');
        $validator
            ->numeric('AI3_REF')            ->allowEmpty('AI3_REF');
        $validator
            ->numeric('AI4_REF')            ->allowEmpty('AI4_REF');
        $validator
            ->numeric('AI5_REF')            ->allowEmpty('AI5_REF');
        $validator
            ->numeric('AI6_REF')            ->allowEmpty('AI6_REF');
        $validator
            ->numeric('AI7_REF')            ->allowEmpty('AI7_REF');
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
        $rules->add($rules->existsIn(['device_id'], 'Devices'));
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));

        return $rules;
    }
}
