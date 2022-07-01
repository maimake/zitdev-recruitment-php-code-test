<?php

declare(strict_types=1);


namespace App\Logger;


class Log4PhpLogger implements ILogger
{
    private $logger;
    
    static private $hadInitialized;

    public static function setup()
    {
        if(!self::$hadInitialized) {
            // 应该换成读配置文件，这里简化
            \Logger::configure(null);
            
            self::$hadInitialized = true;
        }
    }
    
    public function __construct($name = 'Log')
    {
        self::setup();
        $this->logger = \Logger::getLogger($name);
    }

    public function info($message = "")
    {
        $this->logger->info($message);
    }

    public function debug($message = "")
    {
        $this->logger->debug($message);
    }

    public function error($message = "")
    {
        $this->logger->error($message);
    }
}
