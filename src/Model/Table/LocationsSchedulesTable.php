<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * LocationsSchedules Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Schedules
 * @property \Cake\ORM\Association\BelongsTo $Locations
 *
 * @method \App\Model\Entity\LocationsSchedule get($primaryKey, $options = [])
 * @method \App\Model\Entity\LocationsSchedule newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\LocationsSchedule[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\LocationsSchedule|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\LocationsSchedule patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\LocationsSchedule[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\LocationsSchedule findOrCreate($search, callable $callback = null)
 */class LocationsSchedulesTable extends Table
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

        $this->table('locations_schedules');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Schedules', [
            'foreignKey' => 'schedule_id'
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
            ->integer('day_end')            ->allowEmpty('day_end');
        $validator
            ->integer('day_start')            ->allowEmpty('day_start');
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
        $rules->add($rules->existsIn(['schedule_id'], 'Schedules'));
        $rules->add($rules->existsIn(['location_id'], 'Locations'));

        return $rules;
    }
}
