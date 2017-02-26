<?php
/**
 * Created by PhpStorm.
 * User: john.ogrady
 * Date: 18/02/2017
 * Time: 22:24
 */

namespace Itb\Controller;

use Itb\Model\Employee;
use Itb\model\EmployeeRepository;
use Itb\model\EmployeeRepositoryView;
use Itb\Model\LookUpReferenceRepositoryCounties;

use Itb\model\OfficeRepository;
use Itb\WebApplication;

class EmployeeController
{
    private $app;

    public function __construct(WebApplication $app)
    {
        $this->app = $app;
    }

    public function listAction()
    {
        // get reference to our repository
        $employeeRepository= new EmployeeRepositoryView();
        $employees= $employeeRepository->getAll();

        $argsArray = [
            'employees' => $employees
        ];
          $templateName = 'Employees\list';
              return $this->app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    public function successAction()
    {
        $templateName = 'Employees\success';
        return $this->app['twig']->render($templateName . '.html.twig');
    }

    public function updateAction($id)
    {
        // get reference to our repository
        $employeeRepository= new EmployeeRepository();
        // get array of product attributes for that product, ready for view to use to populate form
        $employee= $employeeRepository->getOneById($id);
        // database connection
        $counties= new LookUpReferenceRepositoryCounties();

         $counties = $counties->getAll();

        $offices= new OfficeRepository();

        $offices= $offices->getAll();


         if (null == $employee) {
            $message = 'sorry, no Employee with id = ' . $id . ' could be retrieved from the database';
            $templateName = 'message';

            return $this->app['twig']->render($templateName . '.html.twig');
        } else {
            // route user to update page for product
            // output the detail of product in HTML table

            $templateName = 'Employees\update';
            $argsArray = [
                'employee' => $employee,
                'counties' => $counties,
                'offices' => $offices
            ];

            return $this->app['twig']->render($templateName . '.html.twig',$argsArray);
        }

    }

    public function processUpdateAction()
    {
        // get reference to our repository
        $editedEmployee= new Employee();
        $editedEmployee->setId(filter_input(INPUT_POST, 'Id'));
        $editedEmployee->setFirstName(filter_input(INPUT_POST, 'firstName'));
        $editedEmployee->setLastName(filter_input(INPUT_POST, 'lastName'));
        $editedEmployee->setAddressLine1(filter_input(INPUT_POST, 'addressLine1'));
        $editedEmployee->setAddressLine2(filter_input(INPUT_POST, 'addressLine2'));
        $editedEmployee->setAddressLine3(filter_input(INPUT_POST, 'addressLine3'));
        // to do resolve isActive
        //$editedEmployee->setIsActive(filter_input(INPUT_POST, 'isActive'));

        $editedEmployee->setStartDate(filter_input(INPUT_POST, 'startDate'));
        $editedEmployee->setStaffNumber(filter_input(INPUT_POST, 'staffNumber'));
        $editedEmployee->setCountyPostcode(filter_input(INPUT_POST, 'countyPostcode'));
        $editedEmployee->setEirCode(filter_input(INPUT_POST, 'eirCode'));
        $editedEmployee->setMobileTelephone(filter_input(INPUT_POST, 'mobileTelephone'));
        $editedEmployee->setLandlineTelephone(filter_input(INPUT_POST, 'landlineTelephone'));
        $editedEmployee->setManagingOffice(filter_input(INPUT_POST, 'managingOffice'));
        $employeeRepo= new EmployeeRepository();
        $success = $employeeRepo->update($editedEmployee);
        $templateName = 'Employees\success';
        if($success){
            $id = $editedEmployee->getId(); // get ID of new record
            $message = "SUCCESS - new Employee with ID = $id update";
        } else {
            $message = 'sorry, there was a problem updating that Employee';
        }
        // route user to message page with success or failure notice

        $argsArray = [  'message' => $message];
        return $this->app['twig']->render($templateName . '.html.twig', $argsArray);
    }



    public function deleteAction($id)
    {
        // get reference to our repository
        $employeeRepository= new EmployeeRepository();
        $success = $employeeRepository->delete($id);
        if($success){
            $message = "SUCCESS - employee deleted";
        } else {
            $message = 'sorry, there was a problem deleting that employee';
        }
        // route user to message page with success or failure notice
        $templateName = 'Employee\success';
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
           $templateName = 'Employees\create';
        return $this->app['twig']->render($templateName . '.html.twig', $argsArray);
    }


    public function processCreateAction()
    {
        // get reference to our repository
        $newEmployee= new Employee();
        $newEmployee->setFirstName(filter_input(INPUT_POST, 'firstName'));
        $newEmployee->setLastName(filter_input(INPUT_POST, 'lastName'));
        $newEmployee->setStaffId(filter_input(INPUT_POST, 'staffID'));
        $newEmployee->setAddressLine1(filter_input(INPUT_POST, 'addressLine1'));
        $newEmployee->setAddressLine2(filter_input(INPUT_POST, 'addressLine2'));
        $newEmployee->setAddressLine3(filter_input(INPUT_POST, 'addressLine3'));
        $newEmployee->setCountyPostcode(filter_input(INPUT_POST, 'countyPostcode'));
        $newEmployee->setEirCode(filter_input(INPUT_POST, 'eirCode'));
        $newEmployee->setMobileTelephone(filter_input(INPUT_POST, 'mobileTelephone'));
        $newEmployee->setLandlineTelephone(filter_input(INPUT_POST, 'landlineTelephone'));
        $newEmployee->setManagingOffice(filter_input(INPUT_POST, 'managingOffice'));
        $newEmployee->setMainContact(filter_input(INPUT_POST, 'mainContact'));
        $newEmployee->getId();
        $customerRepo= new CustomerRepository();
        $success = $customerRepo->create($newEmployee);
        $templateName = 'Employees\success';
        if($success){
            $id = $newEmployee->getId(); // get ID of new record
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
        $employeeRepository = new EmployeeRepositoryView();
        $employee = $employeeRepository->getOneById($id);
         //to do update to get one by id
        // get array of attributes for that customer, ready for view to use to populate form
        $argsArray = [
            'employee' => $employee
        ];


        $templateName = 'Employees\show';
        return $this->app['twig']->render($templateName . '.html.twig', $argsArray);
    }
}