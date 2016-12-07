<?php

use PHPUnit\Framework\TestCase;
use helionogueir\foldercreator\folder\Create;
use helionogueir\foldercreator\folder\Delete;

class CreateTest extends TestCase {

  public function testMake() {
    $pathname = sys_get_temp_dir() . DIRECTORY_SEPARATOR . "helionogueir_foldercreator_folder_create";
    $this->assertTrue((new Create())->mkdir($pathname));
    (new Delete())->rm($pathname);
  }

}
