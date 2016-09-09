<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Vehicletypes Model
 *
 * @property \Cake\ORM\Association\HasMany $Vehicles
 *
 * @method \App\Model\Entity\Vehicletype get($primaryKey, $options = [])
 * @method \App\Model\Entity\Vehicletype newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Vehicletype[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Vehicletype|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Vehicletype patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Vehicletype[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Vehicletype findOrCreate($search, callable $callback = null)
 */
class VehicletypesTable extends Table
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

        $this->table('vehicletypes');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->hasMany('Vehicles', [
            'foreignKey' => 'vehicletype_id'
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
            ->allowEmpty('name');

        return $validator;
    }
}
