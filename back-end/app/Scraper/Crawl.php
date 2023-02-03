<?php

namespace App\Scraper;

use App\Models\Category;
use App\Models\Product;
use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;
use simple_html_dom;

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
        $link = file_get_html($this->url);
        $i = 1;
        foreach($link->find('div.product-summary > .title > a') as $a) {
            if ($i == 11) {
                return;
            }
            $url = $a->href;
            $crawler = file_get_html($url);
            foreach ($crawler->find('div.product-detailwrapper > div > div') as $node) {
                $name = $node->find('span.headingtext', 0)->plaintext;
                if (Product::where('name', $name)->first()) {
                    continue;
                }
                $image = $node->find('img', 0)->src;
                if ($description = $node->find('#aboutbook p span', 0)) {
                    $description = $node->find('#aboutbook p span', 0)->plaintext;
                }
                $author = $node->find('.authordetailtext label:nth-child(1) a', 0)->plaintext;
                $publisher = $node->find('.authordetailtext label:nth-child(11) a', 0)->plaintext;
                $price = 0;
                if ($node->find('.maxprice label', 0)) {
                    $price = $node->find('.maxprice label', 0)->plaintext;
                }
                $shipping_time = $node->find('.available p label:nth-child(1) b', 0)->plaintext;
                $shipping_cost = $node->find('.available p label:nth-child(3)', 0)->plaintext;
                $sale = 0;
                if ($sale = $node->find('.ipadnopad .offer', 0)) {
                    $sale = $node->find('.ipadnopad .offer', 0)->plaintext;
                }
                $sale = preg_match('/(?:\d{2})/', $sale);
                $data = [
                    'image' => $image,
                    'sale' => $sale,
                    'name' => $name,
                    'description' => $description,
                    'author' => $author,
                    'price' => (int) filter_var($price, FILTER_SANITIZE_NUMBER_INT),
                    'shipping_time' => $shipping_time,
                    'shipping_cost' => (int) filter_var($shipping_cost, FILTER_SANITIZE_NUMBER_INT),
                ];
                $this->product = Product::create($data);
                foreach ($crawler->find('ul.blacklistreview') as $ul) {
                    foreach ($ul->find('li') as $li){
                        if ($li->find('a', 2) != null) {
                            $name = $li->find('a', 2)->plaintext;
                            $category = Category::where('name', $name)->first();
                            if($category) {
                                $this->product->categories()->attach([$category->id]);
                            }
                        }
                    }
                }
    
            }
            $data = [];
            foreach ($crawler->find('div#bookdetail ul') as $ul) {
                foreach ($ul->find('li') as $li) {
                    $value = $li->plaintext;
                    $key = $li->plaintext;
                    $key_value = explode(':  ', $key);
                    $key = $key_value[0];
                    $key = strtolower(preg_replace("/[ -]/", "$1_$2", $key));
                    $value = $key_value[1];
                    $value = preg_replace("/( mm| gr)/", "", $value);
                    $data[$key] = $value;
                }
            }
            if (array_key_exists('publisher_date', $data)) {
                $data['publisher_date'] = \Carbon\Carbon::parse($data['publisher_date'])->format('Y-m-d');
            }
            unset($data['series_title']);
            unset($data['sub_title']);
            unset($data['depth']);
            if ($this->product) {        
                $this->product->productDetail()->create($data);
            }
            $i++;
        }
    }
}