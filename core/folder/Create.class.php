<?php

namespace helionogueir\foldercreator\folder;

use helionogueir\foldercreator\tool\Path;
use helionogueir\typeBoxing\type\String;
use helionogueir\typeBoxing\type\Boolean;
use helionogueir\typeBoxing\type\Integer;

/**
 * Create folder:
 * - Create folder and sub directory;
 *
 * @author Helio Nogueira <helio.nogueir@gmail.com>
 * @version v1.0.0
 */
class Create {

  /**
   * Create directory:
   * - Create directory and sub directory;
   * 
   * @param helionogueir\typeBoxing\type\String $directory Directory name
   * @return helionogueir\typeBoxing\type\Boolean True directory create, and False not create
   */
  public final function make(String $directory, Integer $mode = null) {
    $auth = true;
    if (!$directory->isEmpty()) {
      if ($folders = explode(DIRECTORY_SEPARATOR, Path::replaceOSSeparator($directory))) {
        $fullpath = null;
        foreach ($folders as $folder) {
          if (!empty($folder)) {
            $fullpath .= DIRECTORY_SEPARATOR . $folder;
            if (!$this->createDirectory(new String($fullpath), $mode)) {
              $auth = false;
            }
          }
        }
      }
    }
    return new Boolean($auth);
  }

  /**
   * Create directory:
   * - Create directory and sub directory;
   * 
   * @param helionogueir\typeBoxing\type\String $directory Directory name
   * @return bool True directory create, and False not create
   */
  private final function createDirectory(String $directory, Integer $mode = null) {
    $auth = false;
    if (is_dir($directory)) {
      $auth = true;
    } else {
      @mkdir($directory, 0777, true);
    }
    $_mode = ($mode) ? $mode : 0777;
    @chmod($directory, $_mode);
    return is_dir($directory);
  }

}
