<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAdminProductRequest;
use App\Repositories\ShopProduct\ShopProductRepository;
use App\Repositories\Category\CategoryRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $shopProductRepository;
    protected $categoryRepository;

    public function __construct(ShopProductRepository $shopProductRepository, CategoryRepository $categoryRepository)
    {
        $this->shopProductRepository = $shopProductRepository;
        $this->categoryRepository = $categoryRepository;
    }
    public function index()
    {
        $shopProducts = $this->shopProductRepository->getAll();
        return view('Admin.product.index', compact('shopProducts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = $this->categoryRepository->getAll();
        return view('Admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateAdminProductRequest $request)
    {
        // dd($request->hasFile('image_url'), $request->file('image_url'));
        if( $request->hasFile('image_url')) {
            $file = $request->file('image_url');
            $fileName = now()->format('y-m-d_H-i-s').$file->getClientOriginalName();
            $file->move('uploads/products', $fileName);
            $file_url = 'uploads/products/'.$fileName;
        }
        $this->shopProductRepository->createProduct($request, $file_url);
        return to_route('adminProduct.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = $this->categoryRepository->getAll();
        $product = $this->shopProductRepository->getProducts($id);
        // dd($product);
        return view('Admin.product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $file_url = null;
        if( $request->hasFile('image_url')) {
            $file = $request->file('image_url');
            $fileName = now()->format('y-m-d_H-i-s').$file->getClientOriginalName();
            $file->move('uploads/products', $fileName);
            $file_url = 'uploads/products/'.$fileName;
        }
        $this->shopProductRepository->updateProduct($request, $file_url, $id);
        return view('Admin.product.edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->shopProductRepository->deleteById($id);
        return to_route('adminProduct.index');
    }
}
