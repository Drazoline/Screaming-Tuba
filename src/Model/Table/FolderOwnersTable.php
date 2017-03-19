<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class FolderOwnersTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->notEmpty('name')
            ->notEmpty('password')
            ->notEmpty('email')
            ->notEmpty('subscription');
        return $validator;
    }
}

?>
