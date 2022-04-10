<?php
namespace App;
use App\Product;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{   
    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $fillable = ['name','slug','description','image'];

    //connect to relationship
    public function Product(){
        return $this->hasToMany(Product::class);
    }


}