<?php
/**
 * Created by PhpStorm.
 * User: Yannick Grégoire
 * Date: 18/03/2017
 * Time: 10:19 PM
 */

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class PermGroupUsersTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
        $this->belongsTo('GroupUsers');
        $this->belongsTo('Permissions');
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->notEmpty('permission_id')
            ->notEmpty('group_user_id');
        return $validator;
    }
}
