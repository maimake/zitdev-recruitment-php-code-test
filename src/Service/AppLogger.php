<?php

namespace App\Service;

use App\Logger\ILogger;
use App\Logger\Log4PhpLogger;
use App\Logger\ThinkLogger;

class AppLogger implements ILogger
{
    const TYPE_LOG4PHP = 'log4php';
    const TYPE_THINKLOG = 'think-log';

    private $logger;
    
    public function __construct($type = self::TYPE_LOG4PHP)
    {
        if ($type == self::TYPE_LOG4PHP) {
            $this->logger = new Log4PhpLogger();
        } elseif ($type == self::TYPE_THINKLOG) {
            $this->logger = new ThinkLogger();
        } else {
            throw new \Exception("No driver for type : $type");
        }
    }
    
    public function info($message = '')
    {
        $this->logger->info($message);
    }

    public function debug($message = '')
    {
        $this->logger->debug($message);
    }

    public function error($message = '')
    {
        $this->logger->error($message);
    }
}
