<?php
namespace App\Model\Table;

use App\Model\Entity\ParametrosIdeal;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ParametrosIdeais Model
 *
 */
class ParametrosIdeaisTable extends Table
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

        $this->table('parametros_ideais');
        $this->displayField('id');
        $this->primaryKey('id');

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
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->add('oxigenio_agua', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('oxigenio_agua');

        $validator
            ->add('ionizacao_agua', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('ionizacao_agua');

        $validator
            ->add('temperatura_agua', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('temperatura_agua');

        $validator
            ->add('largura_peixes', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('largura_peixes');

        $validator
            ->add('peso_peixes', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('peso_peixes');

        return $validator;
    }
}
