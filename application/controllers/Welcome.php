<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
     * Config property to prevent dynamic property warning
     *
     * @var mixed
     */
    public $config;

	/**
     * Hooks property to prevent dynamic property warning
     *
     * @var mixed
     */
    public $hooks;

	/**
     * Benchmark property to prevent dynamic property warning
     *
     * @var mixed
     */
    public $benchmark;

	/**
     * Log property to prevent dynamic property warning
     *
     * @var mixed
     */
    public $log;

	/**
     * UTF8 property to prevent dynamic property warning
     *
     * @var mixed
     */
    public $utf8;

    /**
     * URI property to prevent dynamic property warning
     *
     * @var mixed
     */
    public $uri;

    /**
     * Router property to prevent dynamic property warning
     *
     * @var mixed
     */
    public $router;

    /**
     * Output property to prevent dynamic property warning
     *
     * @var mixed
     */
    public $output;

    /**
     * Security property to prevent dynamic property warning
     *
     * @var mixed
     */
    public $security;

    /**
     * Input property to prevent dynamic property warning
     *
     * @var mixed
     */
    public $input;

    /**
     * Lang property to prevent dynamic property warning
     *
     * @var mixed
     */
    public $lang;

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}
}
