<?php
namespace App\Controllers;

use App\Helpers\MessageBrokers\MessageBroker;
use Http\Request;
use Http\Response;

class ProductController
{

    private $request;

    private $response;

    private $messageBroker;

    /**
     * ProductController Constructor
     */
    public function __construct(MessageBroker $messageBroker, Request $request, Response $response)
    {
        $this->messageBroker = $messageBroker;
        $this->request = $request;
        $this->response = $response;
    }

    /**
     * Insert request
     */
    public function insert()
    {
        $options['sku'] = $this->request->getParameter('sku');

        $this->messageBroker->publish('product_queue', $options);
    }
}
