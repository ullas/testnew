<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Eventtypes Model
 *
 * @property \Cake\ORM\Association\HasMany $Gpsdata
 *
 * @method \App\Model\Entity\Eventtype get($primaryKey, $options = [])
 * @method \App\Model\Entity\Eventtype newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Eventtype[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Eventtype|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Eventtype patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Eventtype[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Eventtype findOrCreate($search, callable $callback = null)
 */
class EventtypesTable extends Table
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

        $this->table('eventtypes');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->hasMany('Gpsdata', [
            'foreignKey' => 'eventtype_id'
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
            ->integer('code')
            ->allowEmpty('code');

        $validator
            ->integer('provider')
            ->allowEmpty('provider');

        $validator
            ->allowEmpty('name');

        $validator
            ->allowEmpty('model');

        return $validator;
    }
}
