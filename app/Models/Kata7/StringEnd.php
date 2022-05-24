<?php

namespace App\Models\Kata7;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StringEnd extends Model
{
    use HasFactory;

    protected $table = 'kata7_string_end';
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'text',
        'text_ending',
    ];
}
