Bukmin
======

Installation
------------
First, clone the repository:

    git clone git://github.com/NuxosMinecraft/Bukmin.git
    # OR
    git clone git@github.com:NuxosMinecraft/Bukmin.github
    
Configuration
-------------

Create logs and cache directories
	cd Bukmin && mkdir app/cache app/logs

Check that all is OK (php configuration):

    php app/check.php
    
Copy the app/config/parameters.ini.dist to app/config/parameters.ini and edit it.
Then, install the dependencies:

    ./bin/vendors update
    
Create the database and the tables:

    ./app/console doctrine:database:create
    ./app/console doctrine:schema:update --dump-sql # Check what will be changed
    ./app/console doctrine:schema:update --force

Update
------
Git pull:

    git pull
    
Check if there is SQl updates:

    ./app/console doctrine:schema:update --dump-sql # Check what will be changed
    ./app/console doctrine:schema:update --force
    
Clean the cache

    ./app/console cache:clear
    # OR
    ./app/console cache:clear --env=prod

If you have a problem
---------------------
Try to clean the cache first:

    ./app/console cache:clear
    # OR
    ./app/console cache:clear --env=prod