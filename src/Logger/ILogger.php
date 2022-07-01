<?php

declare(strict_types=1);


namespace App\Logger;


interface ILogger
{
    public function info($message = "");
    public function debug($message = "");
    public function error($message = "");
}
