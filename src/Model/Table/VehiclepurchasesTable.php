<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Vehiclepurchases Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Vendors
 * @property \Cake\ORM\Association\BelongsTo $Currencies
 * @property \Cake\ORM\Association\BelongsTo $Vehicles
 *
 * @method \App\Model\Entity\Vehiclepurchase get($primaryKey, $options = [])
 * @method \App\Model\Entity\Vehiclepurchase newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Vehiclepurchase[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Vehiclepurchase|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Vehiclepurchase patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Vehiclepurchase[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Vehiclepurchase findOrCreate($search, callable $callback = null)
 */
class VehiclepurchasesTable extends Table
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

        $this->table('vehiclepurchases');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Vendors', [
            'foreignKey' => 'vendor_id'
        ]);
        $this->belongsTo('Currencies', [
            'foreignKey' => 'currency_id'
        ]);
        $this->belongsTo('Vehicles', [
            'foreignKey' => 'vehicle_id'
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
            ->integer('price')
            ->allowEmpty('price');

        $validator
            ->date('purchasedate')
            ->allowEmpty('purchasedate');

        $validator
            ->numeric('purchasepodometer')
            ->allowEmpty('purchasepodometer');

        $validator
            ->date('warrantyexpdate')
            ->allowEmpty('warrantyexpdate');

        $validator
            ->integer('warrentyexpmeter')
            ->allowEmpty('warrentyexpmeter');

        $validator
            ->allowEmpty('comments');

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
        $rules->add($rules->existsIn(['vendor_id'], 'Vendors'));
        $rules->add($rules->existsIn(['currency_id'], 'Currencies'));
        $rules->add($rules->existsIn(['vehicle_id'], 'Vehicles'));

        return $rules;
    }
}
