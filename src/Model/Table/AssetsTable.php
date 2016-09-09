<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Assets Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Trackingobjects
 * @property \Cake\ORM\Association\BelongsTo $Assettypes
 * @property \Cake\ORM\Association\BelongsTo $Symbols
 * @property \Cake\ORM\Association\BelongsTo $Departments
 * @property \Cake\ORM\Association\BelongsTo $Stations
 * @property \Cake\ORM\Association\BelongsTo $Purposes
 *
 * @method \App\Model\Entity\Asset get($primaryKey, $options = [])
 * @method \App\Model\Entity\Asset newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Asset[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Asset|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Asset patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Asset[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Asset findOrCreate($search, callable $callback = null)
 */
class AssetsTable extends Table
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

        $this->table('assets');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('Trackingobjects', [
            'foreignKey' => 'trackingobject_id'
        ]);
        $this->belongsTo('Assettypes', [
            'foreignKey' => 'assettype_id'
        ]);
        $this->belongsTo('Symbols', [
            'foreignKey' => 'symbol_id'
        ]);
        $this->belongsTo('Departments', [
            'foreignKey' => 'department_id'
        ]);
        $this->belongsTo('Stations', [
            'foreignKey' => 'station_id'
        ]);
        $this->belongsTo('Purposes', [
            'foreignKey' => 'purpose_id'
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
            ->allowEmpty('location');

        $validator
            ->boolean('isstationary')
            ->allowEmpty('isstationary');

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
        $rules->add($rules->existsIn(['trackingobject_id'], 'Trackingobjects'));
        $rules->add($rules->existsIn(['assettype_id'], 'Assettypes'));
        $rules->add($rules->existsIn(['symbol_id'], 'Symbols'));
        $rules->add($rules->existsIn(['department_id'], 'Departments'));
        $rules->add($rules->existsIn(['station_id'], 'Stations'));
        $rules->add($rules->existsIn(['purpose_id'], 'Purposes'));

        return $rules;
    }
}
