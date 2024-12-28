<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\ShopNews\ShopNewsRepository;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $shopNewsRepository;
    public function __construct(ShopNewsRepository $shopNewsRepository)
    {
        $this->shopNewsRepository = $shopNewsRepository;
    }
    public function index()
    {
        $shopNews = $this->shopNewsRepository->getAll();
        return view('admin.news.index', compact('shopNews'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required',
            'image_url' => 'required',
            'description' => 'required',
        ]);
        if( $request->hasFile('image_url')) {
            // Kiểm tra xem có file 'image_url' được upload không.
            $file = $request->file('image_url');
            // Lấy file từ request.
            $fileName = now()->format('y-m-d_H-i-s').$file->getClientOriginalName();
            // Tạo tên file mới bằng thời gian hiện tại và tên gốc.
            $file->move('uploads/news', $fileName);
            // Di chuyển file đến thư mục 'uploads/news'.
            $file_url = 'uploads/news/'.$fileName;
            // Tạo đường dẫn đầy đủ cho file vừa lưu.
        }
        $this->shopNewsRepository->createNews($request, $file_url);

        return redirect()->route('adminNews.index');
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
        $shopNew = $this->shopNewsRepository->findNews($id);
        return view('Admin.news.update', compact('shopNew'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);
        if( $request->hasFile('image_url')) {
            $file = $request->file('image_url');
            $fileName = now()->format('y-m-d_H-i-s').$file->getClientOriginalName();
            $file->move('uploads/news', $fileName);
            $file_url = 'uploads/news/'.$fileName;
        }
        else {
            $file_url = null;
        }
        // dd(1);
        $this->shopNewsRepository->updateNews($request, $id, $file_url);
        return to_route('adminNews.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->shopNewsRepository->deleteNews($id);
        return to_route('adminNews.index');
    }
}
