<?php
/**
 * Created by PhpStorm.
 * User: john.ogrady
 * Date: 18/02/2017
 * Time: 22:24
 */

namespace Itb\Controller;

use Itb\Model\Roster;
use Itb\model\RosterAssignedEmployee;
use Itb\model\RosterAssignedEmployeeRepository;
use Itb\Model\RosterRepository;
use Itb\Model\RosterRepositoryView;
use Itb\Model\LookUpReferenceRepositoryCounties;
use Itb\Model\LookUpReferenceRepositoryRosterStatus;
use Itb\Model\ServiceUser;
use Itb\Model\ServiceUserRepository;
use Itb\Model\EmployeeRepository;
use Itb\Model\OfficeRepository;
use Itb\Model\CustomerRepository;
use Itb\WebApplication;

class RosterController
{
    private $app;

    public function __construct(WebApplication $app)
    {
        $this->app = $app;
    }

    public function listAction()
    {
        // get reference to our repository
        $rosterRepository = new rosterRepositoryView();
        $rosters = $rosterRepository->getAll();
        $rosterStatus= new LookUpReferenceRepositoryRosterStatus();
        $rosterStatus= $rosterStatus->getAll();

        $argsArray = [
            'rosters' => $rosters, 'rosterstatus'=>$rosterStatus
        ];
        $templateName = 'rosters\list';
              return $this->app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    public function successAction()
    {
        $templateName = 'rosters\success';
        return $this->app['twig']->render($templateName . '.html.twig');
    }

    public function updateAction($id)
    {
        // get reference to our repository
        $rosterRepository = new rosterRepository();
        // get array of product attributes for that product, ready for view to use to populate form
        $roster = $rosterRepository->getOneById($id);
        // database connection

        // database connection
         if (null == $roster) {
            $message = 'sorry, no roster with id = ' . $id . ' could be retrieved from the database';
            $templateName = 'message';

            return $this->app['twig']->render($templateName . '.html.twig');
        } else {
            // route user to update page for product
            // output the detail of product in HTML table

             $serviceUsers = new serviceUserRepository();
             $serviceUsers= $serviceUsers->getAll();

             $timesArray=$this->fillTimes();

            $rosterStatus = new LookUpReferenceRepositoryRosterStatus();
            $rosterStatus= $rosterStatus->getAll();

             $customers= new CustomerRepository();
             $customers= $customers->getAll();


             $templateName = 'rosters\update';
            $argsArray = [
                'roster' => $roster,
                'rosterStatusList'=> $rosterStatus,
                'serviceUsers'=>$serviceUsers,
                'customers'=>$customers,
                'timesArray'=>$timesArray
             ];
              return $this->app['twig']->render($templateName . '.html.twig',$argsArray);
        }

    }

    public function processUpdateAction()
    {
        // get reference to our repository
        $editedRoster= new roster();
        $editedRoster->setId(filter_input(INPUT_POST, 'Id'));
        $editedRoster->setNumberResourcesNeeded(filter_input(INPUT_POST, 'numResources'));
        $editedRoster->setRosterStatus(filter_input(INPUT_POST, 'rosterStatus'));

        $editedRoster->setRosterStartTime(filter_input(INPUT_POST, 'rosterDate').' '.(filter_input(INPUT_POST, 'startTime')));
        $editedRoster->setRosterEndTime(filter_input(INPUT_POST, 'rosterDate').' '.(filter_input(INPUT_POST, 'endTime')));

        $editedRoster->setServiceUserId(filter_input(INPUT_POST, 'serviceUser'));
        $editedRoster->setcustomerId(filter_input(INPUT_POST, 'customer'));

        $rosterRepo= new rosterRepository();
        $success = $rosterRepo->update($editedRoster);
        $templateName = 'rosters\success';
        if($success){
            $id = $editedRoster->getId(); // get ID of record to be updated
            $message = "SUCCESS - roster with ID = $id has been updated";
        } else {
            $message = 'sorry, there was a problem updating that roster';
        }
        // route user to message page with success or failure notice

        $argsArray = [  'message' => $message];
        return $this->app['twig']->render($templateName . '.html.twig', $argsArray);
    }



    public function deleteAction($id)
    {
        // get reference to our repository
        $rosterRepository = new rosterRepository();
        $success = $rosterRepository->delete($id);
        if($success){
            $message = "SUCCESS - roster id: ". $id." deleted";
        } else {
            $message = 'sorry, there was a problem deleting that roster';
        }
        // route user to message page with success or failure notice
        $templateName = 'rosters\success';
        $argsArray = [  'message' => $message];
        return $this->app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    public function createAction($id)
    {
        // get reference to our repository
        $rosterStatus= new LookUpReferenceRepositoryRosterStatus();
        $rosterStatus= $rosterStatus->getAll();
        var_dump($id);

        $customers= new CustomerRepository();
        $customers= $customers->getAll();
        $timesArray=$this->fillTimes();
        $serviceUsers = new serviceUserRepository();
        $serviceUsers= $serviceUsers->getAll();

        $argsArray = [
            'rosterStatusList'=> $rosterStatus,
            'serviceUsers'=>$serviceUsers,
            'customers'=>$customers,
            'timesArray'=>$timesArray,
            'Id'=>$id

        ];
            $templateName = 'rosters\create';
        return $this->app['twig']->render($templateName . '.html.twig', $argsArray);
    }


    public function processCreateAction()
    {
        // get reference to our repository
        $newroster= new Roster();
        $newroster->setNumberResourcesNeeded(filter_input(INPUT_POST, 'numResources'));
        $newroster->setRosterStatus(filter_input(INPUT_POST, 'rosterStatus'));
        $newroster->setRosterStartTime(filter_input(INPUT_POST, 'rosterDate').' '.(filter_input(INPUT_POST, 'startTime')));
        $newroster->setRosterEndTime(filter_input(INPUT_POST, 'rosterDate').' '.(filter_input(INPUT_POST, 'endTime')));

        $newroster->setServiceUserId(filter_input(INPUT_POST, 'serviceUser'));
        $newroster->setcustomerId(filter_input(INPUT_POST, 'customer'));
        $newroster->getId();
        var_dump($newroster);
        $rosterRepo= new rosterRepository();
        $success = $rosterRepo->create($newroster);
        $templateName = 'rosters\success';
        if($success){
            $id = $newroster->getId(); // get ID of new record
            $message = "SUCCESS - new roster with ID = $id created";
        } else {
            $message = 'sorry, there was a problem creating new roster';
        }
        // route user to message page with success or failure notice

        $argsArray = [  'message' => $message];
        return $this->app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    public function showAction($id)
    {
        // get reference to our repository
        $rosterRepository = new rosterRepositoryView();
        $roster = $rosterRepository->getOneById($id);
        $assignedEmployees =new RosterAssignedEmployeeRepository();
        $foreignKey="rosterId";
        //to do figure out why this object is empty!
        $assignedEmployees->getAllForId($id,$foreignKey);

         //to do update to get one by id
        // get array of attributes for that roster, ready for view to use to populate form
        $argsArray = [
            'roster' => $roster,
            'assignedemployees'=>$assignedEmployees
        ];
        var_dump($argsArray);


        $templateName = 'rosters\show';
        return $this->app['twig']->render($templateName . '.html.twig', $argsArray);
    }


    public function assignEmployeeToRosterAction($id)
    {
        $rosterRepo= new RosterRepositoryView();
        $roster= $rosterRepo->getOneById($id);
        $employees= new EmployeeRepository();
        $employees=$employees->getAll();


        if (null == $roster) {
            $message = 'sorry, no ServiceUser with id = ' . $id . ' could be retrieved from the database';
            $templateName = 'message';

            return $this->app['twig']->render($templateName . '.html.twig');
        } else {
            // route user to update page for product
            // output the detail of product in HTML table
            $templateName = 'Rosters\assignEmployeeToRoster';
            $argsArray = [
                'roster'=>$roster,
                'employees'=>$employees
            ];

            return $this->app['twig']->render($templateName . '.html.twig',$argsArray);
        }

    }


    public function processAssignEmployeeToRosterAction()
    {
        // get reference to our repository
        $newrosterassignment= new RosterAssignedEmployee();
        $newrosterassignment->setEmployeeId(filter_input(INPUT_POST, 'employeeId'));
        $newrosterassignment->setRosterId(filter_input(INPUT_POST, 'rosterId'));
        var_dump($newrosterassignment);

        $rosterRepo= new RosterAssignedEmployeeRepository();
        $success = $rosterRepo->create($newrosterassignment);
        $templateName = 'rosters\success';
        if($success){
            $id = $newrosterassignment->getId(); // get ID of new record
            $message = "SUCCESS - this employee has been assigned to this roster created";
        } else {
            $message = 'sorry, there was a problem assigning this employee to this roster ';
        }
        // route user to message page with success or failure notice

        $argsArray = [  'message' => $message];
        return $this->app['twig']->render($templateName . '.html.twig', $argsArray);
    }

// utility function to create an array of times in 15 min intervals for dropdowns
    public function fillTimes() {
        $arrayOfTimes= [];
        $time = "00:00";
        $arrayOfTimes[0]="00:00";

        for ($i = 1; $i <= 95; $i++) {

            $time+= strtotime("+15 minutes", strtotime($time));
            $arrayOfTimes[$i]= strftime("%R", date($time));

        }
        return $arrayOfTimes;
    }
}