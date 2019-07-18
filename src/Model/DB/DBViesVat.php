<?php


namespace Ssaran\Vies\Model\DB;


class DBViesVat extends \Ssaran\Vies\Model\ViesVat
{
    /**
     * @param string $countryCode
     * @param string $vatNumber
     * @param int $requestDate
     * @param null $identifier
     * @param null $traderName
     * @param null $traderAddress
     * @param null $traderCompanyType
     * @param null $traderStreet
     * @param null $traderPostCode
     * @param null $traderCity
     * @return \Ssaran\Vies\Model\ViesVat
     * @throws \Throwable
     */
    public static function RecordNew($countryCode,$vatNumber,$requestDate,$identifier=null,$traderName=null,$traderAddress=null,$traderCompanyType=null,$traderStreet=null,$traderPostCode=null,$traderCity=null)
    {
        $r = new \Ssaran\Vies\Model\ViesVat();
        $r->country_code = $countryCode;
        $r->vat_number = $vatNumber;
        $r->identifier = $identifier;
        $r->request_time = $requestDate;
        $r->trader_name = $traderName;
        $r->trader_address = $traderAddress;
        $r->trader_company_type = $traderCompanyType;
        $r->trader_street = $traderStreet;
        $r->trader_post_code = $traderPostCode;
        $r->trader_city = $traderCity;
        $r->saveOrFail();
        return $r;
    }
}

