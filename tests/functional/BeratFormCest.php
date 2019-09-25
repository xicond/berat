<?php

class BeratFormCest
{
    public function _before(\FunctionalTester $I)
    {
        $I->amOnRoute('berat/index');
        $I->see('Create Berat', 'a');
        $I->click('Create Berat');
    }

    public function createWithEmptyData(\FunctionalTester $I)
    {
        $I->submitForm('#berat-form', []);
        $I->expectTo('see validations errors');
        $I->see('Tanggal cannot be blank.');
        $I->see('Max cannot be blank.');
        $I->see('Min cannot be blank.');
    }

    public function createSuccess(\FunctionalTester $I)
    {
        $I->submitForm('#berat-form', [
            'Berat[tanggal]' => '2018-09-08',
            'Berat[max]' => '50',
            'Berat[min]' => '49',
        ]);
        $I->see('Update');
        $I->dontSeeElement('form#berat-form');              
    }
}