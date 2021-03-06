<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Addresses Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\HasMany $Drivers
 * @property \Cake\ORM\Association\BelongsToMany $Distributionlists
 *
 * @method \App\Model\Entity\Address get($primaryKey, $options = [])
 * @method \App\Model\Entity\Address newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Address[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Address|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Address patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Address[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Address findOrCreate($search, callable $callback = null)
 */
class AddressesTable extends Table
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

        $this->table('addresses');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Drivers', [
            'foreignKey' => 'address_id'
        ]);
        $this->belongsToMany('Distributionlists', [
            'foreignKey' => 'address_id',
            'targetForeignKey' => 'distributionlist_id',
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
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('name')
			->notEmpty('name');
			

        $validator
            ->allowEmpty('designation');

        $validator
            ->email('email')
			->requirePresence('name')
            ->notEmpty('email');

        $validator
            ->requirePresence('mobile')
            ->notEmpty('mobile');

        $validator
            ->allowEmpty('apartment');

        $validator
            ->allowEmpty('streetname');

        $validator
            ->allowEmpty('landmark');

        $validator
            ->allowEmpty('areaname');

        $validator
            ->allowEmpty('countryshortcode');

        $validator
            ->allowEmpty('stateshortcode');

        $validator
            ->allowEmpty('city');

        $validator
            ->allowEmpty('pincode');

        $validator
            ->boolean('iscurrentAddress')
            ->allowEmpty('iscurrentAddress');

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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));

        return $rules;
    }
}
