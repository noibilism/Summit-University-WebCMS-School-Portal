<?php
namespace App\Model\Table;

use App\Model\Entity\Publication;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Publications Model
 *
 * @property \Cake\ORM\Association\BelongsTo $StaffProfiles
 * @property \Cake\ORM\Association\BelongsTo $Departments
 * @property \Cake\ORM\Association\BelongsTo $Faculties
 * @property \Cake\ORM\Association\BelongsTo $Units
 */
class PublicationsTable extends Table
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

        $this->table('publications');
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
            ->add('description', 'Search.Value', [
                'field' => $this->aliasField('description')
            ]);
        $this->searchManager()
            ->add('publication', 'Search.Value', [
                'field' => $this->aliasField('publication')
            ]);
        $this->searchManager()
            ->add('url', 'Search.Value', [
                'field' => $this->aliasField('url')
            ]);
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('StaffProfiles', [
            'foreignKey' => 'staff_id'
        ]);
        $this->belongsTo('Departments', [
            'foreignKey' => 'dept_id'
        ]);
        $this->belongsTo('Faculties', [
            'foreignKey' => 'faculty_id'
        ]);
        $this->belongsTo('Units', [
            'foreignKey' => 'unit_id'
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
            ->allowEmpty('title');

        $validator
            ->allowEmpty('description');

        $validator
            ->allowEmpty('publication');

        $validator
            ->allowEmpty('url');

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
        $rules->add($rules->existsIn(['staff_id'], 'StaffProfiles'));
        $rules->add($rules->existsIn(['dept_id'], 'Departments'));
        $rules->add($rules->existsIn(['faculty_id'], 'Faculties'));
        $rules->add($rules->existsIn(['unit_id'], 'Units'));
        return $rules;
    }
}
