<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Timepolicies Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\HasMany $Schedules
 * @property \Cake\ORM\Association\HasMany $Trips
 *
 * @method \App\Model\Entity\Timepolicy get($primaryKey, $options = [])
 * @method \App\Model\Entity\Timepolicy newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Timepolicy[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Timepolicy|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Timepolicy patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Timepolicy[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Timepolicy findOrCreate($search, callable $callback = null)
 */
class TimepoliciesTable extends Table
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

        $this->table('timepolicies');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Schedules', [
            'foreignKey' => 'timepolicy_id'
        ]);
        $this->hasMany('Trips', [
            'foreignKey' => 'timepolicy_id'
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
            ->allowEmpty('name');

        $validator
            ->boolean('sunday')
            ->allowEmpty('sunday');

        $validator
            ->boolean('monday')
            ->allowEmpty('monday');

        $validator
            ->boolean('tuesday')
            ->allowEmpty('tuesday');

        $validator
            ->boolean('wednesday')
            ->allowEmpty('wednesday');

        $validator
            ->boolean('thursday')
            ->allowEmpty('thursday');

        $validator
            ->boolean('friday')
            ->allowEmpty('friday');

        $validator
            ->boolean('saturday')
            ->allowEmpty('saturday');

        $validator
            ->time('sun_start_time')
            ->allowEmpty('sun_start_time');

        $validator
            ->time('sun_end_time')
            ->allowEmpty('sun_end_time');

        $validator
            ->time('mon_start_time')
            ->allowEmpty('mon_start_time');

        $validator
            ->time('mon_end_time')
            ->allowEmpty('mon_end_time');

        $validator
            ->time('tue_start_time')
            ->allowEmpty('tue_start_time');

        $validator
            ->time('tue_end_time')
            ->allowEmpty('tue_end_time');

        $validator
            ->time('wed_start_time')
            ->allowEmpty('wed_start_time');

        $validator
            ->time('wed_end_time')
            ->allowEmpty('wed_end_time');

        $validator
            ->time('thu_start_time')
            ->allowEmpty('thu_start_time');

        $validator
            ->time('thu_end_time')
            ->allowEmpty('thu_end_time');

        $validator
            ->time('fri_start_time')
            ->allowEmpty('fri_start_time');

        $validator
            ->time('fri_end_time')
            ->allowEmpty('fri_end_time');

        $validator
            ->time('sat_start_time')
            ->allowEmpty('sat_start_time');

        $validator
            ->time('sat_end_time')
            ->allowEmpty('sat_end_time');

        $validator
            ->boolean('ev')
            ->allowEmpty('ev');

        $validator
            ->allowEmpty('id', 'create');

        $validator
            ->boolean('system')
            ->allowEmpty('system');

        $validator
            ->boolean('enabled')
            ->allowEmpty('enabled');

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
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));

        return $rules;
    }
}
