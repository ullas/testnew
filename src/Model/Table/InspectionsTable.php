<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Inspections Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Inspectionfoms
 * @property \Cake\ORM\Association\BelongsTo $Customers
 *
 * @method \App\Model\Entity\Inspection get($primaryKey, $options = [])
 * @method \App\Model\Entity\Inspection newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Inspection[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Inspection|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Inspection patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Inspection[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Inspection findOrCreate($search, callable $callback = null)
 */
class InspectionsTable extends Table
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

        $this->table('inspections');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('Inspectionfoms', [
            'foreignKey' => 'inspectionfom_id'
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
            ->allowEmpty('name');

        $validator
            ->allowEmpty('descriptions');

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
        $rules->add($rules->existsIn(['inspectionfom_id'], 'Inspectionfoms'));
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));

        return $rules;
    }
}
