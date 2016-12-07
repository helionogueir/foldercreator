<?php

use PHPUnit\Framework\TestCase;
use helionogueir\foldercreator\tool\AccessMode;

class AccessModeTest extends TestCase {

  public function testConstMod0777() {
    $this->assertEquals(0777, AccessMode::MOD_0777);
  }

}
