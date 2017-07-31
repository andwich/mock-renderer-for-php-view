<?php
require_once '../render/mock_parser.php';

use andwich\MockPaser;

$mockPaser = new MockPaser([
    'templateExt' => '.twig',
    'mockdataDir' => './mock/',
    'templateDir' => '../views/',
    'mockdataFile' => @$_GET['mock'],
]);

if (!$mockPaser->isExistTemplate() || !$mockPaser->isExistMockdata())
{
    exit;
}

$loader = new Twig_Loader_Filesystem($mockPaser->templateDir);
$twig = new Twig_Environment($loader, [
  'debug'               => true,
  'charset'             => 'utf-8',
  'base_template_class' => 'Twig_Template',
  'cache'               => false,
  'auto_reload'         => true,
  'strict_variables'    => false,
  'autoescape'          => false,
  'optimizations'       => -1,
]);

echo $twig->render('pages/' . $mockPaser->templateFile, ['d' => $mockPaser->parseMockdata()]);
