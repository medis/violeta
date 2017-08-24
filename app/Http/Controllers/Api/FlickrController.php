<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;
use GuzzleHttp\Client;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use App\Transformers\FlickrTransformer;

use JeroenG\Flickr\Api as FlickerApi;
use JeroenG\Flickr\Flickr;

class FlickrController extends Controller
{

    protected $flickr;

    public function __construct() {
        $this->flickr = new Flickr(new FlickerApi(config('app.FLICKR_KEY'), 'php_serial'));
    }

    public function index($page = null) {
        $data = $this->getData();

        $manager = new Manager();
        $resource = new Collection($data->photos['photo'], new FlickrTransformer());
        $manager->parseIncludes('characters');

        return $manager->createData($resource)->toArray();
    }

    private function getData() {
        $data = [];
        if (Cache::has('flickr')) {
            $data = Cache::get('flickr');
        }
        else {
            $data = $this->flickr->request('flickr.people.getPublicPhotos', [
                'user_id' => '150896280@N05',
                'extras'  => 'url_s, url_z, url_c, url_l, url_o'
            ]);
            $minutes = Carbon::now()->addDay();
            Cache::put('flickr', $data, $minutes);
        }

        return $data;
    }
}