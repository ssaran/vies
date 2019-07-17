<?php


namespace Ssaran\Vies\Module\Vat\Validation;


use Illuminate\Validation\Rule;

class ViesVat
{
    public $Rules;
    public $Names;

    public function __construct()
    {
        $this->Rules = [
            'country_code'=>['required',Rule::in(["AT","BE","BG","CY","CZ","DE","DK","EE","EL","ES","FI","FR","GB","HR","HU","IE","IT","LT","LU","LV","MT","NL","PL","PT","RO","SE","SI","SK"])],
            'vat_number'=>'required|string|min:2|max:50,regex:[A-Za-z0-9]'
        ];

        $this->Names = [
            'country_code'=> '<strong>Country Code</strong>: ',
            'vat_number'=> '<strong>Vat Number</strong>: '
        ];
    }
/*
 * More spesific regex check for future.
 * ^(
(AT)?U[0-9]{8} |                              # Austria
(BE)?0[0-9]{9} |                              # Belgium
(BG)?[0-9]{9,10} |                            # Bulgaria
(CY)?[0-9]{8}L |                              # Cyprus
(CZ)?[0-9]{8,10} |                            # Czech Republic
(DE)?[0-9]{9} |                               # Germany
(DK)?[0-9]{8} |                               # Denmark
(EE)?[0-9]{9} |                               # Estonia
(EL|GR)?[0-9]{9} |                            # Greece
(ES)?[0-9A-Z][0-9]{7}[0-9A-Z] |               # Spain
(FI)?[0-9]{8} |                               # Finland
(FR)?[0-9A-Z]{2}[0-9]{9} |                    # France
(GB)?([0-9]{9}([0-9]{3})?|[A-Z]{2}[0-9]{3}) | # United Kingdom
(HU)?[0-9]{8} |                               # Hungary
(IE)?[0-9]S[0-9]{5}L |                        # Ireland
(IT)?[0-9]{11} |                              # Italy
(LT)?([0-9]{9}|[0-9]{12}) |                   # Lithuania
(LU)?[0-9]{8} |                               # Luxembourg
(LV)?[0-9]{11} |                              # Latvia
(MT)?[0-9]{8} |                               # Malta
(NL)?[0-9]{9}B[0-9]{2} |                      # Netherlands
(PL)?[0-9]{10} |                              # Poland
(PT)?[0-9]{9} |                               # Portugal
(RO)?[0-9]{2,10} |                            # Romania
(SE)?[0-9]{12} |                              # Sweden
(SI)?[0-9]{8} |                               # Slovenia
(SK)?[0-9]{10}                                # Slovakia
)$
 *
 */
}