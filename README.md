# Group

A SNS for Telegram Group

## Installation

1. Build Phalcon on [Phalcon](https://www.phalconphp.com/en/download). Note: Don't install from launchpad on Ubuntu, or you will install old version of Phalcon.
2. Run `git clone git@github.com:TopFamily/group.git`
3. Enable Rewrite Module
4. Edit /app/config/config.ini
    Example:
    
        [database]
        adapter  = Mysql
        host     = localhost
        username = 2333
        password = 233333333333
        name     = 233

        [application]
        controllersDir = app/controllers/
        modelsDir      = app/models/
        viewsDir       = app/views/
        pluginsDir     = app/plugins/
        formsDir       = app/forms/
        libraryDir     = app/library/
        baseUri        = /topfamily/

        [session]
        prefix = group
