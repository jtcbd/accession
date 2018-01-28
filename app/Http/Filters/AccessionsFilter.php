<?php

namespace App\Http\Filters;

class AccessionsFilter extends QueryFilter
{
    public function status($status)
    {
        $status = $status == 'approved' ? true : null;

        return $this->builder->where('status', $status);
    }

    public function classification($classification)
    {
        return $this->builder->where('classification_of_object', $classification);
    }
}
