<?php
namespace App\Model\Table;

use App\Model\Entity\Usuario;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Usuarios Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Cidades
 * @property \Cake\ORM\Association\HasMany $Comentarios
 * @property \Cake\ORM\Association\HasMany $Estoques
 * @property \Cake\ORM\Association\HasMany $Propriedades
 */
class UsuariosTable extends Table
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

        $this->table('usuarios');
        $this->displayField('username');
        $this->primaryKey('id_usuario');

        $this->belongsTo('Cidades', [
            'foreignKey' => 'cidade_id'
        ]);
        $this->hasMany('Comentarios', [
            'foreignKey' => 'usuario_id'
        ]);
        $this->hasMany('Estoques', [
            'foreignKey' => 'usuario_id'
        ]);
        $this->hasMany('Propriedades', [
            'foreignKey' => 'usuario_id'
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
            ->requirePresence('username', 'create')
            ->notEmpty('username');

        $validator
            ->requirePresence('sobrenome')
            ->notEmpty('sobrenome');

        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('password');

        $validator
            ->add('password2','no-misspelling',[
                'rule' => ['compareWith','password'],
                'message' => 'A senha não confere'
            ])
            ->requirePresence('password2')
            ->notEmpty('password2');

        $validator
            ->add('email', 'valid', [
                'rule' => 'email',
                'message' => 'Email inválido'
            ])
            ->requirePresence('email')
            ->notEmpty('email');

        $validator
            ->allowEmpty('endereco');

        $validator
            ->requirePresence('cidade_id')
            ->notEmpty('cidade_id','Por favor, selecione uma cidade');

        $validator
            ->requirePresence('autorizacao')
            ->notEmpty('autorizacao');

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
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['cidade_id'], 'Cidades'));
        return $rules;
    }
}
