<?php

use yii\helpers\Url;

class CreateBeratCest
{
    public function _before(\AcceptanceTester $I)
    {
        $I->amOnPage(Url::toRoute('/berat/create'));
    }
    
    public function beratPageWorks(AcceptanceTester $I)
    {
        $I->wantTo('ensure that create page works');
        $I->see('Save', 'button');
    }

    public function beratFormCanBeSubmitted(AcceptanceTester $I)
    {
        $I->amGoingTo('submit berat form with correct data');
        $I->fillField('#berat-tanggal', '2018-08-18');
        $I->fillField('#berat-max', '50');
        $I->fillField('#berat-min', '49');

        $I->click(['type' => 'submit']);
        
        $I->wait(2); // wait for button to be clicked

        $I->dontSeeElement('#berat-form');
        $I->see('Update');
    }
}
