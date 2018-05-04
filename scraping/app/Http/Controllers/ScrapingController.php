<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;

class ScrapingController extends Controller
{
    private $talks = [];

    public function fetchTalkList()
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

        return view('scraping.index', [
            'talks' => $this->talks,
        ]);
    }

    public function fetchTalkDescription()
    {
//        $client = new Client();
//        $crawler = $client->request('GET', "https://www.ted.com/talks/rebecca_kleinberger_our_three_voices");
        // <div style="max-width:854px"><div style="position:relative;height:0;padding-bottom:56.25%"><iframe src="https://embed.ted.com/talks/rebecca_kleinberger_our_three_voices" width="854" height="480" style="position:absolute;left:0;top:0;width:100%;height:100%" frameborder="0" scrolling="no" allowfullscreen></iframe></div></div>
    }
}
