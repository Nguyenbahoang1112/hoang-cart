<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\ShopBanner\ShopBannerRepository;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $shopBannerRepository;
    public function __construct(ShopBannerRepository $shopBannerRepository)
    {
        $this->shopBannerRepository = $shopBannerRepository;
    }
    public function index()
    {
        return view('admin.banner.index', [
            'banners' => $this->shopBannerRepository->getAll()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'image_url' => 'required',
        ]);
        if ($request->hasFile('image_url')) {
            $file = $request->file('image_url');
            $image_name = now()->format('Y-m-d_H-i-s').$file->getClientOriginalExtension();
            $file->move(public_path('uploads/banner'), $image_name);
            $image_path = 'uploads/banner/'.$image_name;
        }
        $this->shopBannerRepository->createBanner($request, $image_path);
        return to_route('adminBanner.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // dd($this->shopBannerRepository->getBannerById($id));
        return view('Admin.banner.update', [
            'banner' => $this->shopBannerRepository->getBannerById($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($request->hasFile('image_url')) {
            $file = $request->file('image_url');
            $image_name = now()->format('Y-m-d_H-i-s').$file->getClientOriginalExtension();
            $file->move(public_path('uploads/banner'), $image_name);
            $image_path = 'uploads/banner/'.$image_name;
        }
        else {
            $image_path = null;
        }
        // dd($request);
        $this->shopBannerRepository->updateBanner($request, $id, $image_path);
        return to_route('adminBanner.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->shopBannerRepository->deleteBanner($id);
        return to_route('adminBanner.index');
    }
}
