<?php

namespace Vilija19\App\Controllers;

use Vilija19\Core\Application;

class Header
{
    /**
     * Stores the title of the page
     * @var string 
     */
    private $title;

    public function __construct(string $title)
    {
        $this->title = $title;
    }
    /**
     * @return string
     */
    public function index(): string
    {
        $data['title'] = $this->title;
        $template = Application::getApp()->getComponent('template');
        return $template->render('HeaderView', $data);
    }
}