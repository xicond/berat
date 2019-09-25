<?php

namespace tests\unit\models;

use app\models\Berat;
use yii\mail\MessageInterface;

class BeratTest extends \Codeception\Test\Unit
{
    public function testFindById()
    {
        expect_that($model = Berat::findIdentity(100));
        expect($model->username)->equals('admin');
        expect_not(Berat::findIdentity(999));
    }
    public function testFindUserByUsername()
    {
        expect_that($model = Berat::findByUsername('admin'));
        expect_not(Berat::findByUsername('not-admin'));
    }
    /**
     * @depends testFindUserByUsername
     */
    public function testValidation($model)
    {
        $model = Berat::findByUsername('admin');
        expect_that($model->validateAuthKey('test100key'));
        expect_not($model->validateAuthKey('test102key'));
        expect_that($model->validatePassword('admin'));
        expect_not($model->validatePassword('123456'));        
    }
}
