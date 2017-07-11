<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * EntriesFlights Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Entries
 * @property \Cake\ORM\Association\BelongsTo $Flights
 *
 * @method \App\Model\Entity\EntriesFlight get($primaryKey, $options = [])
 * @method \App\Model\Entity\EntriesFlight newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\EntriesFlight[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\EntriesFlight|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EntriesFlight patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\EntriesFlight[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\EntriesFlight findOrCreate($search, callable $callback = null, $options = [])
 */
class EntriesFlightsTable extends Table
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

        $this->table('entries_flights');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Entries', [
            'foreignKey' => 'entry_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Flights', [
            'foreignKey' => 'flight_id',
            'joinType' => 'INNER'
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
        $rules->add($rules->existsIn(['entry_id'], 'Entries'));
        $rules->add($rules->existsIn(['flight_id'], 'Flights'));

        return $rules;
    }
}
