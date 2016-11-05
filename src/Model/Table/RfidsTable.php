<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Rfids Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\BelongsTo $Drivers
 * @property \Cake\ORM\Association\BelongsTo $Passengers
 *
 * @method \App\Model\Entity\Rfid get($primaryKey, $options = [])
 * @method \App\Model\Entity\Rfid newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Rfid[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Rfid|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Rfid patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Rfid[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Rfid findOrCreate($search, callable $callback = null)
 */
class RfidsTable extends Table
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

        $this->table('rfids');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Drivers', [
            'foreignKey' => 'driver_id'
        ]);
        $this->belongsTo('Passengers', [
            'foreignKey' => 'passenger_id'
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
            ->requirePresence('code', 'create')
            ->notEmpty('code');

        $validator
            ->allowEmpty('description');

        $validator
            ->boolean('privatekey')
            ->allowEmpty('privatekey');

        $validator
            ->date('dateofpurchase')
            ->allowEmpty('dateofpurchase');

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
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));
        $rules->add($rules->existsIn(['driver_id'], 'Drivers'));
        $rules->add($rules->existsIn(['passenger_id'], 'Passengers'));

        return $rules;
    }
}
