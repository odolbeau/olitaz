Olitaz Website
==============

Installation
------------

Clone the repo.

Copy ``app/config/parameters.ini-dist`` file & change configuration

Install the vendors:

    php bin/vendors install

Run install.sh script:

    ./install.sh

Mail Configuration
------------------

By default, contact mails are spool. So don't forget to add a cron job to triggered the command:

    php app/console swiftmailer:spool:send


Tests
-----

Don't forget to test the application by launching tests with:

    ./tests.sh
