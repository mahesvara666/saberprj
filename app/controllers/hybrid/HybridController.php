<?php

use Aeon\Library\Chameleon as Themer;

class HybridController extends Prototype
{

	protected $data = [];

	protected $themeHandler;

	public function __construct(Themer $theme)
	{
		$this->themeHandler = $theme;
		
	}

	public function getIndex()
	{
		return Response::make( View::make('hybrid.index'), 200);
	}

	public function getTest()
	{
		return Response::make( View::make('hybrid.test', $data) );
	}
}