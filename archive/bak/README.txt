TEAM TVAY

Our final project objective is to develop a social network site where users can interact with each other, similar to the older Facebook and Myspace. 

Assignment 3:
Our deliverables for this assignment is a functional site that can interact with the database via PHP code. Included are ER Diagram, N2F MySQL tables, and .html .css .php code.

ER Diagram Explaination:

The primary keys are User, Profile, Comment

A user has 1 to 1 profile.
A profile has 1 to 1 user.

A comment has 1 to 1 sender.
A comment has 1 to 1 reciever.
User sends 0 to many comments.
User recieves 0 to many comments.

A comment is on 1 to 1 profile.
A profile has 0 to many comments.

To execute this assignment 3:
Precondition:
Import the .sql dump file
Open profile.php and assignment3.php, specify the correct dbusername, dbpassword, mysql database name.
Steps:
1. Open assignment3.html.
2. Register for an account, remember the username and password.
3. Once finished, login using the username and password.
4. Follow the links to view profile.
5. Content from registering info should be displayed.

Database has existing data. For testing, this following can be used to login:  
Username: troynguyen 
Password: 123

