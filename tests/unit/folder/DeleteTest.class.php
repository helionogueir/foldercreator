<?php

use PHPUnit\Framework\TestCase;
use helionogueir\foldercreator\folder\Create;
use helionogueir\foldercreator\folder\Delete;

class DeleteTest extends TestCase {

  public function testRm() {
    $pathname = sys_get_temp_dir() . DIRECTORY_SEPARATOR . "helionogueir_foldercreator_folder_delete;";
    if ((new Create ())->mkdir($pathname)) {
      $this->assertTrue((new Delete())->rm($pathname));
    }
  }

}
