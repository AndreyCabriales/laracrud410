<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\Products\StoreRequest;
use App\Http\Requests\Products\UpdateRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$products = Product::get(); //Obtener todos lo datos de la tabla
        $products = Product::paginate(4);
        return view('Dashboard/products/index', compact('products'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        //$brands = Brand::get(); Para obtener todos los datos de un modelo o tabla
        $brands = Brand::pluck('id','brand');//obtener datos especificos
        //dd($brands);//Verificar que los datos se esten extrayendo
        return view('Dashboard/products/create', compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        //echo "Store Productos";
        //dd($request);
        //dd($request->all);
        $data = $request->all();

        if(isset($data["imagen"])){
            //Cambiar el nombre del archivo a cargar
            $data["imagen"] = $filename = time(). ".".$data["imagen"]->extension();
            //Guardar imagen en la carpeta pùblica
            $request->imagen->move(public_path("image/products"), $filename);
        }

        Product::create($data);
        return to_route('products.index')->with('status', 'Producto Registrado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        if(isset($data["imagen"])){
            //Cambiar el nombre del archivo a cargar
            $data["imagen"] = $filename = time(). ".".$data["imagen"]->extension();
            //Guardar imagen en la carpeta pùblica
            $product->imagen->move(public_path("image/products"), $filename);
        }
        
        return view('Dashboard/products/show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $brands = Brand::pluck('id','brand');
        echo view ('Dashboard/products/edit',compact('brands','product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Product $product)
    {
        $data = $request->all();

        //Si el campo imagen tiene información
        if(isset($data["imagen"])){
            //Cambiar el nombre del archivo a cargar
            $data["imagen"] = $filename = time(). ".".$data["imagen"]->extension();
            //Guardar imagen en la carpeta pùblica
            $request->imagen->move(public_path("image/products"), $filename);
        }

        $product->update($data);//actualizamos los datos en la base de datos
        return to_route('products.index') -> with ('status' , 'Producto Actualizado');
    }

    public function delete(Product $product){
        echo view ('Dashboard/products/delete', compact('product'));
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return to_route('products.index')->with('status', 'Producto Eliminado');
    }

}
