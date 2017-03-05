<?php

use PaySys\PaySys\Button;
use PaySys\PaySys\ButtonFactory;
use PaySys\PaySys\Gateway;
use PaySys\PaySys\IConfiguration;
use PaySys\PaySys\IPayment;
use Tester\Assert;

require __DIR__ . '/../../bootstrap.php';

$gateway = new class extends Gateway {};

$config = new class implements IConfiguration {
	function getButtonTemplate() : string {}
};

$payment = new class implements IPayment
{
	public function setAmount($amt) : IPayment {}

	public function getAmount() : string {}
};

$button = new Button($payment, $gateway, $config);

Assert::true($button instanceof Button);

$presenter = new class extends Nette\Application\UI\Presenter {};

$button->handlePay();
