#web-developer-test

To run this project locally, you will need
1) a way to run a php website locally (e.g. wamp)
2) mySQL server

Instructions:

1) Set up connection database and schema. Inside web-developer-test-app/app/classes/dbh.class.php there is connection information that needs to be changed to fit your server.
Variable $host needs to be changed to your host name, $user needs to be changed to your username, $pwd needs to be changed to your password and $db needs to be changed database(schema) name you will be using for running this website.

2) You will need to setup a table inside your database, to do so, you can use sql files added to this repository. 
structure.sql contains queries that create table structure.
data.sql contains queries that populate the table created with structure.sql with dummy data.
structure and data.sql creates and populates table.
Run sql queries from these files in your database and a table with appropriate structure should appear.

3) Run this website locally, if you have wamp, you can copy 'web-developer-test-app' folder into 'wampfolder'/www and it should be accessible by typing 'localhost'/web-developer-test-app/public/ into web browser. To access page with submitted emails, go to /web-developer-test-app/public/emails-table.php.


