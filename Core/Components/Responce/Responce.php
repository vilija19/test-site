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
        $output .= $template->render('HeaderView', $data);
        $output .= $template->render($view, $data);
        $output .= $template->render('FooterView', $data);
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