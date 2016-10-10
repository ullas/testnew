<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * IssuesAddresses Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Issues
 * @property \Cake\ORM\Association\BelongsTo $Addresses
 *
 * @method \App\Model\Entity\IssuesAddress get($primaryKey, $options = [])
 * @method \App\Model\Entity\IssuesAddress newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\IssuesAddress[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\IssuesAddress|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\IssuesAddress patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\IssuesAddress[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\IssuesAddress findOrCreate($search, callable $callback = null)
 */
class IssuesAddressesTable extends Table
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

        $this->table('issues_addresses');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Issues', [
            'foreignKey' => 'issue_id'
        ]);
        $this->belongsTo('Addresses', [
            'foreignKey' => 'address_id'
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
        $rules->add($rules->existsIn(['issue_id'], 'Issues'));
        $rules->add($rules->existsIn(['address_id'], 'Addresses'));

        return $rules;
    }
}
