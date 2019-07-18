<?php


namespace Ssaran\Vies\Model;

use Illuminate\Database\Eloquent\Model;


class ViesVatLog extends Model
{
    protected $table = 'vies_vat_log';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'vies_vat_id',
        'country_code',
        'vat_number',
        'ip',
        'response',
        'request_time'
    ];
}
