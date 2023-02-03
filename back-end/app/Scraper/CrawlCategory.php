<?php

namespace App\Scraper;

use App\Models\Category;
use App\Models\Product;
use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;
use simple_html_dom;

class CrawlCategory
{
    private $url;
    private $category_1;
    private $category_2;
    private $category_3;
    public function __construct($url)
    {
        $this->url = $url;
    }

    public function scrape()
    {
        $crawler = file_get_html($this->url);
        foreach ($crawler->find('ul.bullet-link') as $ul) {
            $name = $ul->find('.first-leve', 0)->plaintext;
            $this->category_1 = Category::where('name', $name)->first();
            if ($this->category_1 == []) { 
                $this->category_1 = Category::create([
                    'name' => $name,
                    'level' => 1,
                    'parent_id' => null,
                ]);
            }

            $name = $ul->find('.second-leve', 0)->plaintext;
            $this->category_2 = new Category(['name'=> $name, 'level' => 2]);
            $this->category_2 = $this->category_1->children()->save($this->category_2);
            foreach ($ul->find('.third-leve') as $li) {
                $name = $li->plaintext;
                $this->category_3 = new Category(['name'=> $name, 'level' => 3]);
                $this->category_3 = $this->category_2->children()->save($this->category_3);
            }
        }
    }
}
