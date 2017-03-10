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

## Sunday 26th Feb 2017

Added CRUD functionality Employee, ServiceUser and Office Controllers
Created routes for the CRUD functions for these entities
Created list, update, create, delete and show templates for each of these entities


## Sunday 5th March 2017

Added CRUD functionality for Rosters, updated entity relationships for missing customer lookup
Created routes for the Roster entity and added list, update, create, delete and show templates.

## Monday 6th March 2017
V1.2  Updated roster functionality so that date and times can be selected in separate form controls,
updated roster controller to parse both fields into a single datetime object when writing to database

## Wed 8th March 2017
V1.3 
Resolved issue with Check box on Service User record for isActive flag
Added getAllForId method to Matt's PDO- takes id and foreignkeyattribute and retrieves all records for an entity where foreignkeyattribute = id
Added sub table with rosters for each service user

## Thurs 9th March 2017

V1.4
Tided up CSS
Added ability to add a roster from a service user record and wired drop down on roster record to correct service user
Tidied up Employee isactive CRUD and form values