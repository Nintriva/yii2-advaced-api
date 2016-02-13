<?php
$I = new \tests\codeception\api\ApiTester($scenario);
$I->wantTo('create an empty user');
$I->haveHttpHeader('Content-Type', 'application/x-www-form-urlencoded');
$I->haveHttpHeader('Authorization', 'Bearer tUu1qHcde0diwUol3xeI-18MuHkkprQI');
//$I->haveHttpHeader('Authorization', 'Bearer 11');
//$I->sendPOST('users', ['username' => 'davert2', 'email' => 'davert2@codeception.com']);
$I->sendPOST('users');
//$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContains('{"success":false,"data":[{"field":"username","message":"Username cannot be blank."},{"field":"email","message":"Email cannot be blank."}]}');
?>
