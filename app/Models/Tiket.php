<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    protected $table = "daftar_tiket";

    protected $fillable = [
        'site_id',
        'site_name',
        'saverity',
        'suspect_problem',
        'time_down',
        'waktu_saat_ini',
        'status_site',
        'tim_fop',
        'remark',
        'ticket_swfm',
        'nop',
        'cluster_to'
    ];
}
