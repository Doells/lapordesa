<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    // Supabase menggunakan UUID, bukan integer auto-increment
    public $incrementing = false;
    protected $keyType = 'string';

    // Matikan timestamps bawaan karena dikelola oleh PostgreSQL (Supabase)
    public $timestamps = false;

    // Kolom yang boleh diisi melalui form
    protected $fillable = ['title', 'description', 'status'];
}