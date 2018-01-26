<?php

namespace Bantenprov\PdrbHargaDasar\Models\Bantenprov\PdrbHargaDasar;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PdrbHargaDasar extends Model
{

    protected $table = 'ap_kasars';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('negara', 'province_id', 'kab_kota', 'regency_id', 'tahun', 'data');

    public function getProvince()
    {
        return $this->hasOne('Bantenprov\PdrbHargaDasar\Models\Bantenprov\PdrbHargaDasar\Province','id','province_id');
    }

    public function getRegency()
    {
        return $this->hasOne('Bantenprov\PdrbHargaDasar\Models\Bantenprov\PdrbHargaDasar\Regency','id','regency_id');
    }

}

