<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {
          // Get the search query from the request
        $searchQuery = $request->input('search');

        // Get the sort order from the request (default to 'name_asc')
        $sortOrder = $request->input('sort', 'name_asc');

        // Set the column and direction for the sorting based on the sort order
        switch ($sortOrder) {
            case 'name_asc':
                $sortColumn = 'name';
                $sortDirection = 'asc';
                break;
            case 'name_desc':
                $sortColumn = 'name';
                $sortDirection = 'desc';
                break;
            case 'price_asc':
                $sortColumn = 'price';
                $sortDirection = 'asc';
                break;
            case 'price_desc':
                $sortColumn = 'price';
                $sortDirection = 'desc';
                break;
            default:
                $sortColumn = 'name';
                $sortDirection = 'asc';
                break;
        }

        // Get the products based on the search query and sort order
        if(isset($searchQuery) && strlen($searchQuery) > 0) {
            $products = Product::where('name', 'LIKE', '%'.$searchQuery.'%')->orderBy($sortColumn, $sortDirection)->paginate(6);
        } else {
            $products = Product::orderBy($sortColumn, $sortDirection)->paginate(9);
        }

        return view('shop', compact('products'));

    }
    


}


