<?php
/**
 * Created by PhpStorm.
 * User: john.ogrady
 * Date: 18/02/2017
 * Time: 22:24
 */

namespace Itb\Controller;

use Itb\Model\Employee;
use Itb\model\EmployeeAbsence;
use Itb\model\EmployeeAbsenceRepository;
use Itb\model\EmployeeAbsenceRepositoryView;
use Itb\model\EmployeeRepository;
use Itb\model\EmployeeRepositoryView;
use Itb\model\EmployeeUnavailabilityTime;
use Itb\model\EmployeeUnavailableTimeRepository;
use Itb\model\EmployeeUnavailableTimeRepositoryView;
use Itb\Model\LookUpReferenceRepositoryAbsenceReasons;
use Itb\Model\LookUpReferenceRepositoryUnavailableReasons;
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
        if (isset($_POST['isActive']))
            $editedEmployee->setIsActive(1);
        else
            $editedEmployee->setIsActive(0);

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
        $newEmployee->setStaffNumber(filter_input(INPUT_POST, 'staffNumber'));
        $newEmployee->setAddressLine1(filter_input(INPUT_POST, 'addressLine1'));
        $newEmployee->setAddressLine2(filter_input(INPUT_POST, 'addressLine2'));
        $newEmployee->setAddressLine3(filter_input(INPUT_POST, 'addressLine3'));
        $newEmployee->setCountyPostcode(filter_input(INPUT_POST, 'countyPostcode'));
        $newEmployee->setEirCode(filter_input(INPUT_POST, 'eirCode'));
        $newEmployee->setMobileTelephone(filter_input(INPUT_POST, 'mobileTelephone'));
        $newEmployee->setLandlineTelephone(filter_input(INPUT_POST, 'landlineTelephone'));
        $newEmployee->setManagingOffice(filter_input(INPUT_POST, 'managingOffice'));
        if (isset($_POST['isActive']))
            $newEmployee->setIsActive(1);
        else
            $newEmployee->setIsActive(0);

        $newEmployee->getId();
        $employeeRepo= new EmployeeRepository();
        $success = $employeeRepo->create($newEmployee);
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
        $foreignKey="employeeid";

        $unavailableTimesRepo= new EmployeeUnavailableTimeRepositoryView();
        $unavailableTimes= $unavailableTimesRepo->getAllForId($id,$foreignKey);
        $unavailableReasons= new LookUpReferenceRepositoryUnavailableReasons();
        $unavailableReasons= $unavailableReasons->getAll();

        $absenceRepo= new EmployeeAbsenceRepositoryView();
        $absences= $absenceRepo->getAllForId($id,$foreignKey);
        $absenceReasons= new LookUpReferenceRepositoryAbsenceReasons();
        $absenceReasons= $absenceReasons->getAll();

        //to do update to get one by id
        // get array of attributes for that customer, ready for view to use to populate form
        $argsArray = [
            'employee' => $employee,
            'unavailableTimes' => $unavailableTimes,
            'absences'=>$absences,
            'absenceReasons'=>$absenceReasons
        ];


        $templateName = 'Employees\show';
        return $this->app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    public function availabilityUpdateAction($id)
    {
        // get reference to our repository
        $unavailableTimesRepo= new EmployeeUnavailableTimeRepositoryView();
        $unavailableTime= $unavailableTimesRepo->getOneById($id);

        $unavailableReasons= new LookUpReferenceRepositoryUnavailableReasons();
        $unavailableReasons= $unavailableReasons->getAll();
        $timesArray=$this->fillTimes();
        $daysArray=$this->fillDays();
        $templateName = 'Employees\AvailabilityUpdate';
            $argsArray = [
                'unavailableTime' => $unavailableTime,
                'unavailableReasons' =>$unavailableReasons
                ,'timesArray'=>$timesArray,
                'daysArray'=>$daysArray];


            return $this->app['twig']->render($templateName . '.html.twig',$argsArray);
        }



    public function processAvailabilityUpdateAction()
    {
        // get reference to our repository
        $unavailableTime= new EmployeeUnavailabilityTime();
        $unavailableTime->setEndTime(filter_input(INPUT_POST, 'endTime'));
        $unavailableTime->setStartTime(filter_input(INPUT_POST, 'startTime'));
        $unavailableTime->setEmployeeId(filter_input(INPUT_POST, 'employeeId'));
        $unavailableTime->setId(filter_input(INPUT_POST, 'Id'));

        $unavailableTime->setUnavailabilityReason(filter_input(INPUT_POST, 'unavailableReason'));
        $dayofWeek=filter_input(INPUT_POST, 'dayOfWeek');
        if ($dayofWeek=="Sunday")
            $unavailableTime->setDayOfWeek(0);
        else if ($dayofWeek=="Monday")
            $unavailableTime->setDayOfWeek(1);
        else if ($dayofWeek=="Tuesday")
            $unavailableTime->setDayOfWeek(2);
        else if ($dayofWeek=="Wednesday")
            $unavailableTime->setDayOfWeek(3);
        else if ($dayofWeek=="Thursday")
            $unavailableTime->setDayOfWeek(4);
        else if ($dayofWeek=="Friday")
            $unavailableTime->setDayOfWeek(5);
        else if ($dayofWeek=="Saturday")
            $unavailableTime->setDayOfWeek(6);

        $unavailableTime->getId();


        $unavailableTimeRepo= new EmployeeUnavailableTimeRepository();
        $success = $unavailableTimeRepo->update($unavailableTime);
         $templateName = 'Employees\success';
        if($success){
             $message = "SUCCESS - Unavailable Time updated";
        } else {
            $message = 'sorry, there was a problem updating Unavailable Time ';
        }
        // route user to message page with success or failure notice

        $argsArray = [  'message' => $message];
        return $this->app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    public function availabilityCreateAction($id)
    {
        // get reference to our repository
        $employeeRepository = new EmployeeRepositoryView();
        $employee = $employeeRepository->getOneById($id);
        $unavailableReasons= new LookUpReferenceRepositoryUnavailableReasons();
        $unavailableReasons= $unavailableReasons->getAll();
        $timesArray=$this->fillTimes();
        $daysArray=$this->fillDays();
        $templateName = 'Employees\AvailabilityCreate';
        $argsArray = [
            'unavailableReasons' =>$unavailableReasons
            ,'timesArray'=>$timesArray,
            'id'=>$id,
            'daysArray'=>$daysArray];


        return $this->app['twig']->render($templateName . '.html.twig',$argsArray);
    }

    public function processAvailabilityCreateAction()
    {
        // get reference to our repository
        $unavailableTime= new EmployeeUnavailabilityTime();
        $unavailableTime->setEndTime(filter_input(INPUT_POST, 'endTime'));
        $unavailableTime->setStartTime(filter_input(INPUT_POST, 'startTime'));
        $unavailableTime->setEmployeeId(filter_input(INPUT_POST, 'employeeId'));
        $unavailableTime->setId(filter_input(INPUT_POST, 'Id'));

        $unavailableTime->setUnavailabilityReason(filter_input(INPUT_POST, 'unavailableReason'));
        $dayofWeek=filter_input(INPUT_POST, 'dayOfWeek');
        if ($dayofWeek=="Sunday")
            $unavailableTime->setDayOfWeek(0);
        else if ($dayofWeek=="Monday")
            $unavailableTime->setDayOfWeek(1);
        else if ($dayofWeek=="Tuesday")
            $unavailableTime->setDayOfWeek(2);
        else if ($dayofWeek=="Wednesday")
            $unavailableTime->setDayOfWeek(3);
        else if ($dayofWeek=="Thursday")
            $unavailableTime->setDayOfWeek(4);
        else if ($dayofWeek=="Friday")
            $unavailableTime->setDayOfWeek(5);
        else if ($dayofWeek=="Saturday")
            $unavailableTime->setDayOfWeek(6);

        $unavailableTime->getId();


        $unavailableTimeRepo= new EmployeeUnavailableTimeRepository();
        $success = $unavailableTimeRepo->create($unavailableTime);
        $templateName = 'Employees\success';
        if($success){
            $message = "SUCCESS - Unavailable Time updated";
        } else {
            $message = 'sorry, there was a problem updating Unavailable Time ';
        }
        // route user to message page with success or failure notice

        $argsArray = [  'message' => $message];
        return $this->app['twig']->render($templateName . '.html.twig', $argsArray);
    }


    public function availabilityDeleteAction($id)
    {
        // get reference to our repository
        $unavailableTimeRepo= new EmployeeUnavailableTimeRepository();
        $success = $unavailableTimeRepo->delete($id);
        if($success){
            $message = 'SUCCESS - unavailability record deleted';
        } else {
            $message = 'sorry, there was a problem deleting that unavailability record';
        }
        // route user to message page with success or failure notice
        $templateName = 'Employees\success';
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

    // utility function to create an array of days of the weeksfor dropdowns
    public function fillDays() {
        $arrayOfDays= ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];

        return $arrayOfDays;
    }




    public function absenceCreateAction($id)
    {
        // get reference to our repository
        $employeeRepository = new EmployeeRepositoryView();
        $employeeAbsenceRepo= new EmployeeAbsenceRepository();
        $employee = $employeeRepository->getOneById($id);
        $absenceReasons= new LookUpReferenceRepositoryAbsenceReasons();
        $absenceReasons= $absenceReasons->getAll();
        $templateName = 'Employees\AbsenceCreate';
        $argsArray = [
            'absenceReasons' =>$absenceReasons,
            'id'=>$id];

        var_dump($argsArray);
        return $this->app['twig']->render($templateName . '.html.twig',$argsArray);
    }


    public function processAbsenceCreateAction()
    {
        // get reference to our repository
        $absence= new EmployeeAbsence();
        $absence->setEndTime(filter_input(INPUT_POST, 'endTime'));
        $absence->setStartTime(filter_input(INPUT_POST, 'startTime'));
        $absence->setEmployeeId(filter_input(INPUT_POST, 'employeeId'));
        $absence->setId(filter_input(INPUT_POST, 'Id'));
        $absence->setAbsenceReason(filter_input(INPUT_POST, 'absenceReason'));
        $absence->getId();


        $absenceRepo= new EmployeeAbsenceRepository();
        $success = $absenceRepo->create($absence);
        $templateName = 'Employees\success';
        if($success){
            $message = "SUCCESS - Employee Absence Time updated";
        } else {
            $message = 'sorry, there was a problem updating Employee Absence ';
        }
        // route user to message page with success or failure notice

        $argsArray = [  'message' => $message];
        return $this->app['twig']->render($templateName . '.html.twig', $argsArray);
    }



    public function absenceUpdateAction($id)
    {
        // get reference to our repository
        $absenceRepo= new EmployeeAbsenceRepository();
        $absence= $absenceRepo->getOneById($id);

        $absenceReasons= new LookUpReferenceRepositoryAbsenceReasons();
        $absenceReasons= $absenceReasons->getAll();
        $templateName = 'Employees\AbsenceUpdate';
        $argsArray = [
            'absence' => $absence,
            'absenceReasons' =>$absenceReasons];

        return $this->app['twig']->render($templateName . '.html.twig',$argsArray);
    }


    // TO DO RESOLVE ISSUE WHERE THIS METHOD IS NOT SAVING CHANGES CORRECTLY, HIDDEN FROM UI FOR NOW

    public function processAbsenceUpdateAction()
    {
        // get reference to our repository
        $absence= new EmployeeAbsence();
        $absence->setEndTime(filter_input(INPUT_POST, 'endTime'));
        $absence->setStartTime(filter_input(INPUT_POST, 'startTime'));
        $absence->setEmployeeId(filter_input(INPUT_POST, 'employeeId'));
        $absence->setId(filter_input(INPUT_POST, 'Id'));

        $absence->setAbsenceReason(filter_input(INPUT_POST, 'absenceReason'));
        $absence->getId();

        $absenceRepo= new EmployeeAbsenceRepository();

        $success = $absenceRepo->update($absence);

        $templateName = 'Employees\success';
        if($success){
            $message = "SUCCESS - Employee Absence updated";
        } else {
            $message = 'sorry, there was a problem updating Employee Absence';
        }
        // route user to message page with success or failure notice

        $argsArray = [  'message' => $message];
        return $this->app['twig']->render($templateName . '.html.twig', $argsArray);
    }

   public function absenceDeleteAction($id)
    {
        // get reference to our repository
        $absenceRepo= new EmployeeAbsenceRepository();
        $success = $absenceRepo->delete($id);
        if($success){
            $message = 'SUCCESS - absence record deleted';
        } else {
            $message = 'sorry, there was a problem deleting that absence record';
        }
        // route user to message page with success or failure notice
        $templateName = 'Employees\success';
        $argsArray = [  'message' => $message];
        return $this->app['twig']->render($templateName . '.html.twig', $argsArray);
    }

}