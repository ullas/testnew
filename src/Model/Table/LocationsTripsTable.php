<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * LocationsTrips Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Trips
 * @property \Cake\ORM\Association\BelongsTo $Locations
 *
 * @method \App\Model\Entity\LocationsTrip get($primaryKey, $options = [])
 * @method \App\Model\Entity\LocationsTrip newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\LocationsTrip[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\LocationsTrip|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\LocationsTrip patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\LocationsTrip[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\LocationsTrip findOrCreate($search, callable $callback = null)
 */class LocationsTripsTable extends Table
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

        $this->table('locations_trips');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Trips', [
            'foreignKey' => 'trip_id'
        ]);
        $this->belongsTo('Locations', [
            'foreignKey' => 'location_id'
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
            ->integer('orderid')            ->allowEmpty('orderid');
        $validator
            ->time('SAT')            ->allowEmpty('SAT');
        $validator
            ->time('SDT')            ->allowEmpty('SDT');
        $validator
            ->integer('day_start_s')            ->allowEmpty('day_start_s');
        $validator
            ->integer('day_end_s')            ->allowEmpty('day_end_s');
        $validator
            ->dateTime('AAT')            ->allowEmpty('AAT');
        $validator
            ->dateTime('ADT')            ->allowEmpty('ADT');
        $validator
            ->dateTime('EDT')            ->allowEmpty('EDT');
        $validator
            ->dateTime('EAT')            ->allowEmpty('EAT');
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
        $rules->add($rules->existsIn(['trip_id'], 'Trips'));
        $rules->add($rules->existsIn(['location_id'], 'Locations'));

        return $rules;
    }
}
