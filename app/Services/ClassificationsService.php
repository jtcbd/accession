<?php

namespace App\Services;

use App\Classification;

class ClassificationsService
{
    /**
     * Retrive all classifications
     *
     * @return [type] [description]
     */
    public function all()
    {
        return Classification::orderBy('title_en')->get();
    }
}
