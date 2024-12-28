<?php
namespace App\Repositories\Admin;

use App\Models\Admin;
use Illuminate\Support\Facades\Request;

class AdminRepository
{
    protected $admin;

    public function __construct(Admin $admin)
    {
        $this->admin = $admin;
    }
    public function getAll() {
        return $this->admin
                    ->select('avatar_img','id','name','email')
                    ->orderBy('id','desc')
                    ->get();
    }
    public function getAdminById($id) {
        return $this->admin
                    ->select('id','name','email')
                    ->where('id', $id)
                    ->first();
    }
    // string $name, string $email, string $password
    public function storeAdmin($request) {
        return $this->admin
                    ->create([
                        'name' => $request->name,
                        'email' => $request->email,
                        'password' => bcrypt($request->password), // bcrypt password
                    ]);
    }
    public function updateAdmin($request, $id)
    {
        return $this->admin
                ->where('id', $id)
                ->update([
                    'name' => $request->name,
                    'email' => $request->email,
                ]);
    }
    public function updateImage($image_url, $id)
    {
        return $this->admin
                ->where('id', $id)
                ->update([
                    'avatar_img' => $image_url,
                ]);
    }
    // public function updatePassword(Request $request, $id)
    // {
    //     return $this->admin
    //                 ->where('id', $id)
    //                 ->update([
    //                     'password' => bcrypt($request->password),
    //                 ]
    //                 );
    // }
    public function deleteById($id)
    {
        return $this->admin
                    ->where('id', $id)
                    ->delete();
    }
}

?>
