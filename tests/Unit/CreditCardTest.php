<?php
namespace Unit;

use CreditCardUtil\CreditCard;

class CreditCardTest  extends \PHPUnit\Framework\TestCase{
	
	public function testDiscoverBrandName()
    {

		$this->assertEquals('mastercard', CreditCard::discoverBrandName('5555666677778884'));
		$this->assertEquals('mastercard', CreditCard::discoverBrandName('5555 6666 7777 8884'));
		$this->assertEquals('mastercard', CreditCard::discoverBrandName('5555555555554444'));
		$this->assertEquals('mastercard', CreditCard::discoverBrandName('5485755481460022'));
		$this->assertEquals('mastercard', CreditCard::discoverBrandName('5141331902596939'));
		$this->assertEquals('mastercard', CreditCard::discoverBrandName('5381579886310193'));
		$this->assertEquals('mastercard', CreditCard::discoverBrandName('5261400319746371'));
		$this->assertEquals('mastercard', CreditCard::discoverBrandName('2223000148400010'));
		$this->assertEquals('mastercard', CreditCard::discoverBrandName('2223020000000005'));
		$this->assertEquals(false, CreditCard::discoverBrandName('55555555555544444'));

		$this->assertEquals('visa', CreditCard::discoverBrandName('4024007175795698'));
		$this->assertEquals('visa', CreditCard::discoverBrandName('4012888888881881'));
		$this->assertEquals('visa', CreditCard::discoverBrandName('4242424242424242'));
		$this->assertEquals('visa', CreditCard::discoverBrandName('4111111111111111'));
		$this->assertEquals('visa', CreditCard::discoverBrandName('4012001037141112'));
		$this->assertEquals('visa', CreditCard::discoverBrandName('4929145634524261'));
		$this->assertEquals('visa', CreditCard::discoverBrandName('4916515890086533'));
		$this->assertEquals('visa', CreditCard::discoverBrandName('4716402666880187'));
		$this->assertEquals('visa', CreditCard::discoverBrandName('4556269877662537'));
		$this->assertEquals('visa', CreditCard::discoverBrandName('4024007116472373'));

		$this->assertEquals('amex', CreditCard::discoverBrandName('349219898313230'));
		$this->assertEquals('amex', CreditCard::discoverBrandName('379219898313230'));
		$this->assertEquals('amex', CreditCard::discoverBrandName('376411112222331'));
		$this->assertEquals('amex', CreditCard::discoverBrandName('378282246310005'));
		$this->assertEquals('amex', CreditCard::discoverBrandName('371449635398431'));
		$this->assertEquals('amex', CreditCard::discoverBrandName('376449047333005'));
		$this->assertEquals('amex', CreditCard::discoverBrandName('371266379815580'));
		$this->assertEquals('amex', CreditCard::discoverBrandName('341733959575519'));
		$this->assertEquals('amex', CreditCard::discoverBrandName('347964939237987'));
		$this->assertEquals('amex', CreditCard::discoverBrandName('344124263180625'));
		$this->assertEquals('amex', CreditCard::discoverBrandName('374287609161667'));

		$this->assertEquals('discover', CreditCard::discoverBrandName('6011081276442427'));
		$this->assertEquals('discover', CreditCard::discoverBrandName('6221081276442427'));
		$this->assertEquals('discover', CreditCard::discoverBrandName('6421081276442427'));
		$this->assertEquals('discover', CreditCard::discoverBrandName('6521081276442427'));
		$this->assertEquals('discover', CreditCard::discoverBrandName('6011049357288928'));
		$this->assertEquals('discover', CreditCard::discoverBrandName('6011009088354001'));
		$this->assertEquals('discover', CreditCard::discoverBrandName('6011863958499563'));
		$this->assertEquals('discover', CreditCard::discoverBrandName('6011049357288928'));

		$this->assertEquals('diners', CreditCard::discoverBrandName('30139356829271'));
		$this->assertEquals('diners', CreditCard::discoverBrandName('30539356829271'));
		$this->assertEquals('diners', CreditCard::discoverBrandName('36539356829271'));
		$this->assertEquals('diners', CreditCard::discoverBrandName('38539356829271'));
		$this->assertEquals('diners', CreditCard::discoverBrandName('30569309025904'));
		$this->assertEquals('diners', CreditCard::discoverBrandName('38520000023237'));
		$this->assertEquals('diners', CreditCard::discoverBrandName('36490102462661'));
		$this->assertEquals('diners', CreditCard::discoverBrandName('30168350022868'));
		$this->assertEquals('diners', CreditCard::discoverBrandName('30137150168494'));
		$this->assertEquals('diners', CreditCard::discoverBrandName('30072056509709'));

		$this->assertEquals('jcb', CreditCard::discoverBrandName('3579868499812548'));
		$this->assertEquals('jcb', CreditCard::discoverBrandName('3543075239371354'));
		$this->assertEquals('jcb', CreditCard::discoverBrandName('3580853692786068'));
		$this->assertEquals('jcb', CreditCard::discoverBrandName('3580339453141453'));

		$this->assertEquals('aura', CreditCard::discoverBrandName('5079868499812548'));
		$this->assertEquals('aura', CreditCard::discoverBrandName('5031688913211342'));
		$this->assertEquals('aura', CreditCard::discoverBrandName('5050438604774398'));
		$this->assertEquals('aura', CreditCard::discoverBrandName('5014130146658131'));

		$this->assertEquals('hipercard', CreditCard::discoverBrandName('6079868499812548'));
		$this->assertEquals('hipercard', CreditCard::discoverBrandName('6062825624254001'));
		$this->assertEquals('hipercard', CreditCard::discoverBrandName('6062825666385648'));
		$this->assertEquals('hipercard', CreditCard::discoverBrandName('6062822141610138'));
		$this->assertEquals('hipercard', CreditCard::discoverBrandName('6062821101094622'));

		$this->assertEquals('elo', CreditCard::discoverBrandName('6363688499812548'));
		$this->assertEquals('elo', CreditCard::discoverBrandName('6363698499812548'));
		$this->assertEquals('elo', CreditCard::discoverBrandName('4389358499812548'));
		$this->assertEquals('elo', CreditCard::discoverBrandName('5041758499812548'));
		$this->assertEquals('elo', CreditCard::discoverBrandName('4514168499812548'));
		$this->assertEquals('elo', CreditCard::discoverBrandName('6362978499812548'));
		$this->assertEquals('elo', CreditCard::discoverBrandName('5067978499812548'));
		$this->assertEquals('elo', CreditCard::discoverBrandName('4576978499812548'));
		$this->assertEquals('elo', CreditCard::discoverBrandName('4011978499812548'));
		$this->assertEquals('elo', CreditCard::discoverBrandName('5066998499812548'));
		$this->assertEquals('elo', CreditCard::discoverBrandName('6362970000457013'));
		$this->assertEquals('elo', CreditCard::discoverBrandName('506699******2548'));
		$this->assertEquals('elo', CreditCard::discoverBrandName('6362  9700  0045  7013'));

	}
	
}