# Report App Test

This is a Laravel test project, based on previously established criteria. Developed in Laravel 5.7 and using a 
5.6 Mysql database.

## How to?

1. Make a clone of this project
2. Define the configurations of your database in your .ENV file.
3. Execute the command ` php artisan migrate:reset && php artisan migrate && php artisan db:seed ` in your terminal.
4. Start the built-in server of the project `php artisan serve`.
5. Access the project in your browser and sign up.

## Project information

When you register yourself (or sign in ) you will be redirected to dashboard. There are presented some reports and 
websites models, thar were created by seeds. The main available resources in the present project are Report CRUD and 
filters to be used in then reports.
Using the reports (/manager/reports/{id}) you are able to choose the model, and add criteria based on recorded 
Meta and related to the reports.

## Some resources  of the project

 - Initial project structure and resources (models, migrations, factories, seeds)
 - Repositories
 - Services
 - Backend with Laravel Auth Scaffold
 - Front-end with some javascript's
 - Report CRUD
 - Report usage with filter and with a container that show filtered results.
 
## Test Answers 

##### 1. Please give a rough description of how you would envision the UX side of creating a new new report.
**A:** The reports screen must have a dynamic criteria list . To permit the user to choose fields and what criteria connect to
the user needs. 

##### 2. Would you create any new Models for this reporting feature? If so, please list the model’s relationships and provide a short description of how the model will be used. If not, please explain how the app will function without new models.
**A:** Yes, it was necessary to create a Report Model to store the report information and Report Meta to save the Meta 
that are going to be used in the report. 

#### 3. Assume the route to display this report is “../reports/1”. Please provide a code sample for the controller function that would return data to be used in a view for rendering the result table. Don’t bother with the view itself, just the controller function.
**A:** Click to see [the controller code](https://github.com/zabaala/laravel-report-test/blob/master/app/Http/Controllers/ReportsController.php#L44), 
[the service code](https://github.com/zabaala/laravel-report-test/blob/master/app/Support/FilterQueryBuilder/FilterQueryBuilder.php) and
[the criteria code](https://github.com/zabaala/laravel-report-test/blob/master/app/Support/FilterQueryBuilder/Criteria/Criteria.php).

#### 4. Feel free to contact Alex if you feel you need any more details.
**A:** Thanks Alex, but it wasn't necessary. 

#### 5. Please record how much time this it took you to complete this test.
**A:** 12h

## EXTRA CREDIT
The following questions are not required. And if you choose to answer
one or both, you are not required to provide code examples, just a description of your
approach to a solution.

#### 1. Let’s say each website could be related to a staff user. So the user model would have a ‘hasMany’ relationship to websites which in turn ‘belongTo’ a user. How could dynamic reporting support building a report with both of these models?
**A:** As we have a dynamic service building of queries, we just need to add a new type of Meta to the service to 
permit the identification of the "belong to" relationship with the user. That's what let we to do a implementation that add 
the user to the criteria list in the frontend.

#### 2. Could we efficiently support server-side sorting of the results based on fields from either model? (allow user to choose if they want to sort ‘Websites+Users’ by ‘Domain’, or ‘Websites+Users’ by ‘User_Name’)
**A:** Sure. If It's possible to have dynamic criteria, It's possible to sort the criteria. Because if there are a models 
relationship we can sort it. 