<?php

/*
 *
 * This is thin controller.
 * it just handle end points.
 *
 * all executed code come from module classes
 *
 */


namespace Ssaran\Vies\Controller;

use Ssaran\Vies\Module\Vat\Base;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class VatTestController extends Controller
{

    public function index(Request $request)
    {
        $_module = new Base();
        return $_module->GetForm(route('api.vies.vat.check'));
    }

    public function check(Request $request)
    {
        $_module = new Base();
        return $_module->CheckVatNumber($request,route('api.vies.vat.form'));
    }
}