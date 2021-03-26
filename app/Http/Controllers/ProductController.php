<?php

namespace App\Http\Controllers;

use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $products = Product::orderBy('updated_at','desc')->paginate(10);

        return view('products.index',['products'=>$products]);
    }

    public function upload()
    {
        return view('products.upload');
    }

    public function import(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'attatchement'=>'required|mimes:xlsx,xls',
        ]);

        if($validation->fails()){
            return redirect()->back()->withErrors($validation)->withInput();
        }

        $file = $request->file('attatchement');
        // dd($request->file('attatchement'));
        Excel::queueImport(new ProductsImport, $file);

        return redirect()->back()->with([
            "message"   => "importing started successfuly",
            "alert-type" => "success"
        ]);        
    }

    public function export(Request $requesrt)
    {
        return Excel::download(new ProductsExport, 'products.xlsx'.date('Y-m-d').'.xlsx', \Maatwebsite\Excel\Excel::XLSX);
        
        //return (new ProductsExport)->download('products.xlsx'.date('Y-m-d'), \Maatwebsite\Excel\Excel::XLSX);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
