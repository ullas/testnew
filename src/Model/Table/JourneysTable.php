<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Journeys Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Trackingobjects
 *
 * @method \App\Model\Entity\Journey get($primaryKey, $options = [])
 * @method \App\Model\Entity\Journey newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Journey[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Journey|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Journey patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Journey[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Journey findOrCreate($search, callable $callback = null)
 */
class JourneysTable extends Table
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

        $this->table('journeys');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Trackingobjects', [
            'foreignKey' => 'trackingobject_id'
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
            ->dateTime('start_time')
            ->allowEmpty('start_time');

        $validator
            ->dateTime('end_time')
            ->allowEmpty('end_time');

        $validator
            ->allowEmpty('id', 'create');

        $validator
            ->numeric('maxspeed')
            ->allowEmpty('maxspeed');

        $validator
            ->numeric('idletime')
            ->allowEmpty('idletime');

        $validator
            ->allowEmpty('start_loc');

        $validator
            ->allowEmpty('end_loc');

        $validator
            ->numeric('averagespeed')
            ->allowEmpty('averagespeed');

        $validator
            ->numeric('distance')
            ->allowEmpty('distance');

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
        $rules->add($rules->existsIn(['trackingobject_id'], 'Trackingobjects'));

        return $rules;
    }
}
