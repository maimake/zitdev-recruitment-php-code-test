<?php

namespace Test\Service;

use PHPUnit\Framework\TestCase;
use App\Service\AppLogger;

/**
 * Class ProductHandlerTest
 */
class AppLoggerTest extends TestCase
{

    public function testInfoLog()
    {
        $logger = new AppLogger('log4php');
        
        $this->expectOutputString("INFO - This is info log message
DEBUG - This is debug log message
ERROR - This is error log message
");
        
        $logger->info('This is info log message');
        $logger->debug('This is debug log message');
        $logger->error('This is error log message');
    }


    public function testInfoLogThinkLog()
    {
        $logger = new AppLogger('think-log');

        $this->expectOutputString("INFO - THIS IS INFO LOG MESSAGE
DEBUG - THIS IS DEBUG LOG MESSAGE
ERROR - THIS IS ERROR LOG MESSAGE
");
        
        $logger->info('This is info log message');
        $logger->debug('This is debug log message');
        $logger->error('This is error log message');
    }
}
