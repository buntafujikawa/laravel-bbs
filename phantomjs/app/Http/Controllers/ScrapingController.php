<?php

namespace App\Http\Controllers;

use JonnyW\PhantomJs\Client;
use Illuminate\Http\Request;

class ScrapingController extends Controller
{
    public function index()
    {
        $client = Client::getInstance();
        $client->getEngine()->setPath('/Users/bunta.fujikawa/workspace/laravel-exercise/phantomjs/vendor/bin/phantomjs');

        $request = $client->getMessageFactory()->createRequest('https://www.ted.com/talks/matt_cutts_try_something_new_for_30_days/transcript', 'GET');
        $response = $client->getMessageFactory()->createResponse();

        $client->send($request, $response);
        if($response->getStatus() === 200) {
            echo $response->getContent();
        }

        $talks = ['hoge', 'fuga',];

        return view('ted', ['talks' => $talks,]);
    }
}
