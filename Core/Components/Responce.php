<?php
/**
 * @author Alex <billibons777@gmail.com>
 * @version 1.0
 */

namespace Vilija19\Core\Components;

use \Vilija19\Core\Exceptions\GetComponentException;

/**
 * Класс  Responce
 */
class Responce implements \Vilija19\Core\Interfaces\ResponceInterface
{
    public function setOutput(string $viewClass, $data = []): void
    {
        $viewHeader = new \Vilija19\App\View\HeaderView($data);
        $viewHeader->render();
        $className = '\\Vilija19\\App\\View\\' . $viewClass;
        if (class_exists($className)) {
            $view = new $className($data);
            $view->render();
        }else {
            throw new GetComponentException("Themplate not found", 1);
        }
        $viewFooter = new \Vilija19\App\View\FooterView($data);
        $viewFooter->render();
    }

    public function redirect(string $url)
    {
        if (!headers_sent()) {
            header('Location: ' . $url);
            exit;
        }        
    }

}