<?php

/**
 * A custom Exception for exceptions during dispatching.
 *
 * PHP version 5
 *
 * @category Module
 * @package  Frood
 * @author   Jens Riisom Schultz <jers@fynskemedier.dk>
 * @since    2011-06-14
 */

/**
 * FroodExceptionDispatch - A custom Exception for exceptions during dispatching.
 *
 * @category   Module
 * @package    Frood
 * @subpackage Class
 * @author     Jens Riisom Schultz <jers@fynskemedier.dk>
 */
class FroodExceptionDispatch extends Exception {
	/** @var string The controller that Frood attempted to dispatch to. */
	protected $_controller;

	/** @var string The action that Frood attempted to call on the controller. */
	protected $_action;

	/** @var FroodParameters The parameters that Frood attempted to pass to the action. */
	protected $_parameters;

	/** @var string Which app was The Frood running? */
	protected $_app;

	/**
	 * Constructs the Exception.
	 *
	 * @param string          $controller The controller that Frood attempted to dispatch to.
	 * @param string          $action     The action that Frood attempted to call on the controller.
	 * @param FroodParameters $parameters The parameters that Frood attempted to pass to the action.
	 * @param string          $app        Which app was The Frood running?
	 * @param string          $message    The Exception message to throw.
	 * @param int             $code       The Exception code.
	 *
	 * @return void
	 */
	public function __construct($controller = '', $action = '', FroodParameters $parameters = null, $app = '', $message = '', $code = 0) {
		if ($message == '') {
			$message = "Frood could not call $controller::$action($parameters) [$app app]";
		}

		parent::__construct($message, $code);

		$this->_controller = $controller;
		$this->_action     = $action;
		$this->_parameters = $parameters;
		$this->_app        = $app;
	}

	/**
	 * Get the controller that Frood attempted to dispatch to, as a string.
	 *
	 * @return string The controller that Frood attempted to dispatch to.
	 */
	public function getController() {
		return $this->_controller;
	}

	/**
	 * Get the action that Frood attempted to call on the controller, as a string.
	 *
	 * @return string The action that Frood attempted to call on the controller.
	 */
	public function getAction() {
		return $this->_action;
	}

	/**
	 * Get the parameters that Frood attempted to pass to the action.
	 *
	 * @return FroodParameters The parameters that Frood attempted to pass to the action.
	 */
	public function getParameters() {
		return $this->_parameters;
	}

	/**
	 * Which app was The Frood running?
	 *
	 * @return string
	 */
	public function getApp() {
		return $this->_app;
	}
}