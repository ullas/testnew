<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Passengergroups Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\HasMany $Trips
 * @property \Cake\ORM\Association\BelongsToMany $Passengers
 *
 * @method \App\Model\Entity\Passengergroup get($primaryKey, $options = [])
 * @method \App\Model\Entity\Passengergroup newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Passengergroup[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Passengergroup|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Passengergroup patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Passengergroup[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Passengergroup findOrCreate($search, callable $callback = null)
 */
class PassengergroupsTable extends Table
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

        $this->table('passengergroups');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Trips', [
            'foreignKey' => 'passengergroup_id'
        ]);
        $this->belongsToMany('Passengers', [
            'foreignKey' => 'passengergroup_id',
            'targetForeignKey' => 'passenger_id',
            'joinTable' => 'passengergroups_passengers'
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

        $validator
            ->allowEmpty('description');

        $validator
            ->boolean('system')
            ->allowEmpty('system');

        $validator
            ->boolean('enabled')
            ->allowEmpty('enabled');

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
