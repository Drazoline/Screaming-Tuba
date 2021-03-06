<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class GroupsTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
        $this->hasMany('GroupUsers');
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->notEmpty('name');
        return $validator;
    }
}

?>
