<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CPeriodePelaporan Model
 *
 * @property \App\Model\Table\InstansisTable|\Cake\ORM\Association\BelongsTo $Instansis
 *
 * @method \App\Model\Entity\CPeriodePelaporan get($primaryKey, $options = [])
 * @method \App\Model\Entity\CPeriodePelaporan newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CPeriodePelaporan[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CPeriodePelaporan|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CPeriodePelaporan|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CPeriodePelaporan patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CPeriodePelaporan[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CPeriodePelaporan findOrCreate($search, callable $callback = null, $options = [])
 */
class CPeriodePelaporanTable extends Table
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

        $this->setTable('c_periode_pelaporan');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Instansi', [
            'foreignKey' => 'instansi_id',
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
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('data_labels')
            ->allowEmpty('data_labels');

        $validator
            ->requirePresence('del', 'create')
            ->notEmpty('del');

        $validator
            ->scalar('dibuat_oleh')
            ->maxLength('dibuat_oleh', 25)
            ->allowEmpty('dibuat_oleh');

        $validator
            ->date('tgl_dibuat')
            ->allowEmpty('tgl_dibuat');

        $validator
            ->scalar('diubah_oleh')
            ->maxLength('diubah_oleh', 25)
            ->allowEmpty('diubah_oleh');

        $validator
            ->date('tgl_diubah')
            ->allowEmpty('tgl_diubah');

        $validator
            ->date('tgl_mulai')
            ->allowEmpty('tgl_mulai');

        $validator
            ->date('tgl_akhir')
            ->allowEmpty('tgl_akhir');

        $validator
            ->scalar('status')
            ->maxLength('status', 20)
            ->allowEmpty('status');

        $validator
            ->scalar('keterangan')
            ->maxLength('keterangan', 1000)
            ->allowEmpty('keterangan');

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
        $rules->add($rules->existsIn(['instansi_id'], 'Instansi'));

        return $rules;
    }
}
