<?php

class SessionControllerTest extends TestCase {

	/**
	 * testing login form for admin
	 *
	 * @return void
	 */
	public function test_route_for_login()
	{
		$this->call('GET', 'login');
		$this->assertResponseOk();

	}

	public function test_ensure_login_has_username_and_password_label()
	{
		$this->client->request("GET", "login");
		$this->see("Username", "label");
		$this->see("Password", "label");
	}

	protected function see($text, $element = 'body')
	{
		$crawler = $this->client->getCrawler();
		$found   = $crawler->filter("{$element}:contains('{$text}')");
		$this->assertGreaterThan(0, count($found), "Expected to see '{$text}' within '{$element}' in view");
	}
}
