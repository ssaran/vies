<?php


namespace Ssaran\Vies\Module\Vat\View;


class DefaultNotValid
{
    public function Render()
    {
        $_html = '
            <strong>VatID is not Valid</strong>
            No, invalid VAT number for cross border transactions within the EU
        ';

        return $_html;
    }
}