

#Narsing
# This application is developer by CAKEPHP 2.5.3

# Installation Process
------------------------------------

1. Pull the code from https://github.com/nrgphd/narsing in to the web root directory, 
   jewelStreet Directory will be generated
2. Give 777 permision to directory 
	i,e chmod -R 777 jewelStreet/*
3. import database file jewelStreet.sql in to mysql database from jewelStreet directory

4. update database settings as per your environment in jewelStreet/app/Config/database.php

4. <ipaddress>/jewelStreet in browser


---------------------------------------------



# Roles In Given Use-case:
------------------------
Admin
Supervisor
SalesPerson

Admin:

	Username:- admin@gmail.com
	Password:- 123456

Admin can only add supervisors.

Supervisor:
	Username:- sup1@gmail.com
	Password:- 123456

Supervisors can check for sales staff performance in a particular month and year( default to current month and year ).

Sales Person:
	Username:- seller1@gmail.com
	Password:- 123456

Sales person can login to system and can enter in-time, out-time and grams of gold he sold on particular date.

# Note:- 

1. Free Trail of an api is going to expire on (10-june-2015)

2. Considering flexibility of application for sales staff a date field is provided while entering in-time, out-time and gold sold on that day. If Sales staff has to enter his timings only on that particular date then there is no need of providing date field.

3. This application includes Sales staff performance ecaluation only. Particular Shop performance evaluation not included ( If time permits it will be done as similar to sales staff ).

4. For Supervisour in  Sales staff performance ecaluation in particular year of particular month only the staff who came to shop in that    month will be listed, other sales staff will not be shown in the list.

5. For ADMIN only adding of supervisour given( View, Edit and Delete can also be done later ).

