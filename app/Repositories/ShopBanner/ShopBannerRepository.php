<?php
namespace App\Repositories\ShopBanner;
use App\Models\ShopBanner;

class ShopBannerRepository {
    protected $shopBanner;

    public function __construct(ShopBanner $shopBanner)
    {
        $this->shopBanner = $shopBanner;
    }

    public function getAll() {
        return $this->shopBanner
                    ->select('*')
                    ->where('status', 1)
                    ->get();
    }
    public function createBanner($request, $image_path) {
        return $this->shopBanner
                    ->create([
                        'name' => $request->name,
                        'image_url' => $image_path,
                    ]);
    }
    public function getBannerById($id) {
        return $this->shopBanner
                    ->select('*')
                    ->where('id', $id)
                    ->first();
    }
    public function updateBanner($request, $id, $image_path) {
        if($image_path == null) {
            return $this->shopBanner
                        ->where('id', $id)
                        ->update([
                            'name' => $request->name,
                        ]);
        } else {
            // dd($request);
            return $this->shopBanner
                        ->where('id', $id)
                        ->update([
                            'name' => $request->name,
                            'image_url' => $image_path,
                        ]);
        }
    }
    public function deleteBanner($id) {
        return $this->shopBanner
                    ->where('id', $id)
                    ->delete();
    }

}
