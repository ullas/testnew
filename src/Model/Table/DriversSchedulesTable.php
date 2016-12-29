<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DriversSchedules Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Drivers
 * @property \Cake\ORM\Association\BelongsTo $Schedules
 *
 * @method \App\Model\Entity\DriversSchedule get($primaryKey, $options = [])
 * @method \App\Model\Entity\DriversSchedule newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DriversSchedule[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DriversSchedule|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DriversSchedule patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DriversSchedule[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DriversSchedule findOrCreate($search, callable $callback = null)
 */class DriversSchedulesTable extends Table
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

        $this->table('drivers_schedules');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Drivers', [
            'foreignKey' => 'driver_id'
        ]);
        $this->belongsTo('Schedules', [
            'foreignKey' => 'schedule_id'
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
        $rules->add($rules->existsIn(['driver_id'], 'Drivers'));
        $rules->add($rules->existsIn(['schedule_id'], 'Schedules'));

        return $rules;
    }
}
