<?php
namespace HelloWorld\Extensions;

/**
 * Class SandboxProbe
 * A harmless object handed to the test templates. Its method call is the control case that must
 * keep working, its property name is the one the property deny-list is expected to catch.
 * @package HelloWorld\Extensions
 */
class SandboxProbe
{
	/**
	 * @var string $password A sensitive property name, read by one of the probes.
	 */
	public $password = 'super-secret';

	/**
	 * @return string
	 */
	public function getName():string
	{
		return 'sandbox probe';
	}
}
