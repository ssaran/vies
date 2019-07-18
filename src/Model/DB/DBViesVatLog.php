<?php


namespace Ssaran\Vies\Model\DB;


class DBViesVatLog extends \Ssaran\Vies\Model\ViesVatLog
{
    /**
     * @param $countryCode
     * @param $vatNumber
     * @param $requestDate
     * @param $clientIP
     * @param $response
     * @param null $viesVatID
     * @return \Ssaran\Vies\Model\ViesVatLog
     * @throws \Throwable
     */
    public static function RecordNew($countryCode,$vatNumber,$requestDate,$clientIP,$response,$viesVatID=null)
    {
        $r = new \Ssaran\Vies\Model\ViesVatLog();
        $r->vies_vat_id  = $viesVatID;
        $r->country_code = $countryCode;
        $r->vat_number = $vatNumber;
        $r->ip = $clientIP;
        $r->response = $response;
        $r->request_time = $requestDate;
        $r->saveOrFail();
        return $r;
    }
}

