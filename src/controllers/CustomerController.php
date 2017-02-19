<?php
/**
 * Created by PhpStorm.
 * User: john.ogrady
 * Date: 18/02/2017
 * Time: 22:24
 */

namespace Itb\Controller;

use Itb\Model\CustomerRepository;
use Itb\Model\CustomerRepositoryView;
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
        $customerRepository = new CustomerRepositoryView();
        $customers = $customerRepository->getAll();

        $argsArray = [
            'customers' => $customers
        ];
        $templateName = 'Customers\list';
              return $this->app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    public function updateAction()
    {
        // get reference to our repository
        $customerRepository = new CustomerRepository();
        $customers = $customerRepository->getAll();
        //to do update to get one by id
         $argsArray = [
            'customer' => $customers
        ];

        $templateName = 'Customers\update';
        return $this->app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    public function deleteAction()
    {
        // get reference to our repository
        $customerRepository = new CustomerRepository();
        $customers = $customerRepository->getAll();
        //to do update to get one by id
        $argsArray = [
            'customer' => $customers
        ];

        $templateName = 'Customers\delete';
        return $this->app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    public function createAction()
    {
        // get reference to our repository
        $customerRepository = new CustomerRepository();
        $customers = $customerRepository->getAll();
        //to do update to get one by id
        $argsArray = [
            'customer' => $customers
        ];

        $templateName = 'Customers\create';
        return $this->app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    public function showAction()
    {
        // get reference to our repository
        $customerRepository = new CustomerRepository();
        $customers = $customerRepository->getAll();
        //to do update to get one by id
        $argsArray = [
            'customer' => $customers
        ];

        $templateName = 'Customers\show';
        return $this->app['twig']->render($templateName . '.html.twig', $argsArray);
    }
}