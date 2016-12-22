<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Analogsensortypes Model
 *
 * @method \App\Model\Entity\Analogsensortype get($primaryKey, $options = [])
 * @method \App\Model\Entity\Analogsensortype newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Analogsensortype[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Analogsensortype|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Analogsensortype patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Analogsensortype[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Analogsensortype findOrCreate($search, callable $callback = null)
 */class AnalogsensortypesTable extends Table
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

        $this->table('analogsensortypes');
        $this->displayField('name');
        $this->primaryKey('id');
		
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
            ->allowEmpty('name');
        $validator
            ->allowEmpty('description');
        $validator
            ->allowEmpty('icon');
        $validator
            ->allowEmpty('unit');
        $validator
            ->allowEmpty('id', 'create');
        $validator
            ->allowEmpty('atmessage');
        $validator
            ->allowEmpty('btmessage');
        $validator
            ->allowEmpty('irmessage');
        $validator
            ->allowEmpty('ormessage');
        return $validator;
    }
}
