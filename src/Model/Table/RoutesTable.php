<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Routes Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Vehicles
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $Groups
 * @property \Cake\ORM\Association\HasMany $Schedules
 * @property \Cake\ORM\Association\HasMany $Trips
 *
 * @method \App\Model\Entity\Route get($primaryKey, $options = [])
 * @method \App\Model\Entity\Route newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Route[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Route|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Route patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Route[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Route findOrCreate($search, callable $callback = null)
 */
class RoutesTable extends Table
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

        $this->table('routes');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('Vehicles', [
            'foreignKey' => 'vehicle_id'
        ]);
        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
        $this->belongsTo('Groups', [
            'foreignKey' => 'group_id'
        ]);
        $this->hasMany('Schedules', [
            'foreignKey' => 'route_id'
        ]);
        $this->hasMany('Trips', [
            'foreignKey' => 'route_id'
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('start_point');

        $validator
            ->allowEmpty('end_point');

        $validator
            ->allowEmpty('the_geom');

        $validator
            ->integer('buffer_size')
            ->allowEmpty('buffer_size');

        $validator
            ->allowEmpty('name');

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
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['group_id'], 'Groups'));

        return $rules;
    }
}
