<?php
namespace App;
use App\Product;
use App\User;

 

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{   
    protected $table = 'cart';
    protected $primaryKey = 'id';
    protected $fillable = ['user_id','product_id'];



    public function user(){
        return $this->belongsTo(User::class);
     }
     
     public function product(){
        return $this->belongsTo(Product::class);
     }


}