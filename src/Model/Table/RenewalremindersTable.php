<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Renewalreminders Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Renewalstypes
 * @property \Cake\ORM\Association\BelongsTo $Distributionlists
 * @property \Cake\ORM\Association\BelongsTo $Groups
 * @property \Cake\ORM\Association\BelongsTo $Customers
 *
 * @method \App\Model\Entity\Renewalreminder get($primaryKey, $options = [])
 * @method \App\Model\Entity\Renewalreminder newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Renewalreminder[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Renewalreminder|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Renewalreminder patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Renewalreminder[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Renewalreminder findOrCreate($search, callable $callback = null)
 */
class RenewalremindersTable extends Table
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

        $this->table('renewalreminders');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Renewalstypes', [
            'foreignKey' => 'renewalstype_id'
        ]);
        $this->belongsTo('Distributionlists', [
            'foreignKey' => 'distributionlist_id'
        ]);
        $this->belongsTo('Groups', [
            'foreignKey' => 'group_id'
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
            ->integer('duedate')
            ->allowEmpty('duedate');

        $validator
            ->integer('timethreashold')
            ->allowEmpty('timethreashold');

        $validator
            ->boolean('notificationrequired')
            ->allowEmpty('notificationrequired');

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
        $rules->add($rules->existsIn(['renewalstype_id'], 'Renewalstypes'));
        $rules->add($rules->existsIn(['distributionlist_id'], 'Distributionlists'));
        $rules->add($rules->existsIn(['group_id'], 'Groups'));
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));

        return $rules;
    }
}
