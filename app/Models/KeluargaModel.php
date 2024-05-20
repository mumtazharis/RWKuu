<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KeluargaModel extends Model
{
    use HasFactory;

    protected $table = 'keluarga';
    protected $primaryKey = 'nomor_kk';

    protected $fillable = ['nomor_kk', 'nik_kepala_keluarga', 'alamat_kk', 'kelas_ekonomi', 'kepemilikan_id'];

    public function kepalaKeluarga(): BelongsTo{
        return $this->belongsTo(WargaModel::class, 'nik');
    }

    public function angggota(): HasMany{
        return $this->hasMany(WargaModel::class, 'nomor_kk');
    }

    public function alamat(): BelongsTo{
        return $this->BelongsTo(RTModel::class, 'rt_id');
    }

    public function kepemilikan(): BelongsTo{
        return $this->belongsTo(KepemilikanModel::class, 'kepemilikan_id');
    }

    public function iuran(): HasMany{
        return $this->hasMany(IuranModel::class, 'nik');
    }
}
