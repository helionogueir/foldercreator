<?php

namespace helionogueir\foldercreator\folder;

use DirectoryIterator;
use helionogueir\foldercreator\tool\Path;

/**
 * - Delete directories and dependencies
 * @author Helio Nogueira <helio.nogueir@gmail.com>
 * @version v1.1.0
 */
class Delete {

  /**
   * - Delete directory and sub directory recursive
   * @param string $directory Path of directory
   * @return bool Return if directory to be remove
   */
  public function rm(string $directory): bool {
    if (is_dir($directory)) {
      foreach (new DirectoryIterator(Path::replaceOSSeparator($directory)) as $fileInfo) {
        if (!$fileInfo->isDot()) {
          if ($fileInfo->isDir()) {
            $this->rm($fileInfo->getPathname());
            @rmdir($fileInfo->getPathname());
          } else if ($fileInfo->isFile()) {
            @unlink($fileInfo->getPathname());
          }
        }
      }
      @rmdir($directory);
    }
    return !file_exists($directory);
  }

}
