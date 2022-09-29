<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function products(Request $request)
    {
        return response()->json([
            'title' => 'Jacket',
            'description' => 'Given Jacket Description',
            'currency' => 'PHP',
            'price' => 1234.56,
            'brand' => 'KuyaWill',
            'category' => 'apparel',
            'image' => 'https://netstorage-kami.akamaized.net/images/0fgjhs1shmj74jpi4g.jpg?&imwidth=1200',
        ]);
    }
}
