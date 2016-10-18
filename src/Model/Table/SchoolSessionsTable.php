<?php
namespace App\Model\Table;

use App\Model\Entity\SchoolSession;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SchoolSessions Model
 *
 * @property \Cake\ORM\Association\HasMany $Courses
 * @property \Cake\ORM\Association\HasMany $Fees
 */
class SchoolSessionsTable extends Table
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

        $this->table('school_sessions');
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
            ->add('added_by', 'Search.Value', [
                'field' => $this->aliasField('added_by')
            ]);
        $this->searchManager()
            ->add('starts', 'Search.Value', [
                'field' => $this->aliasField('starts')
            ]);
        $this->searchManager()
            ->add('ends', 'Search.Value', [
                'field' => $this->aliasField('ends')
            ]);
        $this->searchManager()
            ->add('current_session', 'Search.Value', [
                'field' => $this->aliasField('current_session')
            ]);
        $this->searchManager()
            ->add('admission_starts', 'Search.Value', [
                'field' => $this->aliasField('admission_starts')
            ]);
        $this->searchManager()
            ->add('admission_ends', 'Search.Value', [
                'field' => $this->aliasField('admission_ends')
            ]);
        $this->searchManager()
            ->add('sessional_reg_starts', 'Search.Value', [
                'field' => $this->aliasField('sessional_reg_starts')
            ]);
        $this->searchManager()
            ->add('sessional_reg_ends', 'Search.Value', [
                'field' => $this->aliasField('sessional_reg_ends')
            ]);
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Courses', [
            'foreignKey' => 'school_session_id'
        ]);
        $this->hasMany('Fees', [
            'foreignKey' => 'school_session_id'
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
            ->allowEmpty('name');

        $validator
            ->integer('added_by')
            ->allowEmpty('added_by');

        $validator
            ->date('starts')
            ->allowEmpty('starts');

        $validator
            ->date('ends')
            ->allowEmpty('ends');

        $validator
            ->integer('current_session')
            ->allowEmpty('current_session');

        $validator
            ->date('admission_starts')
            ->allowEmpty('admission_starts');

        $validator
            ->date('admission_ends')
            ->allowEmpty('admission_ends');

        $validator
            ->date('sessional_reg_starts')
            ->allowEmpty('sessional_reg_starts');

        $validator
            ->date('sessional_reg_ends')
            ->allowEmpty('sessional_reg_ends');

        return $validator;
    }


}
