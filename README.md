ArchFizz.co.uk : 2009 - 2011
============================

[Legacy website](http://2009.archfizz.org/) restored with new technologies, but content is still the same.

Uses Composer, Silex, Twig, PSR-4 autoloading, Behat 3, Grunt, Bower, Sass, Compass and Zurb Foundation 5.


Prerequisites
-------------

Prerequisites:

  * PHP 5.4
  * Git
  * Composer
  * Node.js
  * NPM
  * Bower (`sudo npm install -g bower`)
  * Grunt (`sudo npm install -g grunt-cli`)
  * Ruby
  * Sass
  * Compass (`sudo gem install compass` - will also install Sass)


Install yourself
----------------

    $ git clone https://github.com/archfizz/2009 archfizz2009
    $ cd archfizz2009
    $ composer install

The Composer install command will also run

    $ bower install
    $ compass compile
    $ grunt


Run Tests
---------

Web acceptance tests are run using Behat 3.0 and the Mink Extension. Run the following command to execute them.

    $ bin/behat


License
-------

You MAY clone to repository and change the various properties for your own site.
You MAY even copy the styles and you would be encouraged to alter the colors or textures to your needs.

However, you MAY NOT copy the "ArchFizz" name, logo or any of the portfolio images.
