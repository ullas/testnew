<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Devices Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\BelongsTo $Providers
 * @property \Cake\ORM\Association\BelongsTo $Devicemodels
 * @property \Cake\ORM\Association\BelongsTo $Simcards
 * @property \Cake\ORM\Association\HasMany $Gpsdata
 * @property \Cake\ORM\Association\HasMany $Tracking
 *
 * @method \App\Model\Entity\Device get($primaryKey, $options = [])
 * @method \App\Model\Entity\Device newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Device[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Device|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Device patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Device[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Device findOrCreate($search, callable $callback = null)
 */
class DevicesTable extends Table
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

        $this->table('devices');
        $this->displayField('code');
        $this->primaryKey('id');

        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Providers', [
            'foreignKey' => 'provider_id'
        ]);
        $this->belongsTo('Devicemodels', [
            'foreignKey' => 'devicemodel_id'
        ]);
        $this->belongsTo('Simcards', [
            'foreignKey' => 'simcard_id'
        ]);
		$this->belongsTo('Distancetypes', [
            'foreignKey' => 'distancetype_id'
        ]);
		$this->hasOne('Sensormappings', [
            'foreignKey' => 'device_id',
            'dependent' => true
        ]);
		$this->hasMany('Gpsdata', [
            'foreignKey' => 'device_id'
        ]);
        $this->hasMany('Tracking', [
            'foreignKey' => 'device_id'
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
            ->allowEmpty('code');

        $validator
            ->date('install_date')
            ->allowEmpty('install_date');

        $validator
            ->allowEmpty('installed_by');

        $validator
            ->allowEmpty('certified_by');

        $validator
            ->allowEmpty('comments');

        $validator
            ->integer('distance_type')
            ->allowEmpty('distance_type');

        $validator
            ->boolean('odometersupport')
            ->allowEmpty('odometersupport');

        $validator
            ->integer('initodometer')
            ->allowEmpty('initodometer');

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
        $rules->add($rules->existsIn(['provider_id'], 'Providers'));
        $rules->add($rules->existsIn(['devicemodel_id'], 'Devicemodels'));
        $rules->add($rules->existsIn(['simcard_id'], 'Simcards'));

        return $rules;
    }
}
