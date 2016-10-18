<?php
namespace App\Model\Table;

use App\Model\Entity\Content;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Contents Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $ContentCategories
 * @property \Cake\ORM\Association\BelongsTo $Galleries
 * @property \Cake\ORM\Association\HasMany $ContentDocuments
 * @property \Cake\ORM\Association\HasMany $Coursewares
 * @property \Cake\ORM\Association\HasMany $Departments
 * @property \Cake\ORM\Association\HasMany $Faculties
 * @property \Cake\ORM\Association\HasMany $Units
 */
class ContentsTable extends Table
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

        $this->table('contents');
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
            ->add('meta', 'Search.Value', [
                'field' => $this->aliasField('meta')
            ]);
        $this->searchManager()
            ->add('alias', 'Search.Value', [
                'field' => $this->aliasField('alias')
            ]);
        $this->searchManager()
            ->add('intro', 'Search.Value', [
                'field' => $this->aliasField('intro')
            ]);
        $this->searchManager()
            ->add('body', 'Search.Value', [
                'field' => $this->aliasField('body')
            ]);
        $this->searchManager()
            ->add('display', 'Search.Value', [
                'field' => $this->aliasField('display')
            ]);
        $this->searchManager()
            ->add('status', 'Search.Value', [
                'field' => $this->aliasField('status')
            ]);
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('ContentCategories', [
            'foreignKey' => 'category_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Galleries', [
            'foreignKey' => 'gallery_id'
        ]);
        $this->hasMany('ContentDocuments', [
            'foreignKey' => 'content_id'
        ]);
        $this->hasMany('Coursewares', [
            'foreignKey' => 'content_id'
        ]);
        $this->hasMany('Departments', [
            'foreignKey' => 'content_id'
        ]);
        $this->hasMany('Faculties', [
            'foreignKey' => 'content_id'
        ]);
        $this->hasMany('Units', [
            'foreignKey' => 'content_id'
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
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->allowEmpty('meta');

        $validator
            ->requirePresence('alias', 'create')
            ->notEmpty('alias');

        $validator
            ->requirePresence('intro', 'create')
            ->notEmpty('intro');

        $validator
            ->requirePresence('body', 'create')
            ->notEmpty('body');

        $validator
            ->allowEmpty('display');

        $validator
            ->integer('status')
            ->requirePresence('status', 'create')
            ->notEmpty('status');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['category_id'], 'ContentCategories'));
        $rules->add($rules->existsIn(['gallery_id'], 'Galleries'));
        return $rules;
    }
}
