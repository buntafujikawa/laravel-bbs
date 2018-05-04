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
            $val['url'] = $node->filter('a.ga-link')->attr('href');

            $this->talks[] = $val;
        });

        return view('talks.index', [
            'talks' => $this->talks,
        ]);
    }

    public function show(string $name)
    {
        $client = new Client();
        $client->request('GET', "https://www.ted.com/talks/$name");

        if ($client->getResponse()->getStatus() != 200) {
            return view('common.errors');
        }

        return view('talks.show', [
            'url' => "https://embed.ted.com/talks/$name",
        ]);
    }
}
