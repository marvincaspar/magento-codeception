<?php

use Faker\Factory;

class CatalogCest
{
    /** @var Faker\Generator */
    protected $faker;

    public function _before(AcceptanceTester $I)
    {
        $this->faker = Factory::create("de_DE");
    }

    public function _after(AcceptanceTester $I)
    {
    }

    public function seeProductDetailPage(AcceptanceTester $I)
    {
        $I->wantTo('See the product detail page');
        $I->amOnPage('/');
        $I->click('Lafayette Convertible Dress');

        // PDP
        $I->seeCurrentURLEquals('/lafayette-convertible-dress.html');
        $I->click(['css' => '#swatch27']);
        $I->click(['css' => '#swatch74']);
        $I->click('Add to Cart');

        // Cart
        $I->seeCurrentURLEquals('/checkout/cart/');
        $I->click('Proceed to Checkout');

        // Checkout
        $I->seeCurrentURLEquals('/checkout/onepage/');
        $I->click('Continue');
        // Checkout - Billing information
        $I->waitForElementVisible('#opc-billing button');
        $I->fillField(['name' => 'billing[firstname]'], $this->faker->firstName);
        $I->fillField(['name' => 'billing[lastname]'], $this->faker->lastName);
        $I->fillField(['name' => 'billing[email]'], $this->faker->safeEmail);
        $I->fillField(['name' => 'billing[street][]'], $this->faker->streetName);
        $I->fillField(['name' => 'billing[city]'], $this->faker->city);
        $I->selectOption(['name' => 'billing[country_id]'], 'DE');
        $I->selectOption(['name' => 'billing[region_id]'], '88');
        $I->fillField(['name' => 'billing[postcode]'], $this->faker->postcode);
        $I->fillField(['name' => 'billing[telephone]'], $this->faker->phoneNumber);
        $I->scrollTo(['css' => '#opc-billing button']);
        $I->click(['css' => '#opc-billing button']);
        // Checkout - Shipping method
        $I->waitForElementVisible('#opc-shipping_method button');
        $I->click(['css' => '#s_method_freeshipping_freeshipping']);
        $I->scrollTo(['css' => '#opc-shipping_method button']);
        $I->click(['css' => '#opc-shipping_method button']);
        // Checkout - Payment information
        $I->waitForElementVisible('#opc-payment button');
        $I->scrollTo(['css' => '#opc-payment button']);
        $I->click(['css' => '#opc-payment button']);
        // Checkout - Order review
        $I->waitForElementVisible('#opc-review button');
        $I->scrollTo(['css' => '#opc-review button']);
        $I->click(['css' => '#opc-review button']);

        // Order confirmation page
        $I->waitForJs('return document.readyState == "complete"');
        $I->waitForJS('return !!window.jQuery && window.jQuery.active == 0;');
        $I->wait(1);
        $I->seeCurrentURLEquals('/checkout/onepage/success/');
        $I->see('Thank you for your purchase!', ['css' => 'h2']);
    }
}
