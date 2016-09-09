<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Assetgroups Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Defaultassets
 *
 * @method \App\Model\Entity\Assetgroup get($primaryKey, $options = [])
 * @method \App\Model\Entity\Assetgroup newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Assetgroup[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Assetgroup|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Assetgroup patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Assetgroup[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Assetgroup findOrCreate($search, callable $callback = null)
 */
class AssetgroupsTable extends Table
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

        $this->table('assetgroups');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('Defaultassets', [
            'className' => 'Assets',
            'foreignKey' => 'defaultasset_id'
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
        $rules->add($rules->existsIn(['defaultasset_id'], 'Defaultassets'));

        return $rules;
    }
}
