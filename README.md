# Attendance_Manager_Project
## Aim: 
--- 
This is a web application which can be used for maintaining attendance records of the students. New students can be added to the list, a student can be removed from the list, attendance of the students can be marked datewise.
## Description:
---
Proffesor has to login fisrt and after successfully logging in there are various options provided to the professor to maintain the attendance of the students. The proffesor can add new students to the list, remove a student from the list, mark attendance of the students datewise, can view the attendance of a student for a particular month..

## Technologies used:
---
- HTML
- CSS
- Bootstrap
- PHP
- AngularJS
- MySQL
## Steps to run: 

<b>Step 1:</b> Start XAMPP and MySQL Server.<br>
<b>Step 2:</b> Connect to MySQL Database from localhost/phpMyAdmin and create a new database named "teacher". Add the username and password to this table. This step is mandatory as in an attendance management system, the admin creates the username for the teachers. The teachers can then log in with the correct credentials.<br>
<b>Step 3:</b>Save the downloaded files in 'htdocs' folder under 'xampp'.<br>
<b>Step 4:</b> Open localhost on a browser, and open the index.php file. This is the first page of the application. A professor has to login using correct username and password.<br>
<b>Step 5:</b>After logging in successfully, the home page will appear. It has options to Add student, remove student, mark attendance, view attendance.<br>
<b>Step 6:</b>To add a new student, click on add student. A new page for the same will open. The proffesor needs to enter the name of the student and the division. The student will be added to the database division1. Same can be done for adding a student to division2.<br>
<b>Step 7:</b>To remove a student click on remove student from the navbar. A new page will open, enter the student name, roll number and division, click on the remove student button and the student will be removed from the database.<br>
<b>Step 8:</b>To mark attendance, the professor has to click on mark attendance from the navbar, a new page will appear asking for the division and date. On selecting the divison and entering the date a list of stuednts will appear and the professor can easily mark the attedance. The date will be saved in a table named "attendance" whereas the attednace of each student will be updated in division1 or divison2 depending upon the division of the student.<br>
<b>Step 9:</b>To view attendance, the professor will click on view attendance and enter the details like name, roll number and division of the student and select a month. On clicking the View attendance button the attednance of that student for that month will appear. If the professor enters wrong details error message will be displayed asking him to fill the details correctly.<br>

## Conclusion:
The objective of this project was to build a web application that can help in maintaining the record of attendance of students easily. The web application has a user friendly interface and is user as it automates the process of marking the attendance manually and keeping a record of it. The system can be modified in the future.
