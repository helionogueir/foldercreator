<?php

namespace helionogueir\foldercreator\tool;

/**
 * - Delete directories and dependencies
 * @author Helio Nogueira <helio.nogueir@gmail.com>
 * @version v1.1.0
 */
abstract class Path {

  /**
   * - Change separetor to OS separator
   * @param string $path Directory path
   * @return string Path replace system pattern
   */
  public static function replaceOSSeparator(string $path): string {
    return preg_replace("/(\/|\\\\)/", DIRECTORY_SEPARATOR, $path);
  }

}
