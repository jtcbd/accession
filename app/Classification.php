<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classification extends Model
{
    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = [
        'title_bn', 'title_en'
    ];
}
