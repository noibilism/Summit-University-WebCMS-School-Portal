<?php
namespace App\Model\Table;

use App\Model\Entity\AdmissionPayment;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AdmissionPayments Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Fees
 * @property \Cake\ORM\Association\BelongsTo $AdmissionsApplicants
 */
class AdmissionPaymentsTable extends Table
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

        $this->table('admission_payments');
        $this->displayField('id');
        $this->addBehavior('Search.Search');
        $this->searchManager()
            ->add('id', 'Search.Value', [
                'field' => $this->aliasField('id')
            ]);
        $this->searchManager()
            ->add('reference_no', 'Search.Value', [
                'field' => $this->aliasField('reference_no')
            ]);
        $this->searchManager()
            ->add('application_number', 'Search.Value', [
                'field' => $this->aliasField('application_number')
            ]);
        $this->searchManager()
            ->add('amount', 'Search.Value', [
                'field' => $this->aliasField('amount')
            ]);
        $this->searchManager()
            ->add('mode', 'Search.Value', [
                'field' => $this->aliasField('mode')
            ]);
        $this->searchManager()
            ->add('status_code', 'Search.Value', [
                'field' => $this->aliasField('status_code')
            ]);
        $this->searchManager()
            ->add('status_description', 'Search.Value', [
                'field' => $this->aliasField('status_description')
            ]);
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Fees', [
            'foreignKey' => 'fee_id'
        ]);
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
            ->notEmpty('reference_no');

        $validator
            ->notEmpty('application_number');

        $validator
            ->numeric('amount')
            ->requirePresence('amount', 'create')
            ->notEmpty('amount');

        $validator
            ->notEmpty('mode');

        $validator
            ->notEmpty('status_code');

        $validator
            ->notEmpty('status_description');

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
        $rules->add($rules->existsIn(['fee_id'], 'Fees'));
        $rules->add($rules->existsIn(['admission_application_id'], 'AdmissionsApplicants'));
        return $rules;
    }
}
