<?php
    namespace App\Repositories\Category;

use App\Models\Category;

    class CategoryRepository {
        protected $categoryRepository;

        public function __construct(Category $categoryReposity)
        {
            $this->categoryRepository = $categoryReposity;
        }

        public function getAll() {
            return $this->categoryRepository
            ->select('*')
            ->where('status', 1)
            ->get();
        }
    }
?>
