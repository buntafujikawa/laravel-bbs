<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;

class ScrapingController extends Controller
{
    private $talks = [];

    public function index()
    {
        $client = new Client();
        $crawler = $client->request('GET', "https://www.ted.com/talks");

        $crawler->filter('.talk-link')->each(function ($node) {
            $val['speaker'] = $node->filter('.talk-link__speaker')->text();
            $val['title'] = $node->filter('.media__message .ga-link')->text();
            $val['img'] = $node->filter('.thumb__image')->attr('src');

            $this->talks[] = $val;
        });

        return view('scraping.index', [
            'talks' => $this->talks,
        ]);
    }
}
