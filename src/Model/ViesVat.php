<?php


namespace Ssaran\Vies\Model;

use Illuminate\Database\Eloquent\Model;


class ViesVat extends Model
{
    protected $table = 'vies_vat';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'country_code',
        'vat_number',
        'request_time',
        'trader_name',
        'trader_company_type',
        'trader_street',
        'trader_post_code',
        'trader_city',
        'identifier',
    ];
}
