# Editorial/Markitup plugin for CakePHP

## Installation

You can install this plugin into your CakePHP application using [composer](http://getcomposer.org).

The recommended way to install composer packages is:

```
composer require your-name-here/Editorial/Markitup
```

##Loading

After instaling a plugin you may load a plugin:

```php
Plugin::load('Editorial/Markitup', ['bootstrap' => false, 'routes' => true]);
```

##Configuration

In config/bootstrap.php after the plugins load section, add:

```php
  Configure::write('Editorial',[
      //Editor name
      'editor' => 'Editorial/Markitup',
      //If you want to enable autoload editor for inputs with "editor" class
      'autoload' => true
  ]);
```

Configure options

'editor': Editor name

'autoload': If you want to enable autoload editor for inputs with "editor" class

'class': Class name for inputs where you want use editor

default file with configuration of editor:
```php
'Markitup' => [
  'defaults' => 'Editorial/Markitup.defaults'
]
```


##Using

Add class name to your field where you want use editor

## Creating Your Own skin

If you wish add new the skin of the  redactor, you must add  the skin files to webroot path of the editor plugin and change "skin" option in configuration file of editor

## Creating Your Own editor

For creating new editor create new plugin with helper "EditorHelper", where "Editor" - your editor name. Thise helper mast extends EditorialHelper.
thise helper mast have two function:

initialize() - loading js and css file or some else.

connect() - the generate js code for initialize the editor and inject it in the page


Helper class is using:

```php
use Editorial\Core\View\Helper\EditorialHelper;
use Cake\Core\Configure;
```
