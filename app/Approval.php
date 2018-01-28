<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Approval extends Model
{
    protected $fillable = [
    	'accession_id', 'role_id', 'status', 'notes'
    ];

    public function role()
    {
    	return $this->belongsTo(Role::class);
    }

    public function accession()
    {
    	return $this->belongsTo(Accession::class);
    }
}
