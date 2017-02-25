# Scheduler Changelog

## initially forked from this repo

- https://github.com/dr-matt-smith/hdip_web3_test_SAMPLE_2017

## Sunday 19th Feb 2017

set up Customer, Employee, EmployeeAbsence, EmployeeUnavailabilityTime, Office, Roster, RosterAssignedEmployee, ServiceUser,User classes and repository class for Customer

Updated WebApplication class with additional routes to CustomerController

customers/list template is working
adapted CustomerRepository so that it reads from a SQL view which includes OfficeName

## Sunday 19th Feb 2017

added create and processCreate methods to customer which routes to success to Customer Controller
added post method. Added create template form with post method/

## Saturday 25th Feb 2017

Added update and processUpdate methods to Customer Controller
Resolved issues where dropdown menus were not retrieving database values and setting lookup to stored value
Updated public\index to link to available entity
Added show [Customer] entity and included basic navigation between pages
