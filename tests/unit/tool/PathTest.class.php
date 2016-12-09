<?php

use PHPUnit\Framework\TestCase;
use helionogueir\foldercreator\tool\Path;

class PathTest extends TestCase {

  public function testReplaceOSSeparator() {
    $unnormal = "pathnam/to\\file/or\\directory";
    $normal = "pathnam" . DIRECTORY_SEPARATOR . "to" . DIRECTORY_SEPARATOR . "file" . DIRECTORY_SEPARATOR . "or" . DIRECTORY_SEPARATOR . "directory";
    $this->assertEquals($normal, Path::replaceOSSeparator($unnormal));
  }

}
