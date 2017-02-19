<?php
namespace Itb;


use Itb\Controller\CustomerController;
use Silex\Application;
use Itb\Controller\MainController;
use Symfony\Component\Debug\ErrorHandler;
use Itb\Controller\ErrorController;


class WebApplication extends Application
{
    private $myTemplatesPath = __DIR__ . '/../templates';

    public function __construct()
    {
        parent::__construct();

        $this['debug'] = true;
        $this->setupTwig();
        $this->addRoutes();

        $this->handleErrorsAndExceptions();
    }

    public function setupTwig()
    {
        // register Twig with Silex
        // ------------
        $this->register(new \Silex\Provider\TwigServiceProvider(),
            [
                'twig.path' => $this->myTemplatesPath
            ]
        );
    }

    public function addRoutes()
    {
        // setup Service controller provider
        $this->register(new \Silex\Provider\ServiceControllerServiceProvider());

        // map routes to controller class/method
        //-------------------------------------------

        //==============================
        // controllers as a service
        //==============================
        $this['main.controller'] = function() { return new MainController($this);   };
        $this['customer.controller'] = function() { return new CustomerController($this);   };
        //==============================
        // now define the routes
        //==============================

        // -- main --
        $this->get('/', 'main.controller:indexAction');
        $this->get('/list', 'main.controller:listAction');
        $this->get('/show/{id}', 'main.controller:showAction');
        $this->get('/show', 'main.controller:showNoIdAction');

        //==============================
        // These are the customer controller routes and related Controller action methods
        //==
        $this->get('/customers', 'customer.controller:listAction');
        $this->get('/customers/create/', 'customer.controller:createAction');
        $this->get('/customers/success/', 'customer.controller:successAction');
        $this->post('/customers/create/', 'customer.controller:updateCreateAction');
        $this->get('/customers/show/{id}', 'customer.controller:showAction');
        $this->get('/customers/update/{id}', 'customer.controller:updateAction');
        $this->get('/customers/delete/{id}', 'customer.controller:deleteAction');
    }


    public function handleErrorsAndExceptions ()
    {
        ErrorHandler::register();

        //register an error handler
        $this->error(function (\Exception $e) {
            $errorController = new ErrorController($this);
            return $errorController->errorAction($e);
        });
    }

}