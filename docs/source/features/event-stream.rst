.. rst-class:: FaultManagerdoc

.. _features.event-stream:

Event Stream
============

That is the most powerful feature of Fault Manager, the ability to provide Exceptions that would be added into Event
Stream and attach handler for all Exceptions or additionally to specific exceptions.


.. _features.event-stream.enable:

Enabling Event Stream
---------------------

In order to enable Event Stream you simply need to type the following command:

.. sourcecode:: php

    Fault::enableEventStream();

You can check if Event Stream is enabled with

.. sourcecode:: php

    Fault::isEventStreamEnabled();

If you want to disable Event Stream you can use

.. sourcecode:: php

    Fault::disableEventStream();


.. note::

    When Event Stream is Enabled, custom generated exceptions will not extend from PHP built-in :php:class:`\Exception`
    class, instead, will extend the :php:class:`\\Omega\\FaultManager\\Abstracts\\FaultManagerException` abstract class

.. warning::

    In order to use Event Stream everywhere in your app, make sure that you call :php:meth:`Fault::enableEventStream()`
    method before calling :php:meth:`Fault::throw()` / :php:meth:`Fault::exception()` methods.


.. _features.event-stream.generate:

Generate Evented Custom Exception
---------------------------------

Once the Event Stream is enabled then the process of generating an evented custom exception is the same as with normal
custom exceptions shown in ":ref:`generate-custom-exception`" example.

So since we already have enabled Event Stream in our app, then once we run the following code:

.. sourcecode:: php

    Fault::throw('CustomException', 'a message here');

A file ``CustomException.php`` will be generated *(in case it does not already exist)* with the following contents:

.. code-block:: php
    :caption: CustomException.php *(Evented)*
    :name: custom-exception-php-evented

    <?php

    class CustomException extends \Omega\FaultManager\Abstracts\FaultManagerException
    {


    }

Now you are all set! Time to move to :ref:`features.event-handler` !
