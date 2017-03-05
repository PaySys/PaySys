<?php

namespace PaySys\PaySys;

use Nette;
use Nette\Application\UI\Control;


/**
 * @property Nette\Application\UI\ITemplate $template
 */
class Button extends Control
{

	/** @var IPayment */
	private $payment;

	/** @var Gateway */
	private $gateway;

	/** @var IConfiguration */
	private $config;


	public function __construct(IPayment $payment, Gateway $gateway, IConfiguration $config)
	{
		parent::__construct();
		$this->payment = $payment;
		$this->gateway = $gateway;
		$this->config = $config;
	}

	public function render()
	{
		$template = $this->template;
		$template->setFile($this->config->getButtonTemplate());
		$template->render();
	}

	public function handlePay()
	{
		$this->gateway->onBeforePayRequest($this->payment);
		$this->gateway->onPayRequest($this->payment);
	}
}
