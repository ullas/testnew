<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Vehiclespecifications Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Vehicles
 *
 * @method \App\Model\Entity\Vehiclespecification get($primaryKey, $options = [])
 * @method \App\Model\Entity\Vehiclespecification newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Vehiclespecification[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Vehiclespecification|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Vehiclespecification patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Vehiclespecification[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Vehiclespecification findOrCreate($search, callable $callback = null)
 */
class VehiclespecificationsTable extends Table
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

        $this->table('vehiclespecifications');
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
            ->numeric('width')
            ->allowEmpty('width');

        $validator
            ->numeric('height')
            ->allowEmpty('height');

        $validator
            ->numeric('length')
            ->allowEmpty('length');

        $validator
            ->numeric('interiorvolume')
            ->allowEmpty('interiorvolume');

        $validator
            ->numeric('passengervolume')
            ->allowEmpty('passengervolume');

        $validator
            ->numeric('cargovolume')
            ->allowEmpty('cargovolume');

        $validator
            ->numeric('groudclearance')
            ->allowEmpty('groudclearance');

        $validator
            ->numeric('bedlength')
            ->allowEmpty('bedlength');

        $validator
            ->numeric('curbweight')
            ->allowEmpty('curbweight');

        $validator
            ->numeric('grossweight')
            ->allowEmpty('grossweight');

        $validator
            ->numeric('towingcapacity')
            ->allowEmpty('towingcapacity');

        $validator
            ->numeric('epacity')
            ->allowEmpty('epacity');

        $validator
            ->numeric('epahighway')
            ->allowEmpty('epahighway');

        $validator
            ->numeric('epacombined')
            ->allowEmpty('epacombined');

        $validator
            ->integer('maxpayload')
            ->allowEmpty('maxpayload');

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
