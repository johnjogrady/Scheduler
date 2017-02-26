<?php
/**
 * Created by PhpStorm.
 * User: john.ogrady
 * Date: 18/02/2017
 * Time: 22:24
 */

namespace Itb\Controller;

use Itb\Model\ServiceUser;
use Itb\model\ServiceUserRepository;
use Itb\model\ServiceUserRepositoryView;
use Itb\Model\LookUpReferenceRepositoryCounties;

use Itb\model\OfficeRepository;
use Itb\WebApplication;

class ServiceUserController
{
    private $app;

    public function __construct(WebApplication $app)
    {
        $this->app = $app;
    }

    public function listAction()
    {
        // get reference to our repository
        $ServiceUserRepository= new ServiceUserRepositoryView();
        $serviceUsers= $ServiceUserRepository->getAll();

        $argsArray = [
            'serviceUsers' => $serviceUsers
        ];
          $templateName = 'ServiceUsers\list';
              return $this->app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    public function successAction()
    {
        $templateName = 'ServiceUsers\success';
        return $this->app['twig']->render($templateName . '.html.twig');
    }

    public function updateAction($id)
    {
        // get reference to our repository
        $ServiceUserRepository= new ServiceUserRepository();
        // get array of product attributes for that product, ready for view to use to populate form
        $serviceUser= $ServiceUserRepository->getOneById($id);
        // database connection
        $counties= new LookUpReferenceRepositoryCounties();

         $counties = $counties->getAll();

        $offices= new OfficeRepository();

        $offices= $offices->getAll();


         if (null == $serviceUser) {
            $message = 'sorry, no ServiceUser with id = ' . $id . ' could be retrieved from the database';
            $templateName = 'message';

            return $this->app['twig']->render($templateName . '.html.twig');
        } else {
            // route user to update page for product
            // output the detail of product in HTML table
           $templateName = 'ServiceUsers\update';
            $argsArray = [
                'serviceUser' => $serviceUser,
                'counties' => $counties,
                'offices' => $offices
            ];

            return $this->app['twig']->render($templateName . '.html.twig',$argsArray);
        }

    }

    public function processUpdateAction()
    {
        // get reference to our repository
        $editedServiceUser= new ServiceUser();
        $editedServiceUser->setId(filter_input(INPUT_POST, 'Id'));
        $editedServiceUser->setFirstName(filter_input(INPUT_POST, 'firstName'));
        $editedServiceUser->setLastName(filter_input(INPUT_POST, 'lastName'));
        $editedServiceUser->setAddressLine1(filter_input(INPUT_POST, 'addressLine1'));
        $editedServiceUser->setAddressLine2(filter_input(INPUT_POST, 'addressLine2'));
        $editedServiceUser->setAddressLine3(filter_input(INPUT_POST, 'addressLine3'));
        // to do resolve isActive
        //$editedServiceUser->setIsActive(filter_input(INPUT_POST, 'isActive'));

        $editedServiceUser->setStartDate(filter_input(INPUT_POST, 'startDate'));
       $editedServiceUser->setCountyPostcode(filter_input(INPUT_POST, 'countyPostcode'));
        $editedServiceUser->setEirCode(filter_input(INPUT_POST, 'eirCode'));
        $editedServiceUser->setMobileTelephone(filter_input(INPUT_POST, 'mobileTelephone'));
        $editedServiceUser->setLandlineTelephone(filter_input(INPUT_POST, 'landlineTelephone'));
        $editedServiceUser->setManagingOffice(filter_input(INPUT_POST, 'managingOffice'));
        $ServiceUserRepo= new ServiceUserRepository();
        $success = $ServiceUserRepo->update($editedServiceUser);
        $templateName = 'ServiceUsers\success';
        if($success){
            $id = $editedServiceUser->getId(); // get ID of new record
            $message = "SUCCESS -  ServiceUser with ID = $id updated";
        } else {
            $message = 'sorry, there was a problem updating that Service User';
        }
        // route user to message page with success or failure notice

        $argsArray = [  'message' => $message];
        return $this->app['twig']->render($templateName . '.html.twig', $argsArray);
    }



    public function deleteAction($id)
    {
        // get reference to our repository
        $ServiceUserRepository= new ServiceUserRepository();
        $success = $ServiceUserRepository->delete($id);
        if($success){
            $message = "SUCCESS - ServiceUser deleted";
        } else {
            $message = 'sorry, there was a problem deleting that ServiceUser';
        }
        // route user to message page with success or failure notice
        $templateName = 'ServiceUser\success';
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
           $templateName = 'ServiceUsers\create';
        return $this->app['twig']->render($templateName . '.html.twig', $argsArray);
    }


    public function processCreateAction()
    {
        // get reference to our repository
        $newServiceUser= new ServiceUser();
        $newServiceUser->setFirstName(filter_input(INPUT_POST, 'firstName'));
        $newServiceUser->setLastName(filter_input(INPUT_POST, 'lastName'));
        $newServiceUser->setAddressLine1(filter_input(INPUT_POST, 'addressLine1'));
        $newServiceUser->setAddressLine2(filter_input(INPUT_POST, 'addressLine2'));
        $newServiceUser->setAddressLine3(filter_input(INPUT_POST, 'addressLine3'));
        $newServiceUser->setCountyPostcode(filter_input(INPUT_POST, 'countyPostcode'));
        $newServiceUser->setEirCode(filter_input(INPUT_POST, 'eirCode'));
        $newServiceUser->setMobileTelephone(filter_input(INPUT_POST, 'mobileTelephone'));
        $newServiceUser->setLandlineTelephone(filter_input(INPUT_POST, 'landlineTelephone'));
        $newServiceUser->setManagingOffice(filter_input(INPUT_POST, 'managingOffice'));
        $newServiceUser->getId();
        $customerRepo= new CustomerRepository();
        $success = $customerRepo->create($newServiceUser);
        $templateName = 'ServiceUsers\success';
        if($success){
            $id = $newServiceUser->getId(); // get ID of new record
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
        $ServiceUserRepository = new ServiceUserRepositoryView();
        $serviceUser = $ServiceUserRepository->getOneById($id);
         //to do update to get one by id
        // get array of attributes for that customer, ready for view to use to populate form
        $argsArray = [
            'serviceUser' => $serviceUser
        ];


        $templateName = 'ServiceUsers\show';
        return $this->app['twig']->render($templateName . '.html.twig', $argsArray);
    }
}