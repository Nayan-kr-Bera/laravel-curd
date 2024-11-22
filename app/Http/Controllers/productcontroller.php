<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\validator;
use Illuminate\Support\Facades\File;


class productcontroller extends Controller
{
    //this method show products page
    public function index(){

        $products = product::orderBy('created_at','DESC')->get();

        

        return view('products.list',[
            'products'=> $products
        
    
    ]);

      

    }
    //this massage will show create product page
    public function create(){
        return view('products.create');

    }
    //this method store or insert a product

    public function store(Request $req){


        $rules=[
            'name'=> 'required|min:5',
            'sku'=> 'required|min:3',
            'price'=> 'required|numeric'
        ];

    if ($req->image != ""){
        $rules['image']= 'image';
    }


$validator=validator::make($req->all(),$rules);


if($validator->fails()){
    return redirect()->route('products.create')->withinput()->withErrors($validator);
}

//here we will store product in database
$product= new product();
$product->name =$req->name;
$product->sku =$req->sku;
$product->price =$req->price;
$product->description =$req->description;
$product->save();



if ($req->image != ""){
//here will store img
$image = $req->image;

$ext = $image->getClientOriginalExtension();

$imageName=time().'.'.$ext;//unique image name

//save image to products directory
$image->move(public_path('uploads/products'), $imageName);

//save image name database
$product->image = $imageName;
$product->save();

}


return redirect()->route('products.index')->with('success','product added successfully');


    }

    //this method will show edit product page
    public function edit($id){
        $product=product::findOrFail($id);
        return view('products.edit',[
            'product'=>$product
        ]);
     

    }
    //this method will update a product
    public function update($id,Request $req){

        $product=product::findOrFail($id);


          $rules=[
            'name'=> 'required|min:5',
            'sku'=> 'required|min:3',
            'price'=> 'required|numeric'
        ];

    if ($req->image != ""){
        $rules['image']= 'image';
    }


$validator=validator::make($req->all(),$rules);


if($validator->fails()){
    return redirect()->route('products.edit',$product->id)->withinput()->withErrors($validator);
}

//here we will update product in database

$product->name =$req->name;
$product->sku =$req->sku;
$product->price =$req->price;
$product->description =$req->description;
$product->save();



if ($req->image != ""){
//delete old image
File::delete(public_path('uploads/products/'.$product->image));

//here will store img
$image = $req->image;

$ext = $image->getClientOriginalExtension();

$imageName=time().'.'.$ext;//unique image name

//save image to products directory
$image->move(public_path('uploads/products'), $imageName);

//save image name database
$product->image = $imageName;
$product->save();

}


return redirect()->route('products.index')->with('success','product updated successfully');


    
    }
    //this method will delete a product
    public function delete($id){
        $product=product::findOrFail($id);
        //delete image
        File::delete(public_path('uploads/products/'.$product->image));
        //delete product from database

        $product->delete();
        return redirect()->route('products.index')->with('success','product deleted successfully');
}

}
