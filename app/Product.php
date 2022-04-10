<?php

namespace App;
use App\Category;
use App\Subcategory;
use App\Wishlist;
use App\Cart;



use App\Employee;


use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';

    protected $fillable = ['name','image','price','description','additional_info','category_id','subcategory_id'];

    //connect to relationship
    public function category(){
        return $this->hasOne(Category::class, 'id','category_id');
    }

    public function subcategory(){
        return $this->hasOne(Subcategory::class, 'id','subcategory_id');
    }

    public function employee(){
        return $this->hasOne(Employee::class, 'id','subcategory_id');
    }


    public function wishlist(){
        return $this->hasToMany(Wishlist::class);
     }

     public function cart(){
        return $this->hasToMany(Cart::class);
     }
    
    //  public function user()
    // {
    //     return $this->belongsToMany(User::class, 'wishlist' );
    // }
}