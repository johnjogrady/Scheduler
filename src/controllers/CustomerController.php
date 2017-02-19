<?php
/**
 * Created by PhpStorm.
 * User: john.ogrady
 * Date: 18/02/2017
 * Time: 22:24
 */

namespace Itb\Controller;

use Itb\Model\CustomerRepository;
use Itb\WebApplication;

class CustomerController
{
    private $app;

    public function __construct(WebApplication $app)
    {
        $this->app = $app;
    }

    public function listAction()
    {
        // get reference to our repository
        $customerRepository = new CustomerRepository();
        $customers = $customerRepository->getAll();

        $argsArray = [
            'customers' => $customers
        ];
        $templateName = 'customers';
              return $this->app['twig']->render($templateName . '.html.twig', $argsArray);
    }


}