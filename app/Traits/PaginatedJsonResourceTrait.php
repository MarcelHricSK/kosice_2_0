<?php

namespace App\Traits;

trait PaginatedJsonResourceTrait
{
    public function withPaginationData($data)
    {
        $class = new static();
        $class->with = [
            'total' => 1
        ];

        return $class;
    }
}
