<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class File extends Entity
{
  public function __toString()
  {
    return $this->title;
  }
}

?>
