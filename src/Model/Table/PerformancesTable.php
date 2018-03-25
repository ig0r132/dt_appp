<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Performances Model
 *
 * @property \App\Model\Table\InstitutionsTable|\Cake\ORM\Association\BelongsTo $Institutions
 *
 * @method \App\Model\Entity\Performance get($primaryKey, $options = [])
 * @method \App\Model\Entity\Performance newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Performance[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Performance|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Performance patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Performance[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Performance findOrCreate($search, callable $callback = null, $options = [])
 */
class PerformancesTable extends Table
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

        $this->setTable('performances');
        $this->setDisplayField('performance_id');
        $this->setPrimaryKey('performance_id');

        $this->belongsTo('Institutions', [
            'foreignKey' => 'institution_id',
            'joinType' => 'INNER'
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
            ->integer('performance_id')
            ->allowEmpty('performance_id', 'create');

        $validator
            ->integer('general_grades')
            ->requirePresence('general_grades', 'create')
            ->notEmpty('general_grades');

        $validator
            ->integer('course_grades')
            ->requirePresence('course_grades', 'create')
            ->notEmpty('course_grades');

        $validator
            ->scalar('course_names')
            ->maxLength('course_names', 255)
            ->requirePresence('course_names', 'create')
            ->notEmpty('course_names');

        $validator
            ->integer('course_avgs')
            ->requirePresence('course_avgs', 'create')
            ->notEmpty('course_avgs');

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
        $rules->add($rules->existsIn(['institution_id'], 'Institutions'));

        return $rules;
    }
}
