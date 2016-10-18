<?php
namespace App\Model\Table;

use App\Model\Entity\StudentsAcademic;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * StudentsAcademics Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Students
 * @property \Cake\ORM\Association\BelongsTo $Faculties
 * @property \Cake\ORM\Association\BelongsTo $Departments
 */
class StudentsAcademicsTable extends Table
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

        $this->table('students_academics');
        $this->displayField('id');
        $this->addBehavior('Search.Search');
        $this->searchManager()
            ->add('id', 'Search.Value', [
                'field' => $this->aliasField('id')
            ]);
        $this->searchManager()
            ->add('level', 'Search.Value', [
                'field' => $this->aliasField('level')
            ]);
        $this->searchManager()
            ->add('matric_no', 'Search.Value', [
                'field' => $this->aliasField('matric_no')
            ]);
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Students', [
            'foreignKey' => 'student_id'
        ]);
        $this->belongsTo('Faculties', [
            'foreignKey' => 'faculty_id'
        ]);
        $this->belongsTo('Departments', [
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
            ->requirePresence('level', 'create')
            ->notEmpty('level');

        $validator
            ->requirePresence('matric_no', 'create')
            ->notEmpty('matric_no');

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
        $rules->add($rules->existsIn(['student_id'], 'Students'));
        $rules->add($rules->existsIn(['faculty_id'], 'Faculties'));
        $rules->add($rules->existsIn(['department_id'], 'Departments'));
        return $rules;
    }
}
