<?php
/**
 * Created by PhpStorm.
 * User: Yannick Grégoire
 * Date: 15/03/2017
 * Time: 02:13 PM
 */

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class SubscriptionsTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
        $this->belongsTo('Users');
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->notEmpty('user_id')
            ->notEmpty('target_id');
        return $validator;
    }
}

?>