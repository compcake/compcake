<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Volunteers Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\HasMany $Judges
 * @property \Cake\ORM\Association\HasMany $Staff
 * @property \Cake\ORM\Association\HasMany $Stewards
 *
 * @method \App\Model\Entity\Volunteer get($primaryKey, $options = [])
 * @method \App\Model\Entity\Volunteer newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Volunteer[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Volunteer|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Volunteer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Volunteer[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Volunteer findOrCreate($search, callable $callback = null, $options = [])
 */
class VolunteersTable extends Table
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

        $this->table('volunteers');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Judges', [
            'foreignKey' => 'volunteer_id'
        ]);
        $this->hasMany('Staff', [
            'foreignKey' => 'volunteer_id'
        ]);
        $this->hasMany('Stewards', [
            'foreignKey' => 'volunteer_id'
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

        $validator
            ->allowEmpty('bjcp');

        $validator
            ->boolean('judge')
            ->allowEmpty('judge');

        $validator
            ->boolean('steward')
            ->allowEmpty('steward');

        $validator
            ->boolean('volunteer')
            ->allowEmpty('volunteer');

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
