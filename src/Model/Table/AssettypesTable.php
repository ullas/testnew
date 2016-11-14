<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Assettypes Model
 *
 * @property \Cake\ORM\Association\HasMany $Trackingobjects
 *
 * @method \App\Model\Entity\Assettype get($primaryKey, $options = [])
 * @method \App\Model\Entity\Assettype newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Assettype[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Assettype|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Assettype patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Assettype[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Assettype findOrCreate($search, callable $callback = null)
 */
class AssettypesTable extends Table
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

        $this->table('assettypes');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->hasMany('Trackingobjects', [
            'foreignKey' => 'assettype_id'
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
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('name');

        $validator
            ->allowEmpty('description');

        return $validator;
    }
	 public function buildRules(RulesChecker $rules)
    {
        
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));

        return $rules;
    }
}
