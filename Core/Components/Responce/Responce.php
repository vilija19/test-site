<?php
/**
 * @author Alex <billibons777@gmail.com>
 * @version 1.0
 */

namespace Vilija19\Core\Components\Responce;

use Vilija19\Core\Application;

/**
 * Class Responce
 */
class Responce implements \Vilija19\Core\Interfaces\ResponceInterface
{
    /**
     * Property stores the HTML output
     *  
     * @var string 
     * @access protected
     */
    protected $output;

    /**
     * Method create the HTML output from the templates
     * 
     * @param string $view
     * @param array $data
     * @return void
     */
    public function setOutput(string $view, $data = []): void
    {
        $output = '';
        $template = Application::getApp()->getComponent('template');

        // Render header
        $title = $data['title'] ?? '';
        $header = new \Vilija19\App\Controllers\Header($title);
        $output .= $header->index();

        $output .= $template->render($view, $data);

        // Render footer
        $footer = new \Vilija19\App\Controllers\Footer();
        $output .= $footer->index();

        $this->output = $output;
        $this->output();
    }

    /**
     * Method redirects to the specified URL
     * 
     * @param string $url
     * @return void
     */
    public function redirect(string $url): void
    {
        if (!headers_sent()) {
            header('Location: ' . $url);
            exit;
        }        
    }
    /**
     * Method outputs the HTML code
     * 
     * @return void
     */
    public function output(): void
    {
        echo $this->output;
    }
}