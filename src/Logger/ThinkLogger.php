<?php

declare(strict_types=1);


namespace App\Logger;


use App\Logger\Driver\ThinkStdout;
use think\facade\Log;

class ThinkLogger implements ILogger
{
    static private $hadInitialized;

    public static function setup()
    {
        if(!self::$hadInitialized) {
            // 应该换成读配置文件，这里简化
            Log::init([
                // 默认日志记录通道
                'default'      => 'Log',
                // 日志通道列表
                'channels'     => [
                    'Log' => [
                        // 日志记录方式
                        'type'        => ThinkStdout::class,
                    ],
                ],
            ]);

            self::$hadInitialized = true;
        }
    }


    private $logger;
    
    public function __construct($name = 'Log')
    {
        self::setup();
        $this->logger = Log::channel($name);
    }


    public function info($message = "")
    {
        $this->logger->info($this->formatMessage($message));
    }

    public function debug($message = "")
    {
        $this->logger->debug($this->formatMessage($message));
    }

    public function error($message = "")
    {
        $this->logger->error($this->formatMessage($message));
    }
    
    protected function formatMessage($msg)
    {
        return strtoupper($msg);
    }
}
