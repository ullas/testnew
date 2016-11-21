<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Deiveryorders Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Shipmenttypes
 * @property \Cake\ORM\Association\BelongsTo $Orderstates
 * @property \Cake\ORM\Association\BelongsTo $Distributioncenters
 * @property \Cake\ORM\Association\BelongsTo $Paymenttypes
 * @property \Cake\ORM\Association\BelongsTo $Pickupdeliverytypes
 * @property \Cake\ORM\Association\BelongsTo $Pickupdeliverybranches
 * @property \Cake\ORM\Association\BelongsTo $Pdlocationtypes
 * @property \Cake\ORM\Association\BelongsTo $Pdaacounts
 * @property \Cake\ORM\Association\BelongsTo $Retutrnbranches
 * @property \Cake\ORM\Association\BelongsTo $Customers
 *
 * @method \App\Model\Entity\Deiveryorder get($primaryKey, $options = [])
 * @method \App\Model\Entity\Deiveryorder newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Deiveryorder[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Deiveryorder|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Deiveryorder patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Deiveryorder[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Deiveryorder findOrCreate($search, callable $callback = null)
 */class DeiveryordersTable extends Table
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

        $this->table('deiveryorders');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Shipmenttypes', [
            'foreignKey' => 'shipmenttype_id'
        ]);
        $this->belongsTo('Orderstates', [
            'foreignKey' => 'orderstate_id'
        ]);
        $this->belongsTo('Distributioncenteres', [
            'foreignKey' => 'distributioncenter_id'
        ]);
        $this->belongsTo('Paymenttypes', [
            'foreignKey' => 'paymenttype_id'
        ]);
        $this->belongsTo('Pickupdeliverytypes', [
            'foreignKey' => 'pickupdeliverytype_id'
        ]);
        $this->belongsTo('Pickupdeliverybranches', [
            'foreignKey' => 'pickupdeliverybranch_id'
        ]);
        $this->belongsTo('Pdlocationtypes', [
            'foreignKey' => 'pdlocationtype_id'
        ]);
        $this->belongsTo('Pdaccounts', [
            'foreignKey' => 'pdaccount_id'
        ]);
        $this->belongsTo('Returnbranches', [
            'foreignKey' => 'returnbranch_id'
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
            ->allowEmpty('orderno');
        $validator
            ->allowEmpty('awbumber');
        $validator
            ->date('shipmentorderdate')            ->allowEmpty('shipmentorderdate');
        $validator
            ->numeric('packageweight')            ->allowEmpty('packageweight');
        $validator
            ->numeric('packagevolume')            ->allowEmpty('packagevolume');
        $validator
            ->numeric('packagevalue')            ->allowEmpty('packagevalue');
        $validator
            ->boolean('partialdeliveryallowed')            ->allowEmpty('partialdeliveryallowed');
        $validator
            ->boolean('returnallowed')            ->allowEmpty('returnallowed');
        $validator
            ->boolean('cancellationallowed')            ->allowEmpty('cancellationallowed');
        $validator
            ->integer('deliveryservicetime')            ->allowEmpty('deliveryservicetime');
        $validator
            ->date('deliverystarttimewindow')            ->allowEmpty('deliverystarttimewindow');
        $validator
            ->date('deliverydtimewindow')            ->allowEmpty('deliverydtimewindow');
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
        $rules->add($rules->existsIn(['shipmenttype_id'], 'Shipmenttypes'));
        $rules->add($rules->existsIn(['orderstate_id'], 'Orderstates'));
        $rules->add($rules->existsIn(['distributioncenter_id'], 'Distributioncenteres'));
        $rules->add($rules->existsIn(['paymenttype_id'], 'Paymenttypes'));
        $rules->add($rules->existsIn(['pickupdeliverytype_id'], 'Pickupdeliverytypes'));
        $rules->add($rules->existsIn(['pickupdeliverybranch_id'], 'Pickupdeliverybranches'));
        $rules->add($rules->existsIn(['pdlocationtype_id'], 'Pdlocationtypes'));
        $rules->add($rules->existsIn(['pdaccount_id'], 'Pdaccounts'));
        $rules->add($rules->existsIn(['returnbranch_id'], 'Returnbranches'));
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));

        return $rules;
    }
}
