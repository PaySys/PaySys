<?php

namespace PaySys\PaySys;

use Nette;


/**
 * @method void onBeforePayRequest(IPayment $payment)
 * @method void onPayRequest(IPayment $payment)
 */
abstract class Gateway implements IGateway
{
	use Nette\SmartObject;

	/** @var callable[]  function (IPayment $payment); Occurs before pay request */
	public $onBeforePayRequest;

	/** @var callable[]  function (IPayment $payment); Occurs on pay request */
	public $onPayRequest;


	public function createButton(IPayment $payment) : Button {}
}
