<?php
namespace App\Model\Table;

use App\Model\Entity\Department;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Departments Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Faculties
 * @property \Cake\ORM\Association\BelongsTo $Contents
 * @property \Cake\ORM\Association\HasMany $Coursewares
 * @property \Cake\ORM\Association\HasMany $StaffProfiles
 * @property \Cake\ORM\Association\HasMany $StudentsAcademics
 */
class DepartmentsTable extends Table
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

        $this->table('departments');
        $this->displayField('name');
        $this->addBehavior('Search.Search');
        $this->searchManager()
            ->add('id', 'Search.Value', [
                'field' => $this->aliasField('id')
            ]);
        $this->searchManager()
            ->add('name', 'Search.Value', [
                'field' => $this->aliasField('name')
            ]);
        $this->searchManager()
            ->add('description', 'Search.Value', [
                'field' => $this->aliasField('description')
            ]);
        $this->searchManager()
            ->add('prospectus', 'Search.Value', [
                'field' => $this->aliasField('prospectus')
            ]);
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Faculties', [
            'foreignKey' => 'faculty_id'
        ]);
        $this->belongsTo('Contents', [
            'foreignKey' => 'content_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Coursewares', [
            'foreignKey' => 'department_id'
        ]);
        $this->hasMany('StaffProfiles', [
            'foreignKey' => 'department_id'
        ]);
        $this->hasMany('StudentsAcademics', [
            'foreignKey' => 'department_id'
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
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->allowEmpty('description');

        $validator
            ->allowEmpty('prospectus');

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
        $rules->add($rules->existsIn(['faculty_id'], 'Faculties'));
        $rules->add($rules->existsIn(['content_id'], 'Contents'));
        return $rules;
    }
}
