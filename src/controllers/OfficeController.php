<?php
/**
 * Created by PhpStorm.
 * User: john.ogrady
 * Date: 18/02/2017
 * Time: 22:24
 */

namespace Itb\Controller;

use Itb\Model\Office;
use Itb\Model\OfficeRepository;
use Itb\Model\OfficeRepositoryView;
use Itb\Model\LookUpReferenceRepositoryCounties;

use Itb\WebApplication;

class OfficeController
{
    private $app;

    public function __construct(WebApplication $app)
    {
        $this->app = $app;
    }

    public function listAction()
    {
        // get reference to our repository
        $officeRepository = new OfficeRepositoryView();
        $offices = $officeRepository->getAll();

        $argsArray = [
            'offices' => $offices
        ];
        $templateName = 'offices\list';
              return $this->app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    public function successAction()
    {
        $templateName = 'offices\success';
        return $this->app['twig']->render($templateName . '.html.twig');
    }

    public function updateAction($id)
    {
        // get reference to our repository
        $officeRepository = new officeRepository();
        // get array of office attributes for that product, ready for view to use to populate form
        $office = $officeRepository->getOneById($id);
        // database connection
        $counties= new LookUpReferenceRepositoryCounties();

        $counties = $counties->getAll();



         if (null == $office) {
            $message = 'sorry, no office with id = ' . $id . ' could be retrieved from the database';
            $templateName = 'message';

            return $this->app['twig']->render($templateName . '.html.twig');
        } else {
            // route user to update page for product
            // output the detail of product in HTML table

            $templateName = 'offices\update';
            $argsArray = [
                'office' => $office,
                'counties' => $counties
            ];

            return $this->app['twig']->render($templateName . '.html.twig',$argsArray);
        }

    }

    public function processUpdateAction()
    {
        // get reference to our repository
        $editedoffice= new office();
        $editedoffice->setId(filter_input(INPUT_POST, 'Id'));
        $editedoffice->setofficeName(filter_input(INPUT_POST, 'officeName'));
        $editedoffice->setAddressLine1(filter_input(INPUT_POST, 'addressLine1'));
        $editedoffice->setAddressLine2(filter_input(INPUT_POST, 'addressLine2'));
        $editedoffice->setAddressLine3(filter_input(INPUT_POST, 'addressLine3'));
        $editedoffice->setCountyPostcode(filter_input(INPUT_POST, 'countyPostcode'));
        $editedoffice->setEirCode(filter_input(INPUT_POST, 'eirCode'));
        $editedoffice->setMobileTelephone(filter_input(INPUT_POST, 'mobileTelephone'));
        $editedoffice->setLandlineTelephone(filter_input(INPUT_POST, 'landlineTelephone'));
       $officeRepo= new officeRepository();
        $success = $officeRepo->update($editedoffice);
        $templateName = 'offices\success';
        if($success){
            $id = $editedoffice->getId(); // get ID of new record
            $message = "SUCCESS - new office with ID. ".$id ." updated";
        } else {
            $message = 'sorry, there was a problem updating that office';
        }
        // route user to message page with success or failure notice

        $argsArray = [  'message' => $message];
        return $this->app['twig']->render($templateName . '.html.twig', $argsArray);
    }



    public function deleteAction($id)
    {
        // get reference to our repository
        $officeRepository = new officeRepository();
        $success = $officeRepository->delete($id);
        if($success){
            $message = "SUCCESS - office deleted";
        } else {
            $message = 'sorry, there was a problem deletingthat office';
        }
        // route user to message page with success or failure notice
        $templateName = 'offices\success';
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
           $templateName = 'offices\create';
        return $this->app['twig']->render($templateName . '.html.twig', $argsArray);
    }


    public function processCreateAction()
    {
        // get reference to our repository
        $newoffice= new office();
        $newoffice->setofficeName(filter_input(INPUT_POST, 'officeName'));
        $newoffice->setAddressLine1(filter_input(INPUT_POST, 'addressLine1'));
        $newoffice->setAddressLine2(filter_input(INPUT_POST, 'addressLine2'));
        $newoffice->setAddressLine3(filter_input(INPUT_POST, 'addressLine3'));
        $newoffice->setCountyPostcode(filter_input(INPUT_POST, 'countyPostcode'));
        $newoffice->setEirCode(filter_input(INPUT_POST, 'eirCode'));
        $newoffice->setMobileTelephone(filter_input(INPUT_POST, 'mobileTelephone'));
        $newoffice->setLandlineTelephone(filter_input(INPUT_POST, 'landlineTelephone'));
         $newoffice->getId();
        $officeRepo= new officeRepository();
        $success = $officeRepo->create($newoffice);
        $templateName = 'offices\success';
        if($success){
            $id = $newoffice->getId(); // get ID of new record
            $message = "SUCCESS - new office with ID = $id created";
        } else {
            $message = 'sorry, there was a problem creating new office';
        }
        // route user to message page with success or failure notice

        $argsArray = [  'message' => $message];
        return $this->app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    public function showAction($id)
    {
        // get reference to our repository
        $officeRepository = new officeRepositoryView();
        $office = $officeRepository->getOneById($id);
         //to do update to get one by id
        // get array of attributes for that office, ready for view to use to populate form
        $argsArray = [
            'office' => $office
        ];


        $templateName = 'Offices\show';
        return $this->app['twig']->render($templateName . '.html.twig', $argsArray);
    }
}