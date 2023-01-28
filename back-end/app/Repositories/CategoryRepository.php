<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository 
{
    protected $model;
    public function __construct(Category $model)
    {
        $this->model = $model;
    }
    public function getSubcategoriesIds($category) {
        $array = [$category->id];
        if(count($category->subcategories) == 0) {
            return $array;
        } 
        else  {
            return $array = array_merge($array, $this->getChildren($category->subcategories));
        }
    }
    public function getChildren($subcategories) {
        $array = array();
        foreach ($subcategories as $subcategory)  {
            array_push($array, $subcategory->id);
            if(count($subcategory->subcategories)){
                $array = array_merge($array, $this->getChildren($subcategory->subcategories));
            }
        }
        return $array;
    }
}