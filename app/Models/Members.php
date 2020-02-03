<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\TraitActor;

class Members extends Model
{

//CREATE TABLE `members` (
//`id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
//`residental_num` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
//`code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
//`name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
//`address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
//`birth_date` date NOT NULL,
//`phone_num` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
//`created_by` int(11) DEFAULT NULL,
//`updated_by` int(11) DEFAULT NULL,
//`deleted_by` int(11) DEFAULT NULL,
//`created_at` timestamp NULL DEFAULT NULL,
//`updated_at` timestamp NULL DEFAULT NULL,
//`deleted_at` timestamp NULL DEFAULT NULL,
//PRIMARY KEY (`id`)
//) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


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
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected static function rules($id = false)
    {
        return [
            "residental_num" => "required|unique:members|max:16",
            "name" => "required",
            "address" => "required",
            "birth_date" => "required",
        ];
    }


//      public static function details() {
//        return GroupPegawai::join('pegawai_group', 'pegawai_group.id_group', '=', 'group_pegawai.id_group')
//                        ->join("pegawai as asm", "asm.id_pegawai", "=", "id_pegawai_asm")
//                        ->join("pegawai as manager", "manager.id_pegawai", "=", "id_pegawai_manager")
//                        ->join("cabang", "cabang.id_cabang", "=", "id_cabang_group");
//    }

    // Relationships

}
