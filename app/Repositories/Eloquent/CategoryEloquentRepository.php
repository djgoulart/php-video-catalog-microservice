<?php

namespace App\Repositories\Eloquent;

use App\Models\Category as Model;
use Core\Domain\Entity\Category;
use Core\Domain\Repository\CategoryRepositoryInterface;

class CategoryEloquentRepository implements CategoryRepositoryInterface
{
    protected $model;

    public function __construct(Model $category)
    {
        $this->model = $category;
    }

    public function findAll(
        string $filter = '',
        string $orderColumn = 'id',
        string $order = 'DESC'
    ): array {
        return [];
    }

    public function findById(string $id): Category
    {
        return new Category(name: 'name');
    }

    public function insert(Category $category): Category
    {
        $category = $this->model->create([
            'id' => $category->id(),
            'name' => $category->name,
            'description' => $category->description,
            'is_active' => $category->isActive,
        ]);

        return $this->toCategory($category);
    }

    public function update(Category $category): Category
    {
        return new Category(name: 'name');
    }

    public function delete(string $id): bool
    {
        return true;
    }

    private function toCategory(object $object): Category
    {
        return new Category(
            name: $object->name
        );
    }
}
