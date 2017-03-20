<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class User extends Entity
{
  protected function __toString()
  {
    return $this->_properties['name'];
  }
}

?>
