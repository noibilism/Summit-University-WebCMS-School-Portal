<?php
namespace App\Model\Table;

use App\Model\Entity\Student;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Students Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\HasMany $Results
 */
class StudentsTable extends Table
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

        $this->table('students');
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
            ->add('sex', 'Search.Value', [
                'field' => $this->aliasField('sex')
            ]);
        $this->searchManager()
            ->add('mode_of_entry', 'Search.Value', [
                'field' => $this->aliasField('mode_of_entry')
            ]);
        $this->searchManager()
            ->add('dob', 'Search.Value', [
                'field' => $this->aliasField('dob')
            ]);
        $this->searchManager()
            ->add('home_town', 'Search.Value', [
                'field' => $this->aliasField('home_town')
            ]);
        $this->searchManager()
            ->add('lga', 'Search.Value', [
                'field' => $this->aliasField('lga')
            ]);
        $this->searchManager()
            ->add('state_of_origin', 'Search.Value', [
                'field' => $this->aliasField('state_of_origin')
            ]);
        $this->searchManager()
            ->add('pix', 'Search.Value', [
                'field' => $this->aliasField('pix')
            ]);
        $this->searchManager()
            ->add('status', 'Search.Value', [
                'field' => $this->aliasField('status')
            ]);
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
        $this->addBehavior('Proffer.Proffer', [
            'photo' => [ // The name of your upload field
                'root' => WWW_ROOT . 'uploads', // Customise the root upload folder here, or omit to use the default
                'dir' => 'photo_dir', // The name of the field to store the folder
                'thumbnailSizes' => [ // Declare your thumbnails
                    'square' => [ // Define the prefix of your thumbnail
                        'w' => 200, // Width
                        'h' => 200, // Height
                        'jpeg_quality' => 100
                    ],
                    'portrait' => [ // Define a second thumbnail
                        'w' => 100,
                        'h' => 300
                    ],
                ],
                'thumbnailMethod' => 'gd' // Options are Imagick or Gd
            ]
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Results', [
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
            ->provider('proffer', 'Proffer\Model\Validation\ProfferRules');


        $validator
            ->allowEmpty('matric_no')
            ->add('matric_no', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->allowEmpty('first_name');

        $validator
            ->allowEmpty('middle_name');

        $validator
            ->allowEmpty('last_name');

        $validator
            ->allowEmpty('sex');

        $validator
            ->allowEmpty('mode_of_entry');

        $validator
            ->date('dob')
            ->allowEmpty('dob');

        $validator
            ->allowEmpty('home_town');

        $validator
            ->integer('lga')
            ->allowEmpty('lga');

        $validator
            ->integer('state_of_origin')
            ->allowEmpty('state_of_origin');

        $validator
            ->requirePresence('pix', 'create')
            ->allowEmpty('pix', 'update')
            ->add('pix', 'proffer', [
                'rule' => ['dimensions', [
                    'min' => ['w' => 100, 'h' => 100],
                    'max' => ['w' => 500, 'h' => 500]
                ]],
                'message' => 'Image is not correct dimensions.',
                'provider' => 'proffer'
            ]);

        $validator
            ->integer('status')
            ->allowEmpty('status');

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
        $rules->add($rules->isUnique(['matric_no']));
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        return $rules;
    }
}
