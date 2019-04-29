<?php

namespace App\Api\V1\Controllers\Module;

use Dingo\Api\Http\Request;
use Dingo\Api\Routing\Helpers;
use Laravel\Lumen\Routing\Controller as BaseController;

class ResourceController extends BaseController
{
    use Helpers;

    public function getResources(Request $request, $id)
    {
        return $this->response->array([$id]);
    }
}
