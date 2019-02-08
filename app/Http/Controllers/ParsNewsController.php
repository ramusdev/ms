<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ParsNews;
use GuzzleHttp\Client;
use Carbon\Carbon;

class ParsNewsController extends Controller
{
    public $content;
    const URL = 'https://feed.laravel-news.com';

    /**
     * Parsing new from laravel-news.com rss feed
     * 
     */
    public function pars()
    {
        $this->getContent();
        //$this->parseContent();
    }

    public function getContent()
    {
        $client = new Client();

        $request = $client->request('GET', self::URL);

        $body = $request->getBody();
        $this->content = $body->getContents();
    }

    public function parseContent()
    {
        $simpleXml = new \SimpleXMLElement($this->content);

        $dateNow = Carbon::now();

        foreach ($simpleXml->channel->item as $key => $value) {

            if ($this->existsRecord($value->link)) continue;

            $dataInsert[] = [
                'title' => $value->title,
                'link' => $value->link,
                'pub_date' => Carbon::parse($value->pubDate)->toDateTimeString(),
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ];
        }

        //ParsNews::insert($dataInsert);
    }

    public function existsRecord($link)
    {
        $record = ParsNews::where('link', $link);

        if ($record->exists()) return true;
        else return false;
    }
}
