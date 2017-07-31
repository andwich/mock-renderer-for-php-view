<?php

namespace HirotoK\JSON5\Tests;

use HirotoK\JSON5\JSON5;
use SplFileObject;
use stdClass;

/**
 * Class JSON5Test
 *
 * @package HirotoK\JSON5\Tests
 */
class JSON5Test extends Base {

  /**
   * Test 'JSON5::decode'.
   *
   * @return void
   */
  public function testDecode() {
    foreach ($this->json5_files as $path) {
      $json5 = file_get_contents($path);
      $json  = JSON5::decode($json5);
      $this->assertInstanceOf(stdClass::class, $json);
    }
  }

  /**
   * Test 'JSON5::decode' and use assoc option.
   *
   * @return void
   */
  public function testDecodeAssoc() {
    foreach ($this->json5_files as $path) {
      $json5 = file_get_contents($path);
      $json  = JSON5::decode($json5, true);
      $this->assertTrue(is_array($json));
    }
  }

  /**
   * Test 'JSON5::decodeFile' pass 'string'.
   *
   * @return void
   */
  public function testDecodeFile() {
    foreach ($this->json5_files as $path) {
      $json = JSON5::decodeFile($path);
      $this->assertInstanceOf(stdClass::class, $json);
    }
  }

  /**
   * Test 'JSON5::decodeFile' pass 'string' and use assoc option.
   *
   * @return void
   */
  public function testDecodeFileAssoc() {
    foreach ($this->json5_files as $path) {
      $json = JSON5::decodeFile($path, true);
      $this->assertTrue(is_array($json));
    }
  }

  /**
   * Test 'JSON5::decodeFile' pass 'SplFileObject'.
   *
   * @return void
   */
  public function testDecodeFileSpl() {
    foreach ($this->json5_files as $path) {
      $json5 = new SplFileObject($path);
      $json  = JSON5::decodeFile($json5);
      $this->assertInstanceOf(stdClass::class, $json);
    }
  }

  /**
   * Test 'JSON5::decodeFile' pass 'SplFileObject' and use assoc option.
   *
   * @return void
   */
  public function testDecodeFileSplAssoc() {
    foreach ($this->json5_files as $path) {
      $json5 = new SplFileObject($path);
      $json  = JSON5::decodeFile($json5, true);
      $this->assertTrue(is_array($json));
    }
  }


}