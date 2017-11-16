<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * InspectionsInspectionitems Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Inspections
 * @property \Cake\ORM\Association\BelongsTo $Inspectionitems
 * @property \Cake\ORM\Association\BelongsTo $Inspectionitemtypes
 *
 * @method \App\Model\Entity\InspectionsInspectionitem get($primaryKey, $options = [])
 * @method \App\Model\Entity\InspectionsInspectionitem newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\InspectionsInspectionitem[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\InspectionsInspectionitem|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\InspectionsInspectionitem patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\InspectionsInspectionitem[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\InspectionsInspectionitem findOrCreate($search, callable $callback = null)
 */
class InspectionsInspectionitemsTable extends Table
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

        $this->table('inspections_inspectionitems');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('Inspections', [
            'foreignKey' => 'inspection_id'
        ]);
        $this->belongsTo('Inspectionitems', [
            'foreignKey' => 'inspectionitem_id'
        ]);
        $this->belongsTo('Inspectionitemtypes', [
            'foreignKey' => 'inspectionitemtype_id'
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
           
            ->allowEmpty('passfailvalue');

        $validator
            ->allowEmpty('meterentryvalue');

        $validator
            ->allowEmpty('textvalue');

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
        $rules->add($rules->existsIn(['inspection_id'], 'Inspections'));
        $rules->add($rules->existsIn(['inspectionitem_id'], 'Inspectionitems'));
        $rules->add($rules->existsIn(['inspectionitemtype_id'], 'Inspectionitemtypes'));

        return $rules;
    }
}
