<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * JudgesFlights Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Judges
 * @property \Cake\ORM\Association\BelongsTo $Flights
 *
 * @method \App\Model\Entity\JudgesFlight get($primaryKey, $options = [])
 * @method \App\Model\Entity\JudgesFlight newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\JudgesFlight[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\JudgesFlight|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\JudgesFlight patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\JudgesFlight[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\JudgesFlight findOrCreate($search, callable $callback = null, $options = [])
 */
class JudgesFlightsTable extends Table
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

        $this->table('judges_flights');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Judges', [
            'foreignKey' => 'judge_id',
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
        $rules->add($rules->existsIn(['judge_id'], 'Judges'));
        $rules->add($rules->existsIn(['flight_id'], 'Flights'));

        return $rules;
    }
}
