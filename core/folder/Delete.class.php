<?php

namespace helionogueir\foldercreator\folder;

use DirectoryIterator;
use helionogueir\foldercreator\tool\Path;

/**
 * Delete directory:
 * - Delete directory and sub directory;
 *
 * @author Helio Nogueira <helio.nogueir@gmail.com>
 * @version v1.0.0
 */
class Delete {

  /**
   * Delete directory:
   * - Delete directory and sub directory
   * 
   * @param string $directory Path of directory
   * @return bool Info if delete directory
   */
  public final function rm(string $directory) {
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
    return file_exists($directory);
  }

}
