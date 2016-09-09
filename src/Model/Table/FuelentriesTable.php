<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Fuelentries Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Vehicles
 * @property \Cake\ORM\Association\BelongsTo $Vendors
 * @property \Cake\ORM\Association\HasMany $Fueldouments
 * @property \Cake\ORM\Association\HasMany $Fuelphotos
 *
 * @method \App\Model\Entity\Fuelentry get($primaryKey, $options = [])
 * @method \App\Model\Entity\Fuelentry newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Fuelentry[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Fuelentry|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Fuelentry patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Fuelentry[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Fuelentry findOrCreate($search, callable $callback = null)
 */
class FuelentriesTable extends Table
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

        $this->table('fuelentries');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Vehicles', [
            'foreignKey' => 'vehicle_id'
        ]);
        $this->belongsTo('Vendors', [
            'foreignKey' => 'vendor_id'
        ]);
        $this->hasMany('Fueldouments', [
            'foreignKey' => 'fuelentry_id'
        ]);
        $this->hasMany('Fuelphotos', [
            'foreignKey' => 'fuelentry_id'
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
            ->date('date')
            ->allowEmpty('date');

        $validator
            ->numeric('odometer')
            ->allowEmpty('odometer');

        $validator
            ->numeric('priceperusnit')
            ->allowEmpty('priceperusnit');

        $validator
            ->allowEmpty('fueltype');

        $validator
            ->allowEmpty('ref');

        $validator
            ->boolean('partialfill')
            ->allowEmpty('partialfill');

        $validator
            ->allowEmpty('markaspersonal');

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

        return $rules;
    }
}
