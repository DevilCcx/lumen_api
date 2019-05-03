<?php

namespace App\Api\V1\Controllers\Module;

use App\Api\Request\GlobalReq;
use App\Jobs\ExampleJob;
use Dingo\Api\Http\Request;
use Dingo\Api\Routing\Helpers;
use App\Api\ApiBaseController;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
use Zttp\Zttp;

class ResourceController extends ApiBaseController
{
    //dingo api 的一些工具
    use Helpers;

    /**
     * dingo api 返回使用示范
     *
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function getResources(Request $request, $id)
    {
        $this->globalRequest($request);
        GlobalReq::setParams(['id'=>$id]);
        GlobalReq::getParams();
        return $this->response->array([$id]);
    }


    /**
     * curl工具类使用示范
     */
    public function testCurl()
    {
        $res = \Illuminate\Support\Facades\Cache::store('array')->get('test');
        dd($res);
        $url = 'https://xmall.pc.xisland.cn/index.php/admin/hotel.Hotel/getHotelList';

        //post 自定义头部内容
        $response = Zttp::withHeaders(['Fancy' => 'Pants'])->post($url, [
            'foo' => 'bar',
            'baz' => 'qux',
        ]);

        //post 带参数的请求
        $response = Zttp::asFormParams()->post($url, [
            'foo' => 'bar',
            'baz' => 'qux',
        ]);

        //patch
        $response = Zttp::patch($this->url('/patch'), [
            'foo' => 'bar',
            'baz' => 'qux',
        ]);

        //delete
        $response = Zttp::delete($this->url('/delete'), [
            'foo' => 'bar',
            'baz' => 'qux',
        ]);

        //添加请求头
        $response = Zttp::accept('banana/sandwich')->post($url);

        // int
        $response->status();

        // true / false
        $response->isOk();

        //everything
        $response->json();

    }

    /**
     * rabbitMQ调用示范
     *
     * @return \Dingo\Api\Http\Response
     */
    public function testRabbitMQ()
    {
        Log::notice('启动队列');
        $this->dispatch(new ExampleJob());
        return $this->response->noContent();
    }

    /**
     * 缓存使用示范测试
     *
     * @return \Dingo\Api\Http\Response
     */
    public function testCache()
    {
        Cache::put('xmall:orders:ticket', 456, 5);
        Redis::setex('site_name', 10, 'Lumen的redis');
        Redis::connection()->lpush('xisland', [123, 5]);
        Redis::connection('cache')->lpush('xisland', [123, 5]);
        return $this->response->array([]);
    }
}
