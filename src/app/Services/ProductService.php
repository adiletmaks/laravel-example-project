<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ProductService
{
    /**
     * @param array $filters
     * @return Paginator
     */
    public function getProducts(array $filters = []) : Paginator
    {
        $query = Product::with([
            'user',
            'color',
            'categories',
            'tags'
        ]);

        foreach ($filters as $filter => $value) {
            $relation = $this->getRelationFromFilter($filter);
            $query->whereHas($relation, function(Builder $q) use ($value) {
                $ids = Arr::wrap($value);
                $q->whereIn('id', $ids);
            });
        }

        return $query->paginate(10);
    }

    /**
     * @param Request $request
     * @return array
     */
    public function getFilter(Request $request) : array
    {
        $filters = $request->only(['categories_id', 'tags_id', 'color_id']);

        return array_filter($filters);
    }

    /**
     * @param string $filter
     * @return string
     */
    protected function getRelationFromFilter(string $filter) : string
    {
        return str_replace('_id', '', $filter);
    }
}
