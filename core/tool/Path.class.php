<?php

namespace helionogueir\foldercreator\tool;

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
   * @param string $path Directory path
   * @return string Path replace system pattern
   */
  public static function replaceOSSeparator(string $path) {
    return preg_replace("/(\/|\\\\)/", DIRECTORY_SEPARATOR, $path);
  }

}
