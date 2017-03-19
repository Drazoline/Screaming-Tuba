<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class FolderFilesTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
        $this->belongsTo('Folders');
        $this->belongsTo('Files');
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->notEmpty('folder_id')
            ->notEmpty('file_id');
        return $validator;
    }
}

?>
