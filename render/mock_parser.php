<?php
namespace andwich;

require 'vendor/autoload.php';
use HirotoK\JSON5\JSON5;

class MockPaser
{
    public $mockdataDir;
    public $mockdataFile;
    public $mockdataPath;
    public $templateDir;
    public $templateFile;
    public $templatePath;

    public function __construct($config)
    {
        $templateExt        = $config['templateExt'];
        $this->mockdataDir  = $config['mockdataDir'];
        $this->templateDir  = $config['templateDir'];
        $this->mockdataFile = $config['mockdataFile'];
        $this->mockdataPath = $this->mockdataDir . $this->mockdataFile;
        $this->templateFile = preg_replace('/(--.*\..*$|\..*$)/', $templateExt, basename($this->mockdataFile));
        $this->templatePath = $this->templateDir . 'pages/' . $this->templateFile;
    }

    public function isExistTemplate()
    {
        if (!is_readable($this->templatePath))
        {
            echo 'Couldn\'t read templatePath.<br>' . $this->templatePath;
            return false;
        } else {
            return true;
        }
    }

    public function isExistMockdata()
    {
        if (!is_readable($this->mockdataPath))
        {
            echo 'Couldn\'t read mockdataPath.<br>' . $this->mockdataPath;
            return false;
        } else {
            return true;
        }
    }

    public function parseMockdata()
    {
        return JSON5::decodeFile($this->mockdataPath, true);
    }
}
