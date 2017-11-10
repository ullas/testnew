<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Inspectionforms Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\HasMany $Inspectionitems
 * @property \Cake\ORM\Association\HasMany $Inspections
 * @property \Cake\ORM\Association\BelongsToMany $Inspectionitems
 *
 * @method \App\Model\Entity\Inspectionform get($primaryKey, $options = [])
 * @method \App\Model\Entity\Inspectionform newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Inspectionform[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Inspectionform|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Inspectionform patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Inspectionform[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Inspectionform findOrCreate($search, callable $callback = null)
 */
class InspectionformsTable extends Table
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

        $this->table('inspectionforms');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Inspectionitems', [
            'foreignKey' => 'inspectionform_id'
        ]);
        $this->hasMany('Inspections', [
            'foreignKey' => 'inspectionform_id'
        ]);
        $this->belongsToMany('Inspectionitems', [
            'foreignKey' => 'inspectionform_id',
            'targetForeignKey' => 'inspectionitem_id',
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
            ->allowEmpty('data');

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
