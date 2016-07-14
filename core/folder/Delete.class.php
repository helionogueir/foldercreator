<?php

namespace helionogueir\foldercreator\folder;

use DirectoryIterator;
use helionogueir\foldercreator\tool\Path;
use helionogueir\typeBoxing\type\String;
use helionogueir\typeBoxing\type\Boolean;

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
   * @param helionogueir\typeBoxing\type\String $directory Path of directory
   * @return helionogueir\typeBoxing\type\Boolean Info if delete directory
   */
  public final function rm(String $directory) {
    if (is_dir($directory)) {
      foreach (new DirectoryIterator(Path::replaceOSSeparator($directory)) as $fileInfo) {
        if (!$fileInfo->isDot()) {
          if ($fileInfo->isDir()) {
            $this->rm(new String($fileInfo->getPathname()));
            @rmdir($fileInfo->getPathname());
          } else if ($fileInfo->isFile()) {
            @unlink($fileInfo->getPathname());
          }
        }
      }
      @rmdir($directory);
    }
    return new Boolean(file_exists($directory));
  }

}
