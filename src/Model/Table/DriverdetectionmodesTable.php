<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Driverdetectionmodes Model
 *
 * @property \Cake\ORM\Association\HasMany $Vehicles
 *
 * @method \App\Model\Entity\Driverdetectionmode get($primaryKey, $options = [])
 * @method \App\Model\Entity\Driverdetectionmode newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Driverdetectionmode[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Driverdetectionmode|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Driverdetectionmode patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Driverdetectionmode[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Driverdetectionmode findOrCreate($search, callable $callback = null)
 */
class DriverdetectionmodesTable extends Table
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

        $this->table('driverdetectionmodes');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->hasMany('Vehicles', [
            'foreignKey' => 'driverdetectionmode_id'
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

        return $validator;
    }
}
