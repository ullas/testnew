<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


/**
 * Issues Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Vehicles
 * @property \Cake\ORM\Association\BelongsTo $Reportedbies
 * @property \Cake\ORM\Association\BelongsTo $Assignedtos
 * @property \Cake\ORM\Association\HasMany $Issuedocuments
 *
 * @method \App\Model\Entity\Issue get($primaryKey, $options = [])
 * @method \App\Model\Entity\Issue newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Issue[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Issue|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Issue patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Issue[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Issue findOrCreate($search, callable $callback = null)
 */
class IssuesTable extends Table
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

        $this->table('issues');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Vehicles', [
            'foreignKey' => 'vehicle_id'
        ]);
        $this->belongsTo('Reportedby', [
            'className' => 'Addresses',
            'foreignKey' => 'reportedby_id'
        ]);
        $this->belongsTo('Assignedtos', [
            'className' => 'Addresses',
            'foreignKey' => 'assignedto_id'
        ]);
        $this->hasMany('Issuedocuments', [
            'foreignKey' => 'issue_id'
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
            ->date('reportedon')
            ->allowEmpty('reportedon');

        $validator
            ->allowEmpty('summary');

        $validator
            ->allowEmpty('description');

        $validator
            ->numeric('odometer')
            ->allowEmpty('odometer');

        $validator
            ->allowEmpty('tags');

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
        $rules->add($rules->existsIn(['vehicle_id'], 'Vehicles'));
        $rules->add($rules->existsIn(['reportedby_id'], 'Reportedby'));
        $rules->add($rules->existsIn(['assignedto_id'], 'Assignedtos'));

        return $rules;
    }
	
}
