<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function featuredCategories(Request $request)
    {
        try {
            $categories = Category::where('featured', 1)->where('status', 1)->take(6)->get();
            return response()->json([
                'success'   => true,
                'categories'      => $categories
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'success'   => false,
                'message'   => $th,
                // 'data'      => $categories
            ]);
        }
    }
}
