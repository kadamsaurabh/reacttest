<?php
namespace App;
use App\Product;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{   
    protected $table = 'subcategories';
    protected $primaryKey = 'id';
    protected $fillable = ['category_id','name'];

    //connect to relationship
    public function Product(){
        return $this->hasToMany(Product::class);
    }


}