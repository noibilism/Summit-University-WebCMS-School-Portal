<?php
namespace App\Model\Table;

use App\Model\Entity\ApplicantContact;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ApplicantContacts Model
 *
 * @property \Cake\ORM\Association\BelongsTo $AdmissionApplications
 */
class ApplicantContactsTable extends Table
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

        $this->table('applicant_contacts');
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
            ->add('phone_number', 'Search.Value', [
                'field' => $this->aliasField('phone_number')
            ]);
        $this->searchManager()
            ->add('email', 'Search.Value', [
                'field' => $this->aliasField('email')
            ]);
        $this->searchManager()
            ->add('home_address', 'Search.Value', [
                'field' => $this->aliasField('home_address')
            ]);
        $this->searchManager()
            ->add('state', 'Search.Value', [
                'field' => $this->aliasField('state')
            ]);
        $this->searchManager()
            ->add('lga', 'Search.Value', [
                'field' => $this->aliasField('lga')
            ]);
        $this->searchManager()
            ->add('city', 'Search.Value', [
                'field' => $this->aliasField('city')
            ]);
        $this->primaryKey('id');

        $this->belongsTo('AdmissionApplications', [
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
            ->requirePresence('application_number', 'create')
            ->notEmpty('application_number');

        $validator
            ->notEmpty('phone_number');

        $validator
            ->email('email')
            ->notEmpty('email');

        $validator
            ->notEmpty('home_address');

        $validator
            ->integer('state')
            ->notEmpty('state');

        $validator
            ->integer('lga')
            ->notEmpty('lga');

        $validator
            ->notEmpty('city');

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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['admission_application_id'], 'AdmissionApplications'));
        return $rules;
    }
}
