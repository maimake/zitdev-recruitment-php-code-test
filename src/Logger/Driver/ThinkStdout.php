<?php

declare(strict_types=1);


namespace App\Logger\Driver;


class ThinkStdout
{
    /**
     * 日志写入接口
     * @access public
     * @param  array $log 日志信息
     * @return bool
     */
    public function save(array $log): bool
    {
        foreach ($log as $type => $val) {
            foreach ($val as $msg) {
                if (!is_string($msg)) {
                    $msg = var_export($msg, true);
                }
                
                echo strtoupper($type) . " - " . $msg . PHP_EOL;
            }
        }
        
        return true;
    }
}
