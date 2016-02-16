# Thanpa PHP CodeSniffer Coding Standard

A coding standard to check against the [Thanpa coding standard](http://www.thanpa.com/coding-standard.html).

## Installation

### Composer

This standard can be installed with the [Composer](https://getcomposer.org/) dependency manager.

1. [Install Composer](https://getcomposer.org/doc/00-intro.md)

2. Install the coding standard as a dependency of your project

        composer require --dev thanpa/thanpa-coding-standard:~1.0

3. Add the coding standard to the PHP_CodeSniffer install path

        bin/phpcs --config-set installed_paths vendor/thanpa/thanpa-coding-standard

4. Check the installed coding standard for "Thanpa"

        bin/phpcs -i

5. Done!

        bin/phpcs /path/to/code

### Stand-alone

1. Install [PHP_CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer)

2. Checkout this repository

        git clone git://github.com/thanpa/thanpa-coding-standard.git thanpa/thanpa-coding-standard

3. Add the coding standard to the PHP_CodeSniffer install path

        phpcs --config-set installed_paths thanpa/thanpa-coding-standard

   Or copy/symlink this repository's "Thanpa"-folder inside the phpcs `Standards` directory

4. Check the installed coding standard for "Thanpa"

        phpcs -i

5. Done!

        phpcs /path/to/code
