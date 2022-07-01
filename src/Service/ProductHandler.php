<?php

namespace App\Service;

class ProductHandler
{
    static public function getTotalPrice(?array $products):float
    {
        $totalPrice = 0;
        foreach ($products ?? [] as $product) {
            $price = $product['price'] ?: 0;
            $totalPrice += $price;
        }
        return $totalPrice;
    }
    
    static public function getDessertProductsSortByPrice(?array $products):array
    {
        if (is_null($products))
        {
            return [];
        }
        
        $rtn = array_filter($products, function ($item) {
            return strtolower($item['type']) == 'dessert';
        });
        
        usort($rtn, function ($a, $b) {
            return ($a['price'] ?? 0) < ($b['price'] ?? 0);
        });
        
        return $rtn;
    }
    
    static public function transformProductsCreateTime(?array $products):?array
    {
        if (is_null($products))
        {
            return $products;
        }
        
        return array_map(function ($item) {
            $item['create_at'] = strtotime($item['create_at']);
            return $item;
        }, $products);
    }
}
