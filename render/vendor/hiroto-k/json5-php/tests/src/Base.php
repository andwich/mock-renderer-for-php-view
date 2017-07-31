<?php

namespace HirotoK\JSON5\Tests;

class Base extends \PHPUnit_Framework_TestCase {

  /**
   * JSON5 files.
   *
   * @var array
   */
  protected $json5_files;

  /**
   * Set up.
   *
   * @return void
   */
  protected function setUp() {
    $this->json5_files = [
      JSON5_FILE_DIR."/example.json5",
      JSON5_FILE_DIR."/package.json5",
    ];
  }

}