<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * InspectionformsInspectionitems Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Inspectionforms
 * @property \Cake\ORM\Association\BelongsTo $Inspectionitems
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\BelongsTo $Vehicles
 *
 * @method \App\Model\Entity\InspectionformsInspectionitem get($primaryKey, $options = [])
 * @method \App\Model\Entity\InspectionformsInspectionitem newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\InspectionformsInspectionitem[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\InspectionformsInspectionitem|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\InspectionformsInspectionitem patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\InspectionformsInspectionitem[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\InspectionformsInspectionitem findOrCreate($search, callable $callback = null)
 */
class InspectionformsInspectionitemsTable extends Table
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

        $this->table('inspectionforms_inspectionitems');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Inspectionforms', [
            'foreignKey' => 'inspectionform_id'
        ]);
        $this->belongsTo('Inspectionitems', [
            'foreignKey' => 'inspectionitem_id'
        ]);
        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id'
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
        $rules->add($rules->existsIn(['inspectionform_id'], 'Inspectionforms'));
        $rules->add($rules->existsIn(['inspectionitem_id'], 'Inspectionitems'));
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));
        $rules->add($rules->existsIn(['vehicle_id'], 'Vehicles'));

        return $rules;
    }
}
