-------------------------------------------------------
Title: HomeChef

-------------------------------------------------------

Documentation
========
##### Table of Contents  
[Overview](#overview)  
[Installation](#installation)
[Support](#support)
[index](#index)
[mainDash](#mainDash)
[topnav](#topnav)
[sidenav](#sidenav)




Overview
--------

Here are the general instructions on how to run the site, the technologies used and how to submit an issue.
This github pages site will serve as a thorough manual for the entire site in time. This page is mostly the same as the readme for this repo.


Installation
------------

Is not hosted online currently therefore to run the site you need to use localhost and the following technologies.


Full LAMP stack needed
Developed In Ubuntu (Peppermint OS)
Apache Web Server https://httpd.apache.org/
MySQL https://www.mysql.com/
PHP 7 http://php.net/

Also required:
  Bootstrap
  jQuery
  Adminer


Support
-------

- Issue Tracker: github.com/$project/$BookShelf/issues
- Docs: https://emcd123.github.io/BookShelf/

index
-----

Greets the user on site load with a login form.
All other pages redirect the user to here if their userId session variable has not been set here.

Upon successful login the userName and userId are stored in sessions.

mainDash
--------

As with all subsequent pages other than index the css for the navigation bars as stored in /stylesheets/navigationBars.CSS.
This contains links to all other major pages.

topnav
------

Found in /stylesheets
Displays the username in the right corner aswell as a logout button

sidenav
-------
Found in /stylesheets
Will contain links to different areas of the site. The exact links will be different
on different pages.
