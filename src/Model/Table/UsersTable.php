<?php
namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Query;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \Cake\ORM\Association\HasMany $Entries
 * @property \Cake\ORM\Association\BelongsToMany $Roles
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 */
class UsersTable extends AppTable
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

        $this->table('users');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->hasMany('Entries');
        $this->belongsToMany('Roles', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'role_id',
            'joinTable' => 'users_roles'
        ]);
    }

    public function findAll(Query $query, array $options)
    {
        return $query->contain(['Roles']);
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
        return $query->where(['id' => $this->getUserId()]);
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
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email')
            ->add('email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('password');

        $validator
            ->requirePresence('confirm_password', 'create')
            ->notEmpty('confirm_password')
            ->add('confirm_password', 'passwordConfirm',
                ['rule' => [$this, 'passwordConfirm'], 'message' => 'Password and Confirmation must match']);

        return $validator;
    }

    public function passwordConfirm($value, $context)
    {
        if (empty($value) && empty($context['data']['password'])) {
            return true;
        }
        return $value === $context['data']['password'];
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
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }
}
