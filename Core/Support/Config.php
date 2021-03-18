<?php


namespace Core\Support;


use function PHPUnit\Framework\fileExists;

class Config
{

    protected $rootDirectory;

    protected $parameters;

    protected $configDir;

    protected $file;

    public $output;


    /**
     * Config constructor.
     * @param string|array $parameters
     */
    public function __construct($parameters)
    {
        $this->rootDirectory = $this->getConfigDirectory();
        $this->parameters = explode('.', $parameters);
        $this->explode();
        $this->generateFile();
        $this->getFile();
        $this->generate();

    }


    public function explode()
    {
        $this->configDir = $this->parameters[0];
        unset($this->parameters[0]);
    }
    public function getConfigDirectory()
    {
        return $_SERVER['DOCUMENT_ROOT'] . '../config/';
    }


    public function generateFile()
    {
        $root = $this->getConfigDirectory();
        if (strpos($this->configDir, '.php')){
            $this->configDir = $root . $this->configDir;
        }else {
            $this->configDir= $root . $this->configDir . '.php';
        }

        $this->checkFile($this->configDir);

    }

    public function checkFile($directory)
    {
        if (!file_exists($directory)) {
            $this->errorNotFound();
        }
    }

    public function errorNotFound()
    {
        throw new \Exception('not found file');
    }

    public function getFile()
    {
        $this->file = include $this->configDir;
    }
    public function generate()
    {
        foreach ($this->parameters as $key) {
            if (!isset($output)) {
                $output = $this->file[$key];
            } else {
                $output = $output[$key];
            }
        }
        $this->output = $output;

    }
}