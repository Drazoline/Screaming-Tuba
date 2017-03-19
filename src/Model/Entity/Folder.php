<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Folder extends Entity
{
  public function __toString()
  {
    return $this->title;
  }
}

?>
