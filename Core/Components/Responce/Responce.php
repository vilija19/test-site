<?php
/**
 * @author Alex <billibons777@gmail.com>
 * @version 1.0
 */

namespace Vilija19\Core\Components\Responce;

use \Vilija19\Core\Exceptions\GetComponentException;
use Vilija19\Core\Application;

/**
 * Класс  Responce
 */
class Responce implements \Vilija19\Core\Interfaces\ResponceInterface
{
    protected $output;

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

    public function redirect(string $url)
    {
        if (!headers_sent()) {
            header('Location: ' . $url);
            exit;
        }        
    }

    public function output()
    {
        echo $this->output;
    }
}