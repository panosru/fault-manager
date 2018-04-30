.. rst-class:: FaultManagerdoc

.. _features.custom-exceptions:

Custom Exceptions
=================

Another powerful feature of Fault Manager is the ability to generate and compile exception classes on the fly.

Instead of spending time on building your own exception classes and end up with a pile of exception files here and there
in your project, you can use Fault Manager and provide a name of an exception that has not been generated yet, and
Fault Manager will do the rest. You actually don't even have to do it before you throw the exception, you can generate
exception classes just at the point you want to use them.

Take the following as example:

.. code-block:: php
    :caption: Generate Custom Exception
    :name: generate-custom-exception

    Fault::throw('CustomException', 'a message here');

:php:class:`CustomException` class is not yet defined anywhere in our project, what Fault Manager will do is:

Check if a class with that name already exists

    If it is
        #. Get a new instance of the class with params

    If it is not
        #. Generate the class and compile it to file
        #. Load the newly generated class with params

The above example will produce the following file:

.. code-block:: php
    :caption: CustomException.php
    :name: custom-exception-php

    <?php

    class CustomException extends Exception
    {


    }

The above file will be saved into the compiled path directory.

For more info on how to define your own path, check :ref:`features.compiler.path`.

Rules
-----

There are few rules to follow in order to generate a custom exception class:

#. If you pass an empty string as :php:attr:`$exceptionClass` a :php:class:`EmptyErrorNameException` will be thrown

#. If you try to generate a namespaced custom exception a :php:class:`NamespacedErrorException` will be thrown as that
   `feature <https://github.com/omegad-biz/fault-manager/issues/4>`_ is not yet supported

#. In order to generate a custom exception, the name of the exception must end-up with ``Exception``.
   That is valid: ``CustomException`` while that is not: ``CustomError``, the later will raise
   :php:class:`IncompatibleErrorNameException`
