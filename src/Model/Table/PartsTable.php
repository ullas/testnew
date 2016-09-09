<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Parts Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Partcategories
 * @property \Cake\ORM\Association\BelongsTo $Manufacturers
 * @property \Cake\ORM\Association\BelongsTo $Measurementunits
 * @property \Cake\ORM\Association\BelongsTo $Stations
 *
 * @method \App\Model\Entity\Part get($primaryKey, $options = [])
 * @method \App\Model\Entity\Part newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Part[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Part|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Part patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Part[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Part findOrCreate($search, callable $callback = null)
 */
class PartsTable extends Table
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

        $this->table('parts');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Partcategories', [
            'foreignKey' => 'partcategory_id'
        ]);
        $this->belongsTo('Manufacturers', [
            'foreignKey' => 'manufacturer_id'
        ]);
        $this->belongsTo('Measurementunits', [
            'foreignKey' => 'measurementunit_id'
        ]);
        $this->belongsTo('Stations', [
            'foreignKey' => 'station_id'
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
            ->allowEmpty('partno');

        $validator
            ->allowEmpty('manufacturerpartno');

        $validator
            ->allowEmpty('description');

        $validator
            ->numeric('upc')
            ->allowEmpty('upc');

        $validator
            ->numeric('cost')
            ->allowEmpty('cost');

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
        $rules->add($rules->existsIn(['partcategory_id'], 'Partcategories'));
        $rules->add($rules->existsIn(['manufacturer_id'], 'Manufacturers'));
        $rules->add($rules->existsIn(['measurementunit_id'], 'Measurementunits'));
        $rules->add($rules->existsIn(['station_id'], 'Stations'));

        return $rules;
    }
}
