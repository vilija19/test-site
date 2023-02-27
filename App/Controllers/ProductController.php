<?php

namespace Vilija19\App\Controllers;

use Vilija19\Core\Application;

class ProductController
{
    private $responce;
    private $errors;

    public function __construct()
    {
        $this->responce = Application::getApp()->getComponent('responce');
    }
    /**
     * Show product create form
     */
    public function create(): void
    {
        $data['title'] = 'Add Product';
        $data['footer_text'] = 'Scanduweb Test assignment';

        $this->responce->setOutput('ProductCreateView', $data);
    }
    /**
     * Insert new product in storage
     */
    public function store(): void
    {
        if ($_POST && !$this->validate($_POST)) {
            $data['errors'] = $this->errors;
            echo $data['errors']['sku'];
            $this->responce->setOutput('ProductCreateView', $data);
            return;
        }
        $model = 'Vilija19\\App\\Model\\' . $_POST['type'];

        $product = new $model();
        $product->create($_POST);

        $this->responce->redirect('/');
    }
    /**
     * @param array $data
     * @return bool
     */
    protected function validate($data): bool
    {

        if (empty($data['sku'])) {
            $this->errors['sku'] = 'SKU is required';
        }
        if (empty($data['type'])) {
            $this->errors['type'] = 'Type is required';
        }
        $orm = application::getApp()->getComponent('orm');
        $orm->setModel(\Vilija19\App\Model\Product::class);
        $products = $orm->getByField('sku', $data['sku'])->one();
        if (!empty($products)) {
            $this->errors['sku'] = 'SKU already exists';
        }

        return !$this->errors;
    }

}