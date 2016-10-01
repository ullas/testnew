<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Trackingobjects Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Assettypes
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\HasMany $Alerts
 * @property \Cake\ORM\Association\HasMany $Assets
 * @property \Cake\ORM\Association\HasMany $Fences
 * @property \Cake\ORM\Association\HasMany $Gpsdata
 * @property \Cake\ORM\Association\HasMany $Jobs
 * @property \Cake\ORM\Association\HasMany $People
 * @property \Cake\ORM\Association\HasMany $Routes
 * @property \Cake\ORM\Association\HasMany $Tracking
 * @property \Cake\ORM\Association\HasMany $Vehicles
 * @property \Cake\ORM\Association\BelongsToMany $Groups
 *
 * @method \App\Model\Entity\Trackingobject get($primaryKey, $options = [])
 * @method \App\Model\Entity\Trackingobject newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Trackingobject[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Trackingobject|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Trackingobject patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Trackingobject[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Trackingobject findOrCreate($search, callable $callback = null)
 */
class TrackingobjectsTable extends Table
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

        $this->table('trackingobjects');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('Assettypes', [
            'foreignKey' => 'assettype_id'
        ]);
        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Alerts', [
            'foreignKey' => 'trackingobject_id'
        ]);
        $this->hasMany('Assets', [
            'foreignKey' => 'trackingobject_id'
        ]);
        $this->hasMany('Fences', [
            'foreignKey' => 'trackingobject_id'
        ]);
        $this->hasMany('Gpsdata', [
            'foreignKey' => 'trackingobject_id'
        ]);
        $this->hasMany('Jobs', [
            'foreignKey' => 'trackingobject_id'
        ]);
        $this->hasMany('People', [
            'foreignKey' => 'trackingobject_id'
        ]);
        $this->hasMany('Routes', [
            'foreignKey' => 'trackingobject_id'
        ]);
        $this->hasMany('Tracking', [
            'foreignKey' => 'trackingobject_id'
        ]);
        $this->hasMany('Vehicles', [
            'foreignKey' => 'trackingobject_id'
        ]);
        $this->belongsToMany('Groups', [
            'foreignKey' => 'trackingobject_id',
            'targetForeignKey' => 'group_id',
            'joinTable' => 'trackingobjects_groups'
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
            ->dateTime('created_date')
            ->allowEmpty('created_date');

        $validator
            ->dateTime('modifield_date')
            ->allowEmpty('modifield_date');

        $validator
            ->boolean('public_asset')
            ->allowEmpty('public_asset');

        $validator
            ->boolean('is_active')
            ->allowEmpty('is_active');

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
        $rules->add($rules->existsIn(['assettype_id'], 'Assettypes'));
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));

        return $rules;
    }
}
