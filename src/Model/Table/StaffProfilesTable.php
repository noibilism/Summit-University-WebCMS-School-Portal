<?php
namespace App\Model\Table;

use App\Model\Entity\StaffProfile;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * StaffProfiles Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $Faculties
 * @property \Cake\ORM\Association\BelongsTo $Departments
 * @property \Cake\ORM\Association\BelongsTo $Units
 */
class StaffProfilesTable extends Table
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

        $this->table('staff_profiles');
        $this->displayField('title');
        $this->addBehavior('Search.Search');
        $this->searchManager()
            ->add('id', 'Search.Value', [
                'field' => $this->aliasField('id')
            ]);
        $this->searchManager()
            ->add('title', 'Search.Value', [
                'field' => $this->aliasField('title')
            ]);
        $this->searchManager()
            ->add('first_name', 'Search.Value', [
                'field' => $this->aliasField('first_name')
            ]);
        $this->searchManager()
            ->add('middle_name', 'Search.Value', [
                'field' => $this->aliasField('middle_name')
            ]);
        $this->searchManager()
            ->add('last_name', 'Search.Value', [
                'field' => $this->aliasField('last_name')
            ]);
        $this->searchManager()
            ->add('sex', 'Search.Value', [
                'field' => $this->aliasField('sex')
            ]);
        $this->searchManager()
            ->add('profile', 'Search.Value', [
                'field' => $this->aliasField('profile')
            ]);
        $this->searchManager()
            ->add('pix', 'Search.Value', [
                'field' => $this->aliasField('pix')
            ]);
        $this->searchManager()
            ->add('staff_type', 'Search.Value', [
                'field' => $this->aliasField('staff_type')
            ]);
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
        $this->belongsTo('Faculties', [
            'foreignKey' => 'faculty_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Departments', [
            'foreignKey' => 'department_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Units', [
            'foreignKey' => 'unit_id',
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

        $validator
            ->notEmpty('title');

        $validator
            ->notEmpty('first_name');

        $validator
            ->notEmpty('middle_name');

        $validator
            ->notEmpty('last_name');

        $validator
            ->notEmpty('sex');

        $validator
            ->notEmpty('profile');

        $validator
            ->allowEmpty('pix');

        $validator
            ->integer('staff_type')
            ->notEmpty('staff_type');

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
        $rules->add($rules->existsIn(['faculty_id'], 'Faculties'));
        $rules->add($rules->existsIn(['department_id'], 'Departments'));
        $rules->add($rules->existsIn(['unit_id'], 'Units'));
        return $rules;
    }
}
