<?php

/*
 *
 * Base module for Vies vat module
 *
 */

namespace Ssaran\Vies\Module\Vat;

use Ssaran\Vies\Model\DB\DBViesVat;
use Ssaran\Vies\Model\DB\DBViesVatLog;
use Illuminate\Http\Request;
use DragonBe\Vies\Vies;
use DragonBe\Vies\ViesException;
use DragonBe\Vies\ViesServiceException;
use Illuminate\Support\Facades\Validator;


class Base
{

    /*
     * Generates form, it also accepts alternative form class for templating
     */
    public function GetForm($postUrl,$formClass=false)
    {
        try {
            if(!$formClass) {
                $view = new \Ssaran\Vies\Module\Vat\View\DefaultForm();
            } else {
                $view = new $formClass();
            }

            return $view->Render($postUrl);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /*
     * Parses vat number check requests.
     */
    public function CheckVatNumber(Request $request,$backUrl)
    {
        try {
            $vies = new Vies();
            if (false === $vies->getHeartBeat()->isAlive()) {
                throw new \Exception('Service is not available at the moment, please try again later.');
            }


            $validation = new Validation\ViesVat();

            $validator = Validator::make($request->all(), $validation->Rules);
            $validator->setAttributeNames($validation->Names);

            if ($validator->fails()) {
                $eMsg = implode("<br>", $validator->errors()->all());
                throw new \Exception($eMsg);
            }

            $vatResult = $vies->validateVat(
                $request->country_code,           // Trader country code
                $request->vat_number   // Trader VAT ID
            );


            if(!$vatResult->isValid()) {
                $view = new View\DefaultNotValid();
                $_output =  $view->Render();
                DBViesVatLog::RecordNew($request->country_code,$request->vat_number,time(),$request->ip(),json_encode($vatResult->toArray()),null);
            } else {
                $view = new View\DefaultValid();
                $view->vatResult = $vatResult;
                $_output =  $view->Render($backUrl);

                $record = DBViesVat::where('vat_number',$vatResult->getVatNumber())->first();
                if(!$record) {
                    $record = DBViesVat::RecordNew(
                        $vatResult->getCountryCode(),
                        $vatResult->getVatNumber(),
                        time(),
                        $vatResult->getIdentifier(),
                        $vatResult->getName(),
                        $vatResult->getAddress(),
                        $vatResult->getCompanyTypeMatch(),
                        $vatResult->getStreetMatch(),
                        $vatResult->getPostcodeMatch(),
                        $vatResult->getCityMatch()
                    );
                }

                DBViesVatLog::RecordNew($request->country_code,$request->vat_number,time(),$request->ip(),json_encode($vatResult->toArray()),$record->id);
            }

            return $_output;
        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }
}