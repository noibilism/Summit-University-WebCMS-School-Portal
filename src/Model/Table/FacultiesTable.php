<?php
namespace App\Model\Table;

use App\Model\Entity\Faculty;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Faculties Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Contents
 * @property \Cake\ORM\Association\HasMany $Departments
 * @property \Cake\ORM\Association\HasMany $Publications
 * @property \Cake\ORM\Association\HasMany $StaffProfiles
 * @property \Cake\ORM\Association\HasMany $StudentsAcademics
 */
class FacultiesTable extends Table
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

        $this->table('faculties');
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

        $this->belongsTo('Contents', [
            'foreignKey' => 'content_id'
        ]);
        $this->hasMany('Departments', [
            'foreignKey' => 'faculty_id'
        ]);
        $this->hasMany('Publications', [
            'foreignKey' => 'faculty_id'
        ]);
        $this->hasMany('StaffProfiles', [
            'foreignKey' => 'faculty_id'
        ]);
        $this->hasMany('StudentsAcademics', [
            'foreignKey' => 'faculty_id'
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
            ->allowEmpty('name', 'create');

        $validator
            ->allowEmpty('description', 'create');

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
        $rules->add($rules->existsIn(['content_id'], 'Contents'));
        return $rules;
    }
}
