<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Servicereminders Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Servicetasks
 * @property \Cake\ORM\Association\BelongsTo $Distributionlists
 * @property \Cake\ORM\Association\BelongsTo $Groups
 * @property \Cake\ORM\Association\BelongsTo $Customers
 *
 * @method \App\Model\Entity\Servicereminder get($primaryKey, $options = [])
 * @method \App\Model\Entity\Servicereminder newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Servicereminder[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Servicereminder|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Servicereminder patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Servicereminder[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Servicereminder findOrCreate($search, callable $callback = null)
 */
class ServiceremindersTable extends Table
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

        $this->table('servicereminders');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Servicetasks', [
            'foreignKey' => 'servicetask_id'
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
            ->integer('meterinterval')
            ->allowEmpty('meterinterval');

        $validator
            ->integer('daysinterval')
            ->allowEmpty('daysinterval');

        $validator
            ->integer('meterthreshold')
            ->allowEmpty('meterthreshold');

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
        $rules->add($rules->existsIn(['servicetask_id'], 'Servicetasks'));
        $rules->add($rules->existsIn(['distributionlist_id'], 'Distributionlists'));
        $rules->add($rules->existsIn(['group_id'], 'Groups'));
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));

        return $rules;
    }
}
