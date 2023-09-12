<?php

namespace App\Models\Books;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function gender(){
        return $this->hasOne(BooksGender::class, 'id', 'gender_id');
    }
}
