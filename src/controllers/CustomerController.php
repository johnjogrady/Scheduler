<?php
/**
 * Created by PhpStorm.
 * User: john.ogrady
 * Date: 18/02/2017
 * Time: 22:24
 */

namespace Itb\Controller;

use Itb\Model\Customer;
use Itb\Model\CustomerRepository;
use Itb\Model\CustomerRepositoryView;
use Itb\Model\LookUpReferenceRepositoryCounties;

use Itb\model\OfficeRepository;
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

    public function successAction()
    {
        $templateName = 'Customers\success';
        return $this->app['twig']->render($templateName . '.html.twig');
    }

    public function updateAction($id)
    {
        // get reference to our repository
        $customerRepository = new CustomerRepository();
        // get array of product attributes for that product, ready for view to use to populate form
        $customer = $customerRepository->getOneById($id);
        // database connection
        $counties= new LookUpReferenceRepositoryCounties();

        $counties = $counties->getAll();

        $offices= new OfficeRepository();

        $offices= $offices->getAll();

         if (null == $customer) {
            $message = 'sorry, no product with id = ' . $id . ' could be retrieved from the database';
            $templateName = 'message';

            return $this->app['twig']->render($templateName . '.html.twig');
        } else {
            // route user to update page for product
            // output the detail of product in HTML table

            $templateName = 'Customers\update';
            $argsArray = [
                'customer' => $customer,
                'counties' => $counties,
                'offices' => $offices
            ];

            return $this->app['twig']->render($templateName . '.html.twig',$argsArray);
        }

    }

    public function processUpdateAction()
    {
        // get reference to our repository
        $editedCustomer= new Customer();
        $editedCustomer->setId(filter_input(INPUT_POST, 'Id'));
        $editedCustomer->setCustomerName(filter_input(INPUT_POST, 'customerName'));
        $editedCustomer->setAddressLine1(filter_input(INPUT_POST, 'addressLine1'));
        $editedCustomer->setAddressLine2(filter_input(INPUT_POST, 'addressLine2'));
        $editedCustomer->setAddressLine3(filter_input(INPUT_POST, 'addressLine3'));
        $editedCustomer->setCountyPostcode(filter_input(INPUT_POST, 'countyPostcode'));
        $editedCustomer->setEirCode(filter_input(INPUT_POST, 'eirCode'));
        $editedCustomer->setMobileTelephone(filter_input(INPUT_POST, 'mobileTelephone'));
        $editedCustomer->setLandlineTelephone(filter_input(INPUT_POST, 'landlineTelephone'));
        $editedCustomer->setManagingOffice(filter_input(INPUT_POST, 'managingOffice'));
        $editedCustomer->setMainContact(filter_input(INPUT_POST, 'mainContact'));
        $customerRepo= new CustomerRepository();
        $success = $customerRepo->update($editedCustomer);
        $templateName = 'Customers\success';
        if($success){
            $id = $editedCustomer->getId(); // get ID of new record
            $message = "SUCCESS - new customer with ID = $id update";
        } else {
            $message = 'sorry, there was a problem updating that customer';
        }
        // route user to message page with success or failure notice

        $argsArray = [  'message' => $message];
        return $this->app['twig']->render($templateName . '.html.twig', $argsArray);
    }



    public function deleteAction($id)
    {
        // get reference to our repository
        $customerRepository = new CustomerRepository();
        $success = $customerRepository->delete($id);
        if($success){
            $message = "SUCCESS - customer deleted";
        } else {
            $message = 'sorry, there was a problem deletingthat customer';
        }
        // route user to message page with success or failure notice
        $templateName = 'Customers\success';
        $argsArray = [  'message' => $message];
        return $this->app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    public function createAction()
    {
        // get reference to our repository
        $counties= new LookUpReferenceRepositoryCounties();

        $counties = $counties->getAll();
        //to do update to get one by id

        $offices= new OfficeRepository();

        $offices= $offices->getAll();
        //to do update to get one by id
        $argsArray = [
            'counties' => $counties,
            'offices' => $offices
        ];
           $templateName = 'Customers\create';
        return $this->app['twig']->render($templateName . '.html.twig', $argsArray);
    }


    public function processCreateAction()
    {
        // get reference to our repository
        $newCustomer= new Customer();
        $newCustomer->setCustomerName(filter_input(INPUT_POST, 'customerName'));
        $newCustomer->setAddressLine1(filter_input(INPUT_POST, 'addressLine1'));
        $newCustomer->setAddressLine2(filter_input(INPUT_POST, 'addressLine2'));
        $newCustomer->setAddressLine3(filter_input(INPUT_POST, 'addressLine3'));
        $newCustomer->setCountyPostcode(filter_input(INPUT_POST, 'countyPostcode'));
        $newCustomer->setEirCode(filter_input(INPUT_POST, 'eirCode'));
        $newCustomer->setMobileTelephone(filter_input(INPUT_POST, 'mobileTelephone'));
        $newCustomer->setLandlineTelephone(filter_input(INPUT_POST, 'landlineTelephone'));
        $newCustomer->setManagingOffice(filter_input(INPUT_POST, 'managingOffice'));
        $newCustomer->setMainContact(filter_input(INPUT_POST, 'mainContact'));
        $newCustomer->getId();
        $customerRepo= new CustomerRepository();
        $success = $customerRepo->create($newCustomer);
        $templateName = 'Customers\success';
        if($success){
            $id = $newCustomer->getId(); // get ID of new record
            $message = "SUCCESS - new customer with ID = $id created";
        } else {
            $message = 'sorry, there was a problem creating new customer';
        }
        // route user to message page with success or failure notice

        $argsArray = [  'message' => $message];
        return $this->app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    public function showAction($id)
    {
        // get reference to our repository
        $customerRepository = new CustomerRepositoryView();
        $customer = $customerRepository->getOneById($id);
         //to do update to get one by id
        // get array of attributes for that customer, ready for view to use to populate form
        $argsArray = [
            'customer' => $customer
        ];


        $templateName = 'Customers\show';
        return $this->app['twig']->render($templateName . '.html.twig', $argsArray);
    }
}