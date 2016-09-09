<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Distributionlists Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\BelongsToMany $Addresses
 *
 * @method \App\Model\Entity\Distributionlist get($primaryKey, $options = [])
 * @method \App\Model\Entity\Distributionlist newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Distributionlist[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Distributionlist|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Distributionlist patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Distributionlist[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Distributionlist findOrCreate($search, callable $callback = null)
 */
class DistributionlistsTable extends Table
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

        $this->table('distributionlists');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id'
        ]);
        $this->belongsToMany('Addresses', [
            'foreignKey' => 'distributionlist_id',
            'targetForeignKey' => 'address_id',
            'joinTable' => 'distributionlists_addresses'
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
            ->allowEmpty('id', 'create');

        $validator
            ->boolean('system')
            ->allowEmpty('system');

        $validator
            ->boolean('enabled')
            ->allowEmpty('enabled');

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
