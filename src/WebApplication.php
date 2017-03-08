<?php
namespace Itb;


use Itb\Controller\CustomerController;
use Itb\Controller\EmployeeController;
use Itb\Controller\OfficeController;
use Itb\Controller\ServiceUserController;
use Itb\Controller\RosterController;
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
        $this['employee.controller'] = function() { return new EmployeeController($this);   };
        $this['office.controller'] = function() { return new OfficeController($this);   };
        $this['serviceuser.controller'] = function() { return new ServiceUserController($this);   };
        $this['roster.controller'] = function() { return new RosterController($this);   };
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
        $this->post('/customers/create/', 'customer.controller:processCreateAction');
        $this->get('/customers/show/{id}', 'customer.controller:showAction');
        $this->get('/customers/update/{id}', 'customer.controller:updateAction');
        $this->post('/customers/update/{id}', 'customer.controller:processUpdateAction');
        $this->get('/customers/delete/{id}', 'customer.controller:deleteAction');


    //==============================
    // These are the employee controller routes and related Controller action methods
    //==
$this->get('/employees', 'employee.controller:listAction');
$this->get('/employees/create/', 'employee.controller:createAction');
$this->get('/employees/success/', 'employee.controller:successAction');
$this->post('/employees/create/', 'employee.controller:processCreateAction');
$this->get('/employees/show/{id}', 'employee.controller:showAction');
$this->get('/employees/update/{id}', 'employee.controller:updateAction');
$this->post('/employees/update/{id}', 'employee.controller:processUpdateAction');
$this->get('/employees/delete/{id}', 'employee.controller:deleteAction');


    //==============================
    // These are the office controller routes and related Controller action methods
    //==
$this->get('/offices', 'office.controller:listAction');
$this->get('/offices/create/', 'office.controller:createAction');
$this->get('/offices/success/', 'office.controller:successAction');
$this->post('/offices/create/', 'office.controller:processCreateAction');
$this->get('/offices/show/{id}', 'office.controller:showAction');
$this->get('/offices/update/{id}', 'office.controller:updateAction');
$this->post('/offices/update/{id}', 'office.controller:processUpdateAction');
$this->get('/offices/delete/{id}', 'office.controller:deleteAction');



    //==============================
    // These are the serviceuser controller routes and related Controller action methods
    //==
$this->get('/serviceusers', 'serviceuser.controller:listAction');
$this->get('/serviceusers/create/', 'serviceuser.controller:createAction');
$this->get('/serviceusers/success/', 'serviceuser.controller:successAction');
$this->post('/serviceusers/create/', 'serviceuser.controller:processCreateAction');
$this->get('/serviceusers/show/{id}', 'serviceuser.controller:showAction');
$this->get('/serviceusers/update/{id}', 'serviceuser.controller:updateAction');
$this->post('/serviceusers/update/{id}', 'serviceuser.controller:processUpdateAction');
$this->get('/serviceusers/delete/{id}', 'serviceuser.controller:deleteAction');
$this->get('/serviceusers/rosters/show/{id}', 'roster.controller:showAction');
$this->get('/serviceusers/rosters/delete/{id}', 'roster.controller:deleteAction');
$this->get('/serviceusers/rosters/update/{id}', 'roster.controller:updateAction');
$this->post('/serviceusers/rosters/update/{id}', 'roster.controller:processUpdateAction');

        //==============================
        //// These are the rostercontroller routes and related Controller action methods
        //==
$this->get('/rosters', 'roster.controller:listAction');
$this->get('/rosters/create/', 'roster.controller:createAction');
$this->get('/rosters/success/', 'roster.controller:successAction');
$this->post('/rosters/create/', 'roster.controller:processCreateAction');
$this->get('/rosters/show/{id}', 'roster.controller:showAction');
$this->get('/rosters/update/{id}', 'roster.controller:updateAction');
$this->post('/rosters/update/{id}', 'roster.controller:processUpdateAction');
$this->get('/rosters/delete/{id}', 'roster.controller:deleteAction');


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