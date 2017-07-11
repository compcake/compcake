<?php
namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;

/**
 * Entries Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsToMany $Flights
 *
 * @method \App\Model\Entity\Entry get($primaryKey, $options = [])
 * @method \App\Model\Entity\Entry newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Entry[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Entry|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Entry patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Entry[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Entry findOrCreate($search, callable $callback = null, $options = [])
 */
class EntriesTable extends Table
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

        $this->table('entries');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('Flights', [
            'foreignKey' => 'entry_id',
            'targetForeignKey' => 'flight_id',
            'joinTable' => 'entries_flights'
        ]);
    }

    /**
     * Custom finder that will filter results by the logged in user's user ID.
     *
     * @param Query $query
     * @param array $options
     * @return mixed
     */
    public function findFilterByCurrentUser(Query $query, array $options)
    {
        $users = TableRegistry::get('Users');
        return $query->where(['user_id' => $users->getUserId()]);
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

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->allowEmpty('description');

        $validator
            ->allowEmpty('special_ingredients');

        $validator
            ->requirePresence('style', 'create')
            ->notEmpty('style');

        $validator
            ->integer('judge_number')
            ->allowEmpty('judge_number');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
