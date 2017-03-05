<?php

use PaySys\PaySys\Gateway;
use PaySys\PaySys\IGateway;
use Tester\Assert;

require __DIR__ . '/../../bootstrap.php';

$gateway = new class extends Gateway {};

Assert::true($gateway instanceof Gateway);
Assert::true($gateway instanceof IGateway);

$a = $b = 0;

Assert::true($a === 0);
Assert::true($b === 0);

$gateway->onBeforePayRequest[] = function () use (& $a) {
	$a++;
};

$gateway->onPayRequest[] = function () use (& $b) {
	$b++;
};

$gateway->onBeforePayRequest();
$gateway->onPayRequest();

Assert::same(1, $a);
Assert::same(1, $b);
