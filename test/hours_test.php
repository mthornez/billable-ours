<?php
//hours_test.php
include_once 'includes/settings.php';
require_once 'simpletest/autorun.php';
require_once 'simpletest/web_tester.php';

class HoursForm extends WebTestCase {

	  function testCorrectData() {
		$this->get(VIRTUAL_PATH . '/hours.php');
		$this->assertResponse(200);

    $this->setField("hours", "2");
		$this->setField("rate", "50");
		$this->clickSubmit("Show Pay");

		$this->assertResponse(200);
		$this->assertText("You input 2 hours at a rate of $50 and your pay is $100");
	}
	
	 function testZeroHoursData() {
		$this->get(VIRTUAL_PATH . '/hours.php');
		$this->assertResponse(200);

   		$this->setField("hours", "0");
		$this->setField("rate", "50");
		$this->clickSubmit("Show Pay");

		$this->assertResponse(200);
		$this->assertText("You can't enter 0 for hours.");
	}
	
	function testZeroRateData() {
		$this->get(VIRTUAL_PATH . '/hours.php');
		$this->assertResponse(200);

   		$this->setField("hours", "2");
		$this->setField("rate", "0");
		$this->clickSubmit("Show Pay");

		$this->assertResponse(200);
		$this->assertText("You can't enter 0 for rate.");
	}
	
	function testDecimalData() {
		$this->get(VIRTUAL_PATH . '/hours.php');
		$this->assertResponse(200);

    		$this->setField("hours", "1.5");
		$this->setField("rate", "50");
		$this->clickSubmit("Show Pay");

		$this->assertResponse(200);
		$this->assertText("You input 1.5 hours at a rate of $50 and your pay is $75");
	}
	

}
