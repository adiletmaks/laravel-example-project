<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductsListResource extends JsonResource
{
    private array $filter;

    public function __construct($resource, array $filter)
    {
        $this->filter = $filter;
        parent::__construct($resource);
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        /* @var Paginator $this */

        return [
            'pagination' => [
                'per_page' => $this->perPage(),
                'total' => $this->total(),
                'has_more' => $this->hasMorePages(),
            ],
            'filter' => $this->filter,
            'data' => ProductsItemResource::collection(collect($this->items())),
        ];
    }
}
