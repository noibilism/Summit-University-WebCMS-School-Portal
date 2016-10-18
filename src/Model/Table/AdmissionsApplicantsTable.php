<?php
namespace App\Model\Table;

use App\Model\Entity\AdmissionsApplicant;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AdmissionsApplicants Model
 *
 * @property \Cake\ORM\Association\BelongsTo $SchoolSessions
 */
class AdmissionsApplicantsTable extends Table
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

        $this->table('admissions_applicants');
        $this->displayField('id');
        $this->addBehavior('Search.Search');
        $this->searchManager()
            ->add('id', 'Search.Value', [
                'field' => $this->aliasField('id')
            ]);
        $this->searchManager()
            ->add('application_number', 'Search.Value', [
                'field' => $this->aliasField('application_number')
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
            ->add('first_choice', 'Search.Value', [
                'field' => $this->aliasField('first_choice')
            ]);
        $this->searchManager()
            ->add('second_choice', 'Search.Value', [
                'field' => $this->aliasField('second_choice')
            ]);
        $this->searchManager()
            ->add('sex', 'Search.Value', [
                'field' => $this->aliasField('sex')
            ]);
        $this->searchManager()
            ->add('dob', 'Search.Value', [
                'field' => $this->aliasField('dob')
            ]);
        $this->searchManager()
            ->add('state_of_origin', 'Search.Value', [
                'field' => $this->aliasField('state_of_origin')
            ]);
        $this->searchManager()
            ->add('lga', 'Search.Value', [
                'field' => $this->aliasField('lga')
            ]);
        $this->searchManager()
            ->add('town', 'Search.Value', [
                'field' => $this->aliasField('town')
            ]);
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('SchoolSessions', [
            'foreignKey' => 'sch_session_id'
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
            ->notEmpty('application_number')
            ->add('application_number', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->notEmpty('first_name');

        $validator
            ->notEmpty('middle_name');

        $validator
            ->notEmpty('last_name');

        $validator
            ->integer('first_choice')
            ->notEmpty('first_choice');

        $validator
            ->integer('second_choice')
            ->notEmpty('second_choice');

        $validator
            ->notEmpty('sex');

        $validator
            ->date('dob')
            ->notEmpty('dob');

        $validator
            ->integer('state_of_origin')
            ->notEmpty('state_of_origin');

        $validator
            ->integer('lga')
            ->notEmpty('lga');

        $validator
            ->integer('town')
            ->notEmpty('town');

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
        $rules->add($rules->isUnique(['application_number']));
        $rules->add($rules->existsIn(['sch_session_id'], 'SchoolSessions'));
        return $rules;
    }
}
