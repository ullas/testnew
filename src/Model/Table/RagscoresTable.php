<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Ragscores Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Customers
 *
 * @method \App\Model\Entity\Ragscore get($primaryKey, $options = [])
 * @method \App\Model\Entity\Ragscore newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Ragscore[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Ragscore|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ragscore patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Ragscore[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Ragscore findOrCreate($search, callable $callback = null)
 */
class RagscoresTable extends Table
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

        $this->table('ragscores');
        $this->displayField('id');
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
            ->allowEmpty('id', 'create');

        $validator
            ->numeric('distance')
            ->allowEmpty('distance');

        $validator
            ->allowEmpty('driver_code');

        $validator
            ->date('idate')
            ->allowEmpty('idate');

        $validator
            ->integer('ose')
            ->allowEmpty('ose');

        $validator
            ->integer('oste')
            ->allowEmpty('oste');

        $validator
            ->integer('hbe')
            ->allowEmpty('hbe');

        $validator
            ->integer('eae')
            ->allowEmpty('eae');

        $validator
            ->integer('pbe')
            ->allowEmpty('pbe');

        $validator
            ->integer('nde')
            ->allowEmpty('nde');

        $validator
            ->integer('ede')
            ->allowEmpty('ede');

        $validator
            ->integer('dte')
            ->allowEmpty('dte');

        $validator
            ->integer('maxspeed')
            ->allowEmpty('maxspeed');

        $validator
            ->integer('duration')
            ->allowEmpty('duration');

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

        return $rules;
    }
}
