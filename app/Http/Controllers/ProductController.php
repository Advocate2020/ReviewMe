<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Company;
use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products.index')->with('types', ProductType::orderBy('name', 'asc')->get())->with('companies', Company::orderBy('name', 'asc')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'image' => ['required', 'image'],
            'type_id' => 'required',
            'company_id' => 'required'
        ]);

        $imagePath = request('image')->store('uploads', 'public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();

        $product = new Product();
        $product->name = request('name');
        $product->type_id = request('type_id');
        $product->company_id = request('company_id');
        $product->image = $imagePath;
        $product->status = 'Active';
        $product->slug = Str::slug(request('name'), '-');
        $product->save();

        session()->flash('message','Product created successfully.');

        return redirect()->to('/products')->with('types', ProductType::orderBy('name', 'asc')->get())->with('companies', Company::orderBy('name', 'asc')->get());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $types = ProductType::orderBy('name', 'asc')->get();
        $product = Product::whereId($id)->first();
        return view('products.edit',compact('types','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = request()->validate([
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'image' => '',
            'type_id' => 'required'
        ]);

        if(request('image'))
        {
            $imagePath = request('image')->store('uploads', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
            $image->save();
            $imageArray = ['image' => $imagePath];
        }


        $product = Product::find($id)->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        session()->flash('message','Product updated successfully.');

        return back()->with('types', ProductType::orderBy('name', 'asc')->get());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::where('id',$id)->update(['status' => 'InActive']);
        session()->flash('message','Product deleted successfully.');
        return back()->with('types', ProductType::orderBy('name', 'asc')->get());
    }
}
