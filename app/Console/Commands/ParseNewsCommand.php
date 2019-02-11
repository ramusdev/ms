<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\ParsNews;
use GuzzleHttp\Client;
use Carbon\Carbon;

class ParseNewsCommand extends Command
{

    public $content;
    const URL = 'https://feed.laravel-news.com';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pars:news';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pars news';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->getContent();
        $this->parseContent();
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

        if (! empty($dataInsert))
        {
            $numberOfItems = count($dataInsert);
            ParsNews::insert($dataInsert);

            $this->info('The task was successfully finished! ' . 'Items inserted: ' . $numberOfItems);
        }
        else {
            $this->info('No items was inserted!');
        }
    }

    public function existsRecord($link)
    {
        $record = ParsNews::where('link', $link);

        if ($record->exists()) return true;
        else return false;
    }
}
