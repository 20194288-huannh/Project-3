<?php

namespace App\Scraper;

use App\Models\Product;
use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;

class Crawl
{
    private $url;
    private $product;
    public function __construct($url)
    {
        $this->url = $url;
    }

    public function scrape()
    {
        $client = new Client();
        $crawler = $client->request('GET', $this->url);

        $crawler->filter('div.product-detailwrapper > div > div')->each(
            function (Crawler $node) {
                $name = $node->filter('span.headingtext')->text();
                $image = $node->filter('img')->attr('src');
                info($image);
                $description = $node->filter('#aboutbook p span')->text();
                $author = $node->filter('.authordetailtext label:nth-child(1) a')->text();
                $publisher = $node->filter('.authordetailtext label:nth-child(11) a')->text();
                $price = $node->filter('.maxprice label')->text();
                $shipping_time = $node->filter('.available p label:nth-child(1) b')->text();
                $shipping_cost = $node->filter('.available p label:nth-child(3)')->text();
                $sale = $node->filter('.ipadnopad .offer')->text();
                $sale = preg_match('/(?:\d{2})/', $sale);
                $data = [
                    'category_id' => 20,
                    'image' => $image,
                    'sale' => $sale,
                    'name' => $name,
                    'description' => $description,
                    'author' => $author,
                    'price' => (int) filter_var($price, FILTER_SANITIZE_NUMBER_INT),
                    'shipping_time' => $shipping_time,
                    'shipping_cost' => (int) filter_var($shipping_cost, FILTER_SANITIZE_NUMBER_INT)
                ];
                $this->product = Product::create($data);
            }
        );
        $crawler->filter('div#bookdetail')->each(
            function (Crawler $node) {
                $data = [];
                for ($i = 1; $i < 7; $i++){
                    $value = $node->filter("div:nth-child(2) ul li:nth-child({$i})")->text();
                    $key = $node->filter("div:nth-child(2) ul li:nth-child({$i}) .font-weight-bold")->text();
                    $key = strtolower(preg_replace("/[ -]/", "$1_$2", $key));
                    $key = preg_replace("/[:]/", "", $key);
                    $value = explode(': ', $value)[1];
                    $value = preg_replace("/( mm| gr)/", "", $value);
                    $data[$key] = $value;
                }
                for ($i = 1; $i < 6; $i++) {
                    $value = $node->filter("div:nth-child(3) ul li:nth-child({$i})")->text();
                    $key = $node->filter("div:nth-child(3) ul li:nth-child({$i}) .font-weight-bold")->text();
                    $key = strtolower(preg_replace("/[ -]/", "$1_$2", $key));
                    $key = preg_replace("/[:]/", "", $key);
                    $value = explode(': ', $value)[1];
                    $value = preg_replace("/( mm| gr)/", "", $value);
                    $data[$key] = $value;
                }
                if (array_key_exists('publisher_date', $data)) {
                    $data['publisher_date'] = \Carbon\Carbon::parse($data['publisher_date'])->format('Y-m-d');
                }
                unset($data['series_title']);
                unset($data['sub_title']);
                unset($data['depth']);
                info($data);
                // $publisher = $node->filter('div:nth-child(2) ul li:nth-child(2)')->text();
                // $publisher = explode(': ', $publisher)[1];
                // $binding = $node->filter('div:nth-child(2) ul li:nth-child(3)')->text();
                // $binding = explode(': ', $binding)[1];
                // $isbn_10 = $node->filter('div:nth-child(3) ul li:nth-child(1)')->text();
                // $isbn_10 = explode(': ', $isbn_10)[1];
                // $publisher_date = $node->filter('div:nth-child(3) ul li:nth-child(2)')->text();
                // $publisher_date = explode(': ', $publisher_date)[1];
                
                // $data = array_merge($data, [
                //     'publisher' => $publisher,
                //     'binding' => $binding,
                //     'isbn_10' => $isbn_10,
                //     'publisher_date' => \Carbon\Carbon::parse($publisher_date)->format('Y-m-d')
                // ]);
                $this->product->productDetail()->create($data);
                
            }
        );
    }
}