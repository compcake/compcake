<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Stewards Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Volunteers
 * @property \Cake\ORM\Association\BelongsTo $Sessions
 * @property \Cake\ORM\Association\HasMany $Flights
 *
 * @method \App\Model\Entity\Steward get($primaryKey, $options = [])
 * @method \App\Model\Entity\Steward newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Steward[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Steward|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Steward patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Steward[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Steward findOrCreate($search, callable $callback = null, $options = [])
 */
class StewardsTable extends Table
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

        $this->table('stewards');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Volunteers', [
            'foreignKey' => 'volunteer_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Sessions', [
            'foreignKey' => 'session_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Flights', [
            'foreignKey' => 'steward_id'
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
            ->integer('id')
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
        $rules->add($rules->existsIn(['volunteer_id'], 'Volunteers'));
        $rules->add($rules->existsIn(['session_id'], 'Sessions'));

        return $rules;
    }
}
