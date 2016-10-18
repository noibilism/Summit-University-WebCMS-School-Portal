<?php
namespace App\Model\Table;

use App\Model\Entity\ApplicantEducation;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ApplicantEducations Model
 *
 * @property \Cake\ORM\Association\BelongsTo $AdmissionsApplicants
 */
class ApplicantEducationsTable extends Table
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

        $this->table('applicant_educations');
        $this->displayField('id');
        $this->addBehavior('Search.Search');
        $this->searchManager()
            ->add('id', 'Search.Value', [
                'field' => $this->aliasField('id')
            ]);
        $this->searchManager()
            ->add('sec_school', 'Search.Value', [
                'field' => $this->aliasField('sec_school')
            ]);
        $this->searchManager()
            ->add('grades_obtained', 'Search.Value', [
                'field' => $this->aliasField('grades_obtained')
            ]);
        $this->searchManager()
            ->add('other_grades', 'Search.Value', [
                'field' => $this->aliasField('other_grades')
            ]);
        $this->searchManager()
            ->add('jamb_reg', 'Search.Value', [
                'field' => $this->aliasField('jamb_reg')
            ]);
        $this->searchManager()
            ->add('jamb_score', 'Search.Value', [
                'field' => $this->aliasField('jamb_score')
            ]);
        $this->searchManager()
            ->add('application_numer', 'Search.Value', [
                'field' => $this->aliasField('application_numer')
            ]);
        $this->primaryKey('id');

        $this->belongsTo('AdmissionsApplicants', [
            'foreignKey' => 'admission_application_id'
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
            ->notEmpty('id', 'create');

        $validator
            ->requirePresence('sec_school', 'create')
            ->notEmpty('sec_school');

        $validator
            ->notEmpty('grades_obtained');

        $validator
            ->notEmpty('other_grades');

        $validator
            ->notEmpty('jamb_reg');

        $validator
            ->notEmpty('jamb_score');

        $validator
            ->notEmpty('application_numer');

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
        $rules->add($rules->existsIn(['admission_application_id'], 'AdmissionsApplicants'));
        return $rules;
    }
}
