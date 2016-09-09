<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Customers Model
 *
 * @property \Cake\ORM\Association\HasMany $Departments
 * @property \Cake\ORM\Association\HasMany $Drivers
 * @property \Cake\ORM\Association\HasMany $Gpsdata
 * @property \Cake\ORM\Association\HasMany $Ownerships
 * @property \Cake\ORM\Association\HasMany $Purposes
 * @property \Cake\ORM\Association\HasMany $Stations
 * @property \Cake\ORM\Association\HasMany $Symbols
 * @property \Cake\ORM\Association\HasMany $Trackingobjects
 *
 * @method \App\Model\Entity\Customer get($primaryKey, $options = [])
 * @method \App\Model\Entity\Customer newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Customer[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Customer|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Customer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Customer[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Customer findOrCreate($search, callable $callback = null)
 */
class CustomersTable extends Table
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

        $this->table('customers');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->hasMany('Departments', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Drivers', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Gpsdata', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Ownerships', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Purposes', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Stations', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Symbols', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Trackingobjects', [
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

        return $validator;
    }
}
