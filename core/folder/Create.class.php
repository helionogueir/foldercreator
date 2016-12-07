<?php

namespace helionogueir\foldercreator\folder;

use helionogueir\foldercreator\tool\Path;
use helionogueir\foldercreator\tool\AccessMode;

/**
 * - Create folder and sub directory
 * @author Helio Nogueira <helio.nogueir@gmail.com>
 * @version v1.1.0
 */
class Create {

  /**
   * - Make directory and sub directory
   * @param string $directory Path of directory
   * @param int $mode Define chmod of path directory
   * @return bool Info if create the folder
   */
  public function mkdir(string $directory, int $mode = null): bool {
    if (!empty($directory)) {
      if ($folders = explode(DIRECTORY_SEPARATOR, Path::replaceOSSeparator($directory))) {
        $fullpath = null;
        if (empty($mode)) {
          $mode = AccessMode::MOD_0777;
        }
        foreach ($folders as $folder) {
          if (!empty($folder)) {
            $fullpath .= DIRECTORY_SEPARATOR . $folder;
            $this->createDirectory($fullpath, $mode);
          }
        }
      }
    }
    return file_exists($directory);
  }

  /**
   * - Make directory
   * @param string $directory Path of directory
   * @param int $mode Define chmod of path directory
   * @return bool Info if create the folder
   */
  private function createDirectory(string $directory, int $mode): bool {
    $auth = false;
    if (is_dir($directory)) {
      $auth = true;
    } else {
      @mkdir($directory, $mode, true);
    }
    @chmod($directory, $mode);
    return is_dir($directory);
  }

}
