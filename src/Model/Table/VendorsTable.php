<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Vendors Model
 *
 * @property \Cake\ORM\Association\HasMany $Vehiclepurchases
 *
 * @method \App\Model\Entity\Vendor get($primaryKey, $options = [])
 * @method \App\Model\Entity\Vendor newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Vendor[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Vendor|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Vendor patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Vendor[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Vendor findOrCreate($search, callable $callback = null)
 */
class VendorsTable extends Table
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

        $this->table('vendors');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->hasMany('Vehiclepurchases', [
            'foreignKey' => 'vendor_id'
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
           ->notEmpty('name', 'Please fill this field');
			

        $validator
            ->allowEmpty('phone');

        $validator
            ->allowEmpty('website');

        $validator
            ->allowEmpty('address');

        $validator
            ->allowEmpty('addressline2');

        $validator
            ->allowEmpty('city');

        $validator
            ->allowEmpty('state');

        $validator
            ->allowEmpty('zippostal');

        $validator
            ->allowEmpty('country');

        $validator
            ->allowEmpty('contactname');

        $validator
            ->email('email')
			//->notEmpty('email', 'Please fill this field');
            ->allowEmpty('email');

        $validator
            ->allowEmpty('contactphone');

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
       // $rules->add($rules->isUnique(['email']));

        return $rules;
    }
}
