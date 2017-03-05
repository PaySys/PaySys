<?php

namespace PaySys\PaySys;


class ButtonFactory
{

	/** @var Gateway */
	private $gateway;

	/** @var IConfiguration */
	private $config;


	public function __construct(Gateway $gateway, IConfiguration $config)
	{
		$this->gateway = $gateway;
		$this->config = $config;
	}

	public function create(IPayment $payment) : Button
	{
		return new Button($payment, $this->gateway, $this->config);
	}
}
