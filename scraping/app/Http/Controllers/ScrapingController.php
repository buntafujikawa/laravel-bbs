<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;

class ScrapingController extends Controller
{
    public function index()
    {
        $client = new Client();
        $crawler = $client->request('GET', "https://www.ted.com/talks");
        $crawler->filter('title')->each(function ($node) {
            echo $node->text() . "\n";
        });
    }
}
