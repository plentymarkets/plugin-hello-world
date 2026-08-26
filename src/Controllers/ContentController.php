<?php
namespace HelloWorld\Controllers;

use Plenty\Plugin\Controller;
use Plenty\Plugin\Templates\Twig;
use Throwable;

/**
 * Class ContentController
 * @package HelloWorld\Controllers
 */
class ContentController extends Controller
{
	/**
	 * @param Twig $twig
	 * @return string
	 */
	public function sayHello(Twig $twig):string
	{
		return $twig->render('HelloWorld::content.hello');
	}

	/**
	 * Renders every sandbox probe on its own and reports whether it was blocked.
	 *
	 * renderString() is used on purpose: it disables the twig cache, so an already compiled
	 * template cannot hide the result of the compile time filter check.
	 *
	 * @param Twig $twig
	 * @return string
	 */
	public function testTwigVulnerabilities(Twig $twig):string
	{
		$rows = '';

		foreach ($this->getProbes() as $label => $template) {
			try {
				$outcome = 'NOT BLOCKED: ' . $twig->renderString($template);
			} catch (Throwable $error) {
				$outcome = 'blocked by ' . get_class($error) . ': ' . $error->getMessage();
			}

			$rows .= '<tr>'
				. '<td>' . htmlspecialchars($label) . '</td>'
				. '<td><code>' . htmlspecialchars($template) . '</code></td>'
				. '<td>' . htmlspecialchars($outcome) . '</td>'
				. '</tr>';
		}

		return '<h1>Twig sandbox probes</h1>'
			. '<table border="1" cellpadding="6" cellspacing="0">'
			. '<tr><th>Probe</th><th>Template</th><th>Outcome</th></tr>'
			. $rows
			. '</table>';
	}

	/**
	 * The probes, keyed by what each one is meant to prove.
	 *
	 * The probes that only need to reach a method use {% set %} instead of {{ }} so that a value
	 * which cannot be cast to string does not fail for the wrong reason.
	 *
	 * @return array
	 */
	private function getProbes():array
	{
		return [
			'banned class, deterministic'
				=> '{% set ignored = test_closure().bindTo(null) %}reached bindTo()',
			'banned class, real payload'
				=> '{% set ignored = auth_guard().check() %}reached the session guard',
			'banned property'
				=> '{{ test_probe().password }}',
			'plugin registered filter'
				=> "{{ 'input'|evil_filter }}",
			'control, must keep working'
				=> '{{ test_probe().getName() }}'
		];
	}
}
