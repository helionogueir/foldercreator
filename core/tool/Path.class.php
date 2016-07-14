<?php

namespace helionogueir\foldercreator\tool;

use helionogueir\typeBoxing\type\String;

/**
 * Path behavior:
 * - Path behavior rules;
 *
 * @author Helio Nogueira <helio.nogueir@gmail.com>
 * @version v1.0.0
 */
class Path {

  public function __construct() {
    return false;
  }

  /**
   * Replace OS separator
   * - Change separetor to OS separator;
   * 
   * @param helionogueir\typeBoxing\type\String $path Directory path
   * @return helionogueir\typeBoxing\type\String Path replace system pattern
   */
  public static function replaceOSSeparator(String $path) {
    return new String(preg_replace("/(\/|\\\\)/", DIRECTORY_SEPARATOR, $path));
  }

}
