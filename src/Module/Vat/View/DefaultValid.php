<?php


namespace Ssaran\Vies\Module\Vat\View;


class DefaultValid
{
    /** @var \DragonBe\Vies\CheckVatResponse */
    public $vatResult;

    /**
     * @param $backUrl
     * @return string
     */
    public function Render($backUrl)
    {
        $_html = '
    <div class="layout-content">
		<div class="layout-content-reset"><a id="content" name="content"></a>
	    <h2>VIES VAT number validation</h2>
	<fieldset>
		<table id="vatResponseFormTable">
			<tbody><tr>
		   		<td class="labelLeft" colspan="3">
		   			<b><span class="validStyle">Yes, valid VAT number</span></b>
		   		</td>
		   </tr>
		   
		   <tr>
	   			<td><br></td>
	   		</tr>
			<tr>
	   			<td class="labelStyle">Member State</td> 
	   			<td>'.$this->vatResult->getCountryCode().'</td>
	   			<td class="errorFormStyle"></td>
	   		</tr>
	   		<tr>
	   			<td class="labelStyle">VAT Number</td> 
	   			<td>'.$this->vatResult->getVatNumber().'</td>
	   		</tr>
	   		<tr>
	   			<td class="labelStyle">Date when request received</td> 
	   			<td>'.$this->vatResult->getRequestDate()->format('d/m/Y H:i').'</td>
	   		</tr>
	   		
				<tr>
	   				<td class="labelStyle">Name</td> 
	   				<td>'.$this->vatResult->getName().'</td>
	   				
	   			</tr>			
				<tr>
	   				<td class="labelStyle">Address</td> 
	   				<td>'.$this->vatResult->getAddress().'</td>
	   			</tr>
				<tr>
	   				<td class="labelStyle">INFO</td> 
	   				<td>There are more possible values in vat result object.<pre>'.print_r($this->vatResult,true).'</pre></td>
	   			</tr>
	   	</tbody></table>
	   	<br>
	   	<p><a href="'.$backUrl.'">Back</a></p>
  	</fieldset>

				</div>
			</div>
        ';

        return $_html;
    }
}