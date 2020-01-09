 <?php

use Aeon\Aeon;

class Admin extends \BaseController
{
	protected $configs;

	public function __construct()
	{
		$this->beforeFilter('csrf', array('on'=>'post'));
		$this->beforeFilter('auth');
		$this->data['title'] = 'SABER PROJECT';
		$this->data['pagination'] = 15;
	}

}