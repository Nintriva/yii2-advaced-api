<?php
use tests\codeception\api\FunctionalTester;
use tests\codeception\api\_pages\AboutPage;

$I = new FunctionalTester($scenario);
$I->wantTo('ensure that about works');
AboutPage::openBy($I);
$I->see('About', 'h1');
