<?php

class Prototype extends \BaseController
{

	public function __construct(\Aeon\Aeon $aeon)
	{
		$this->aeon = $aeon;
	}

	public function missingMethod( $params = array() )
	{
		return 'im a teapot';
	}
}