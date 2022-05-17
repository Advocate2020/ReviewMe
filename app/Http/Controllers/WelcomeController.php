<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Product;
use App\Models\Review;
use App\Models\CompanyReview;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        return view('welcome')->with('products', Product::where('status','Active')->orderBy('created_at', 'desc')->get());
    }
    public function showproduct($slug)
    {
        $product = Product::where('slug',$slug)->firstOrFail();
        $reviews = Review::where('product_id',$product->id)->get();

        return view('products.show',compact('product','reviews'));
    }
    public function showcompany($slug)
    {
        $company = Company::where('slug',$slug)->firstOrFail();
        $reviews = CompanyReview::where('company_id',$company->id)->get();
        return view('company.show',compact('company','reviews'));
    }
}
