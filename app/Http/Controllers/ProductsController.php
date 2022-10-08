<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Log;

class ProductsController extends Controller
{
    public function list()
    {
        $products = Product::all();

        return response()->json([
            'info' => $products,
            'total' => $products->count()
        ]);
    }

    public function item($id)
    {
        $product = Product::find($id);
        if (is_null($product)) {
            return response()->json([
                'error' => 'Product not found'
            ]);
        }

        return response()->json([
            'info' => $product
        ]);
    }

    public function store(Request $request)
    {
        try {
            $info = $request->json()->all();
            $product = new Product();
            $product->title = $info['title'];
            $product->price = $info['price'];
            $product->brand = $info['brand'];
            $product->category = $info['category'];
            $product->image = $info['image'];
            $product->save();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json([
                'error' => 'Unable to save product'
            ]);
        }
        
        return response()->json([
            'info' => $product
        ]);
    }

    public function update(Request $request, $id)
    {
        try {
            $info = $request->json()->all();
            $product = Product::find($id);
            if (!is_null($product)) {
                $product->title = $info['title'];
                $product->price = $info['price'];
                $product->brand = $info['brand'];
                $product->category = $info['category'];
                $product->image = $info['image'];
                $product->save();
            } else {
                throw new Exception('Unable to find product');
            }
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json([
                'error' => 'Unable to update product'
            ]);
        }
        
        return response()->json([
            'info' => $product
        ]);
    }

    public function delete($id)
    {
        try {
            $product = Product::find($id);
            if (!is_null($product)) {
                $product->delete();
            } else {
                throw new Exception('Unable to find product');
            }
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json([
                'error' => 'Unable to update product'
            ]);
        }
        
        return response()->json([
            'info' => $product
        ]);
    }

    public function categories()
    {
        $categories = Product::distinct('category')
            ->select('category')
            ->get();
        
        return response()->json([
            'info' => $categories
        ]);
    }

    public function getByCategory($name)
    {
        $products = Product::where('category', $name)->get();

        return response()->json([
            'info' => $products,
            'total' => $products->count()
        ]);
    }

    public function search($keywords)
    {
        try {
            $products = Product::where('title', 'like', '%'.$keywords.'%')->get();

            return response()->json([
                'result' => 'Product/s found:',
                'info' => $products
            ]);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json([
                'error' => 'Unable to search product'
            ]);
        }
    }
}
