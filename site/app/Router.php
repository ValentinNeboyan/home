<?php

namespace App;

class Router
{
	/**
	 * @var array
	 */
	private $routes;

	/**
	 * @var string
	 */
	private $method;

	/**
	 * Router constructor.
	 *
	 * @param array $routes
	 */
	public function __construct($routes = [])
	{
		$this->method = $_SERVER['REQUEST_METHOD'];
		$this->routes = $routes;
	}

	/**
	 * Handle redirects
	 *
	 * @param string $path
	 * @param int $status
	 */
	public function redirect($path, $status = 301)
	{
		// @TODO
	}

	/**
	 * Handle $_GET request
	 *
	 * @param string $path
	 * @param array $controls
	 */
	public function get($path, $controls)
	{
		if ($this->method !== 'GET') {
			(new Template())->render('500', [
				'error' => 'Wrong method',
			]);
		}

		$this->composeUrl($path, $controls);
	}

	/** Handle $_POST request
	 *
	 * @param string $path
	 * @param array $controls
	 */
	public function post($path, $controls)
	{
		if ($this->method !== 'POST') {
			(new Template())->render('500', [
				'error' => 'Wrong method',
			]);
		}

		// @TODO
	}

	/**
	 * Handle route and template
	 *
	 * @param string $path
	 * @param array $controls
	 */
	private function composeUrl($path, $controls)
	{
		$result = '';

		if (!in_array(substr($path, 1), array_keys($this->routes))) {
			$result = '404';
		}

		(new Template())->render($result, $controls);
	}
}