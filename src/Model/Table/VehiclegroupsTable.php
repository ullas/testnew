<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Vehiclegroups Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Defaultvehicles
 *
 * @method \App\Model\Entity\Vehiclegroup get($primaryKey, $options = [])
 * @method \App\Model\Entity\Vehiclegroup newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Vehiclegroup[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Vehiclegroup|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Vehiclegroup patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Vehiclegroup[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Vehiclegroup findOrCreate($search, callable $callback = null)
 */
class VehiclegroupsTable extends Table
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

        $this->table('vehiclegroups');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('Defaultvehicles', [
            'className' => 'Vehicles',
            'foreignKey' => 'defaultvehicle_id'
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
        $rules->add($rules->existsIn(['defaultvehicle_id'], 'Defaultvehicles'));

        return $rules;
    }
}
