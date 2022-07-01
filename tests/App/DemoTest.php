<?php
/*
 * @Date         : 2022-03-02 14:49:25
 * @LastEditors  : Jack Zhou <jack@ks-it.co>
 * @LastEditTime : 2022-03-02 17:22:16
 * @Description  : 
 * @FilePath     : /recruitment-php-code-test/tests/App/DemoTest.php
 */

namespace Test\App;

use App\App\Demo;
use App\Service\AppLogger;
use App\Util\HttpRequest;
use PHPUnit\Framework\TestCase;


class DemoTest extends TestCase {

    public function test_foo() {

    }

    public function test_get_user_info() {

        $response = '{ "error": 0, "data": { "id": 1, "username": "hello world" } }';
        $stub_request = $this->createStub(HttpRequest::class);
        $stub_request->method('get')->willReturn($response);
        
        $expect = json_decode($response, true)['data'];
        
        $service = new Demo(new AppLogger(), $stub_request);
        $res = $service->get_user_info();
        
        $this->assertEquals($expect, $res);
        
    }
}
