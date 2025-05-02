<?php
 
 namespace App\Models;
 
 use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\Factories\HasFactory;
 use Illuminate\Database\Eloquent\Relations\BelongsTo;
 use Illuminate\Foundation\Auth\User as Authenticatable; 
 use Tymon\JWTAuth\Contracts\JWTSubject;
 use Illuminate\Database\Eloquent\Casts\Attribute;
 use App\Models\TransaksiModel;
 class BarangModel extends Model
 {
     use HasFactory;
 
     protected $table = 'm_barang';
     protected $primaryKey = 'barang_id';
     protected $fillable = [
         'barang_id',
         'kategori_id',
         'barang_kode',
         'barang_nama',
         'harga_beli',
         'harga_jual',
     ];
 
     public function kategori():BelongsTo
     {
         return $this->belongsTo(KategoriModel::class, 'kategori_id', 'kategori_id');}

         public function image(): Attribute
    {
        return Attribute::make (
            get: fn ($image) => url('/storage/post/' . $image),
        );
    }

    public function transaksis()
    {
        return $this->hasMany(TransaksiModel::class, 'barang_id');
    }
}