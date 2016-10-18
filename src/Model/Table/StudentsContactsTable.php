<?php
namespace App\Model\Table;

use App\Model\Entity\StudentsContact;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * StudentsContacts Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Students
 */
class StudentsContactsTable extends Table
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

        $this->table('students_contacts');
        $this->displayField('id');
        $this->addBehavior('Search.Search');
        $this->searchManager()
            ->add('id', 'Search.Value', [
                'field' => $this->aliasField('id')
            ]);
        $this->searchManager()
            ->add('matric_no', 'Search.Value', [
                'field' => $this->aliasField('matric_no')
            ]);
        $this->searchManager()
            ->add('email', 'Search.Value', [
                'field' => $this->aliasField('email')
            ]);
        $this->searchManager()
            ->add('phone', 'Search.Value', [
                'field' => $this->aliasField('phone')
            ]);
        $this->searchManager()
            ->add('home_address', 'Search.Value', [
                'field' => $this->aliasField('home_address')
            ]);
        $this->searchManager()
            ->add('city', 'Search.Value', [
                'field' => $this->aliasField('city')
            ]);
        $this->searchManager()
            ->add('lga', 'Search.Value', [
                'field' => $this->aliasField('lga')
            ]);
        $this->searchManager()
            ->add('state', 'Search.Value', [
                'field' => $this->aliasField('state')
            ]);
        $this->searchManager()
            ->add('parent_name', 'Search.Value', [
                'field' => $this->aliasField('parent_name')
            ]);
        $this->searchManager()
            ->add('parent_phone', 'Search.Value', [
                'field' => $this->aliasField('parent_phone')
            ]);
        $this->searchManager()
            ->add('parent_address', 'Search.Value', [
                'field' => $this->aliasField('parent_address')
            ]);
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Students', [
            'foreignKey' => 'student_id'
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
            ->allowEmpty('matric_no');

        $validator
            ->email('email')
            ->allowEmpty('email');

        $validator
            ->allowEmpty('phone');

        $validator
            ->allowEmpty('home_address');

        $validator
            ->allowEmpty('city');

        $validator
            ->integer('lga')
            ->allowEmpty('lga');

        $validator
            ->integer('state')
            ->allowEmpty('state');

        $validator
            ->allowEmpty('parent_name');

        $validator
            ->allowEmpty('parent_phone');

        $validator
            ->allowEmpty('parent_address');

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
        $rules->add($rules->existsIn(['student_id'], 'Students'));
        return $rules;
    }
}
