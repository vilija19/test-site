<?php
/**
 * @author Alex <billibons777@gmail.com>
 * @version 1.0
 */

namespace Vilija19\Core\Components\Template;

use \Vilija19\Core\Exceptions\GetComponentException;

/**
 * Class Template
 */
class Template implements \Vilija19\Core\Interfaces\TemplateInterface
{
    /**
     * Inserting data into the template
     * 
     * @var string $template
     * @var array $data
     * @return string 
     */
    public function render(string $template, array $data = []): string
    {
		$file = dirname(__DIR__,3). '/App/View/' . $template . '.tpl';
        if (is_file($file)) {
			extract($data);

			ob_start();

			require($file);

			return ob_get_clean();
        }else {
            throw new GetComponentException("Themplate not found", 1);
        }

    }

}