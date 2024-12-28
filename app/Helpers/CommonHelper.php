<?php
    namespace App\Helpers;

    use Illuminate\Support\Facades\Storage;

    class CommonHelper
    {
        public static function uploadImage($file, $folderPath) {
            // Đặt tên file (tránh trùng lặp bằng timestamp)
        $fileName = time() . '.' . $file->getClientOriginalExtension();

        // Đường dẫn thư mục
        $destinationPath = public_path($folderPath);

        // Kiểm tra thư mục nếu chưa tồn tại thì tạo
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        // Kiểm tra nếu file đã tồn tại, xóa file cũ
        if (file_exists($destinationPath . '/' . $fileName)) {
            unlink($destinationPath . '/' . $fileName);
        }

        // Di chuyển file đến thư mục
        $file->move($destinationPath, $fileName);

        // Trả về URL của file vừa lưu
        return asset($folderPath . '/' . $fileName);
        }
    }
?>
