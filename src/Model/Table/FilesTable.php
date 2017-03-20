<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class FilesTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
        $this->belongsTo('Users');
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->notEmpty('data')
            ->notEmpty('times_played')
            ->notEmpty('user_id')
            ->notEmpty('title');
        return $validator;
    }
}

?>
