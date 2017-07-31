<?php

namespace HirotoK\JSON5\Tests;

use HirotoK\JSON5\Parser;
use stdClass;

/**
 * Class ParserTest
 *
 * @package HirotoK\JSON5\Tests
 */
class ParserTest extends Base {

  /**
   * Test 'parse()' method.
   *
   * @return void
   */
  public function testParse() {
    foreach ($this->json5_files as $path) {
      $json5 = file_get_contents($path);
      $parser = new Parser($json5);
      $this->assertInstanceOf(Parser::class, $parser);
      $json = $parser->parse();
      $this->assertInstanceOf(stdClass::class, $json);
    }
  }

  /**
   * Test 'parse()' method and use assoc option.
   *
   * @return void
   */
  public function testParseAssoc() {
    foreach ($this->json5_files as $path) {
      $json5 = file_get_contents($path);
      $parser = new Parser($json5);
      $this->assertInstanceOf(Parser::class, $parser);
      $json = $parser->parse(true);
      $this->assertTrue(is_array($json));
    }
  }

}