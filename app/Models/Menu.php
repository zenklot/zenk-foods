<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $table = 'menus';
    protected $fillable = ['nama_menu', 'keterangan','harga','stok','seller','kategori_menu','image'];
    
    
    public function scopeFilter($query, array $filters){
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('nama_menu', 'like', '%' .$search . '%')
           ->orWhere('kategori_menu', 'like', '%'.$search . '%');
       });

       $query->when($filters['sort'] ?? false, function ($query, $search) {
           if ($search == 'seller') {
               return $query->orderBy('seller', 'desc');               
           }else if($search == 'foods'){
               return $query->where('kategori_menu', 'like', '%makanan%')
               ->orderBy('seller', 'desc');
           }else if($search == 'drinks'){
               return $query->where('kategori_menu', 'like', '%minuman%')
               ->orderBy('seller', 'desc');
           }
        });


    }
}
