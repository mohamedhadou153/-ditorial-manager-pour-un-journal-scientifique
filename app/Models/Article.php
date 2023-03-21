<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'authorId',
        'title',
        'category',
        'abstract',
        'etat',
        'obj_pdf',
        'pic',
    ];
}
