<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tripstatuses Model
 *
 * @property \Cake\ORM\Association\HasMany $Trips
 *
 * @method \App\Model\Entity\Tripstatus get($primaryKey, $options = [])
 * @method \App\Model\Entity\Tripstatus newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Tripstatus[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Tripstatus|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tripstatus patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Tripstatus[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Tripstatus findOrCreate($search, callable $callback = null)
 */
class TripstatusesTable extends Table
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

        $this->table('tripstatuses');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->hasMany('Trips', [
            'foreignKey' => 'tripstatus_id'
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
}
