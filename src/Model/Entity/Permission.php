<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Permission extends Entity
{
  public function __toString()
  {
    return $this->nom;
  }
}

?>
