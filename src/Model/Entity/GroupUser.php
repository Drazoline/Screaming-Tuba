<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class GroupUser extends Entity
{
  public function __toString()
  {
    return $this->id;
  }
}

?>
