.. rst-class:: FaultManagerdoc

.. _features.compiler:

Compiler
=============

Not many things to do here since everything is done already by the component, but is strongly recommended to set your
own compile folder on the root of your project rather than use the default path which in relation to the root of your
project is ``./vendor/panosru/fault-manager/_compiled/``.

.. _features.compiler.path:

Compile Path
------------

To get your current compile path you can use :php:meth:`Fault::compilePath()` method as shown in the below example:

.. sourcecode:: php

    $current_path = Fault::compilePath();


To set your compile path to another path you can use :php:meth:`Fault::setCompilePath(string $path)` method:

.. sourcecode:: php

    Fault::setCompilePath('/my/other/abosule/path/');

    $current_path = Fault::compilePath(); // will now show "/my/other/absolute/path/"

.. note::

    :php:meth:`Fault::setCompilePath(string $path)` will check if the path you provided exists if is a directory
    and if is writable, in case any of the above do not meet the requirements then an
    :php:class:`InvalidCompilePathException` will be thrown

.. warning::

    Any :php:meth:`Fault::throw()` or :php:meth:`Fault::exception()` used before the call of
    :php:meth:`Fault::setCompilePath(string $path)`, will use the default path instead.

.. _features.compiler.autoload:

Autoload Compiled Exceptions
----------------------------

To enable autoloading of your generated exception classes you can call :php:meth:`Fault::autoloadCompiledExceptions`
method. Otherwise your generated Exception will be accessed only via :php:class:`Fault` class.
