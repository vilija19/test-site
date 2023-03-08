<?php

namespace Vilija19\App\Controllers;

use Vilija19\Core\Application;

class Footer
{
    /**
     * @return string
     */
    public function index(): string
    {
        $data['footer_text'] = 'Scanduweb Test assignment';
        $template = Application::getApp()->getComponent('template');
        return $template->render('FooterView', $data);
    }
}