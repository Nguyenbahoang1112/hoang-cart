<?php
namespace App\Repositories\ShopNews;
use App\Models\ShopNews;

class ShopNewsRepository {
    protected $shopNews;

    public function __construct(ShopNews $shopNews)
    {
        $this->shopNews = $shopNews;
    }

    public function getAll() {
        return $this->shopNews
                    ->select('*')
                    ->where('status',1)
                    ->get();
    }
    public function createNews($request, $file_url) {
        return $this->shopNews
                    ->create([
                        'title' => $request->title,
                        'image_url' => $file_url,
                        'description' => $request->description,
                    ]);
    }
    public function findNews($id) {
        return $this->shopNews->find($id);
    }
    public function updateNews($request, $id, $file_url) {
        if( $file_url == null) {
            return $this->shopNews
                        ->where('id', $id)
                        ->update([
                            'title' => $request->title,
                            'description' => $request->description,
                        ]);
        }
        else
            return $this->shopNews
                    ->where('id', $id)
                    ->update([
                        'title' => $request->title,
                        'image_url' => $file_url,
                        'description' => $request->description,
                    ]);
    }
    public function deleteNews($id) {
        return $this->shopNews
                    ->where('id', $id)
                    ->delete();
    }
}
