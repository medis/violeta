<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;
use GuzzleHttp\Client;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use App\Transformers\InstagramTransformer;

class InstagramController extends Controller
{

    public function index($page = null) {
        $data = $this->getData();

        $manager = new Manager();
        $resource = new Collection($data, new InstagramTransformer());
        $manager->parseIncludes('characters');

        return $manager->createData($resource)->toArray();
    }

    private function getData() {
        $data = [];
        if (Cache::has('instagram')) {
            $data = Cache::get('instagram');
        }
        else {
            $guzzle = new Client();
            $res = $guzzle->get('https://www.instagram.com/violetaskya/media');
            $data = json_decode((string) $res->getBody(), true)['items'];
            $minutes = Carbon::now()->addDay();
            Cache::put('instagram', $data, $minutes);
        }

        return $data;
    }
}