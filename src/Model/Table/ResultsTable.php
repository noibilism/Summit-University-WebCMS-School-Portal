<?php
namespace App\Model\Table;

use App\Model\Entity\Result;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Results Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Students
 * @property \Cake\ORM\Association\BelongsTo $Departments
 * @property \Cake\ORM\Association\BelongsTo $Courses
 * @property \Cake\ORM\Association\BelongsTo $SchoolSessions
 */
class ResultsTable extends Table
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

        $this->table('results');
        $this->displayField('id');
        $this->addBehavior('Search.Search');
        $this->searchManager()
            ->add('id', 'Search.Value', [
                'field' => $this->aliasField('id')
            ]);
        $this->searchManager()
            ->add('semester', 'Search.Value', [
                'field' => $this->aliasField('semester')
            ]);
        $this->searchManager()
            ->add('level', 'Search.Value', [
                'field' => $this->aliasField('level')
            ]);
        $this->searchManager()
            ->add('course_code', 'Search.Value', [
                'field' => $this->aliasField('course_code')
            ]);
        $this->searchManager()
            ->add('score', 'Search.Value', [
                'field' => $this->aliasField('score')
            ]);
        $this->searchManager()
            ->add('grade', 'Search.Value', [
                'field' => $this->aliasField('grade')
            ]);
        $this->searchManager()
            ->add('units_obtainable', 'Search.Value', [
                'field' => $this->aliasField('units_obtainable')
            ]);
        $this->searchManager()
            ->add('unit_obtained', 'Search.Value', [
                'field' => $this->aliasField('unit_obtained')
            ]);
        $this->searchManager()
            ->add('added_by', 'Search.Value', [
                'field' => $this->aliasField('added_by')
            ]);
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Students', [
            'foreignKey' => 'student_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Departments', [
            'foreignKey' => 'dept_id'
        ]);
        $this->belongsTo('Courses', [
            'foreignKey' => 'course_id'
        ]);
        $this->belongsTo('SchoolSessions', [
            'foreignKey' => 'session_id'
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
            ->integer('semester')
            ->notEmpty('semester');

        $validator
            ->notEmpty('level');

        $validator
            ->notEmpty('course_code');

        $validator
            ->notEmpty('score');

        $validator
            ->notEmpty('grade');

        $validator
            ->notEmpty('units_obtainable');

        $validator
            ->notEmpty('unit_obtained');

        $validator
            ->notEmpty('added_by');

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
        $rules->add($rules->existsIn(['dept_id'], 'Departments'));
        $rules->add($rules->existsIn(['course_id'], 'Courses'));
        $rules->add($rules->existsIn(['session_id'], 'SchoolSessions'));
        return $rules;
    }
}
