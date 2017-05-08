<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class GroupUsersTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
        $this->hasMany('Users', array(
            'foreignKey' => 'user_id'
        ));
        $this->hasMany('Groups', array(
            'foreignKey' => 'group_id'
        ));

    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->notEmpty('group_id')
            ->notEmpty('user_id');
        return $validator;
    }
}

?>
