<?php

namespace PaySys\PaySys;

use Nette;


abstract class Gateway implements IGateway
{
	use Nette\SmartObject;

	/** @var callable[]  function (Payment $payment); Occurs before pay request */
	public $onBeforePayRequest;

	/** @var callable[]  function (Payment $payment); Occurs on pay request */
	public $onPayRequest;


	public function createButton(IPayment $payment) : Button {}
}
