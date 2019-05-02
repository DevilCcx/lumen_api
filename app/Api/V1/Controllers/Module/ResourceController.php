<?php

namespace App\Api\V1\Controllers\Module;

use App\Api\GlobalRequest\ApiRequest;
use Dingo\Api\Http\Request;
use Dingo\Api\Routing\Helpers;
use App\Api\ApiBaseController;
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
        ApiRequest::setParams(['tt'=>123]);
        ApiRequest::getParams();
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
}
