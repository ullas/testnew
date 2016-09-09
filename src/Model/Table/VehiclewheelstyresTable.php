<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Vehiclewheelstyres Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Vehicles
 *
 * @method \App\Model\Entity\Vehiclewheelstyre get($primaryKey, $options = [])
 * @method \App\Model\Entity\Vehiclewheelstyre newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Vehiclewheelstyre[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Vehiclewheelstyre|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Vehiclewheelstyre patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Vehiclewheelstyre[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Vehiclewheelstyre findOrCreate($search, callable $callback = null)
 */
class VehiclewheelstyresTable extends Table
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

        $this->table('vehiclewheelstyres');
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
            ->allowEmpty('drivetype');

        $validator
            ->allowEmpty('breaksystem');

        $validator
            ->numeric('fronttrackwidth')
            ->allowEmpty('fronttrackwidth');

        $validator
            ->numeric('reartrackwidth')
            ->allowEmpty('reartrackwidth');

        $validator
            ->numeric('wheelbase')
            ->allowEmpty('wheelbase');

        $validator
            ->numeric('frontwheeldia')
            ->allowEmpty('frontwheeldia');

        $validator
            ->numeric('rearwheeldia')
            ->allowEmpty('rearwheeldia');

        $validator
            ->numeric('rearaxil')
            ->allowEmpty('rearaxil');

        $validator
            ->allowEmpty('fronttyretype');

        $validator
            ->numeric('fronttyrepsi')
            ->allowEmpty('fronttyrepsi');

        $validator
            ->allowEmpty('reartyretype');

        $validator
            ->numeric('reartyrepsi')
            ->allowEmpty('reartyrepsi');

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
