<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\CommonHelper;
use App\Repositories\Admin\AdminRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminStoreRequest;
use App\Http\Requests\UpdateAdminProfileRequest;
use App\Http\Requests\UpdatePasswordRequest;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    protected $adminRepository;

    public function __construct(AdminRepository $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }
    public function index()
    {
        $admins = $this->adminRepository->getAll();
        return view('Admin.profile.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.profile.create');
    }

    public function store(AdminStoreRequest $adminStoreRequest)
    {
        $this->adminRepository->storeAdmin($adminStoreRequest);
        return to_route('adminProfile.index');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $adminById = $this->adminRepository->getAdminById($id);
        return view('Admin.profile.update', compact('adminById'));
    }
    public function updatePassword(UpdatePasswordRequest $request,string $id)
    {
        if($request->password_current == $request->password)
        {

        }
    }
    /**
     * Update the specified resource in storage.
     */
    public function uploadFile(Request $request)
    {
        $file = $request->avatar_img;
        $file_name = now()->format('y-m-d_H-i-s').$file->getClientOriginalName();
        $file->move(public_path('uploads/avatar'), $file_name);
        return 'uploads/avatar/'.$file_name;
    }
    public function update(UpdateAdminProfileRequest $request, string $id)
    {
        if($request->hasFile('avatar_img') != null)
        {
            $file_url = $this->uploadFile($request);
            $this->adminRepository->updateImage($file_url, $id);
        }
        $this->adminRepository->updateAdmin($request, $id);
        return to_route('adminProfile.index');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->adminRepository->deleteById($id);
        return to_route('adminProfile.index');
    }
}
