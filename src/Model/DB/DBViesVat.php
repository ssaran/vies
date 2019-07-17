<?php


namespace Despatch\Vies\Model\DB;


class DBViesVat extends \Despatch\Vies\Model\ViesVat
{
    public static function RecordNew($countryCode,$vatNumber,$requestDate,$identifier=null,$traderName=null,$raderCompanyType=null,$traderStreet=null,$traderPostCode=null,$traderCity=null)
    {
        $r = new \Despatch\Vies\Model\ViesVat();
        $r->country_code = $countryCode;
        $r->vat_number = $vatNumber;
        $r->identifier = $identifier;
        $r->request_time = $requestDate;
        $r->trader_name = $traderName;
        $r->trader_company_type = ₺raderCompanyType;
        $r->trader_street = $traderStreet;
        $r->trader_post_code = $traderPostCode;
        $r->trader_city = $traderCity;
        $r->saveOrFail();
        return $r;
    }
}
