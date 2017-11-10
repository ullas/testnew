<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Inspectionitems Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Inspectionitemtypes
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\BelongsTo $Inspectionforms
 * @property \Cake\ORM\Association\BelongsToMany $Inspectionforms
 *
 * @method \App\Model\Entity\Inspectionitem get($primaryKey, $options = [])
 * @method \App\Model\Entity\Inspectionitem newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Inspectionitem[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Inspectionitem|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Inspectionitem patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Inspectionitem[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Inspectionitem findOrCreate($search, callable $callback = null)
 */
class InspectionitemsTable extends Table
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

        $this->table('inspectionitems');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('Inspectionitemtypes', [
            'foreignKey' => 'inspectionitemtype_id'
        ]);
        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id'
        ]);
        $this->belongsTo('Inspectionforms', [
            'foreignKey' => 'inspectionform_id'
        ]);
        $this->belongsToMany('Inspectionforms', [
            'foreignKey' => 'inspectionitem_id',
            'targetForeignKey' => 'inspectionform_id',
            'joinTable' => 'inspectionforms_inspectionitems'
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

        $validator
            ->boolean('required')
            ->allowEmpty('required');

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
        $rules->add($rules->existsIn(['inspectionitemtype_id'], 'Inspectionitemtypes'));
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));
        $rules->add($rules->existsIn(['inspectionform_id'], 'Inspectionforms'));

        return $rules;
    }
}
