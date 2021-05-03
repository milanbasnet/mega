<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    // // soft delete-> not actually removed from database only deleted_at attribute is set and *use it in database migration
    // use SoftDeletes;  
    use HasFactory;
    protected $table='categories';
    protected $fillable=[
        'user_id', 'category_name'
    ];
// joining two tables with one one relationship here user table ko id category table ko user_id sanga join gareko

    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

}
