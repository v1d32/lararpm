<?php namespace App\Models;

use App\Libraries\AutoCode;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\TraitActor;

class Member extends Model
{
    use SoftDeletes,TraitActor;
    protected $table = "members";
    protected $primaryKey = "id";
    protected $fillable = [
        'residental_num',
        'code',
        'name',
        'address',
        'birth_date',
        'phone_num',
        'filename_id',
        'file_path_id',
        'image_path_id',
        'filename_ft',
        'file_path_ft',
        'image_path_ft',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];



    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->code = AutoCode::lastCode('N-' . date('ymd'), 3);
        });
    }

//      public static function details() {
//        return GroupPegawai::join('pegawai_group', 'pegawai_group.id_group', '=', 'group_pegawai.id_group')
//                        ->join("pegawai as asm", "asm.id_pegawai", "=", "id_pegawai_asm")
//                        ->join("pegawai as manager", "manager.id_pegawai", "=", "id_pegawai_manager")
//                        ->join("cabang", "cabang.id_cabang", "=", "id_cabang_group");
//    }

    // Relationships

}
