<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['name', 'inn', 'ogrn', 'address', 'director_name', 'legal_document', 'legal_form'];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
