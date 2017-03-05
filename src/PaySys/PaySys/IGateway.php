<?php

namespace PaySys\PaySys;


interface IGateway
{

	/**
	 * Button factory
	 * @param  IPayment $payment
	 * @return Button
	 */
	public function createButton(IPayment $payment) : Button;
}
