<?php
abstract class baseController {
	private $model;
	private $view;	
	
	public abstract function indexAction();
	
	public abstract function errorAction();
}