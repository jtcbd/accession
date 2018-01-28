<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Accession extends Model
{
    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = [
        'accession_no_from', 'accession_no_to', 'total_number_of_object', 'collection_date',
        'file_no', 'made_of_collection', 'input_price', 'insurance_value', 'description_of_object',
        'classification_of_object', 'measurement', 'provenance_and_acquisition_history', 'period',
        'Personal_info', 'propsed_price', 'branch_museum', 'status'
    ];

    protected $dates = ['collection_date'];

    public function scopeFilter($query, $filters)
    {
        return $filters->apply($query);
    }

    /**
     * Mutator for AccessionDate attribute.
     *
     * @return void
     */
    public function setCollectionDateAttribute($value)
    {
        $this->attributes['collection_date'] = Carbon::parse($value);
    }

    /**
     * Accession belongs to Classifications.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function classification()
    {
        // belongsTo(RelatedModel, foreignKey = classifications_id, keyOnRelatedModel = id)
        return $this->belongsTo(Classification::class, 'classification_of_object');
    }

    public function approvals()
    {
        return $this->hasMany(Approval::class);
    }
}
