.. rst-class:: FaultManagerdoc

.. role:: underline
    :class: underline

.. _features.working-with-exceptions:

Working with Exceptions
=======================

You already may use `PHP built-in exceptions <http://php.net/manual/en/language.exceptions.php>`_ or you might also
have already build your own exceptions for your app, like for instance ``MyException`` which implements
`Throwable <http://php.net/manual/en/class.throwable.php>`_ interface.

Of course, you can still use the traditional way ``throw \MyException()`` but you also can use :php:meth:`Fault::throw()`
or :php:meth:`Fault::exception()` methods and get all the benefits of Fault Manager like
:ref:`features.custom-exceptions` and :ref:`features.event-stream`.

.. code-block:: php
    :caption: Using Fault Manager
    :name: using-fault-manager

    try {
        try {
            try {
                // Using Fault::throw()
                Fault::throw(\Exception::class, 'Bad message');
            } catch (\Exception $exception) {
                // Some logic after catching \Exception
                // Let's throw one of our own now with Fault::exception()
                throw Fault::exception(\MyException::class, 'More info');
            }
        } catch (\MyException $exception) {
            // Some logic goes here...
            // Why not throw an already defined namespaced exception?
            // Let's do it with Fault::throw()
            Fault::throw(\MyApp\MyException::class, 'Too many exceptions!');
        }
    } catch (\MyApp\MyException::class $exception) {
        // Some more logic here...
    } finally {
        // No more logic left! :D
    }

.. note:: :php:meth:`Fault::throw()` is an alias to :php:meth:`Fault::exception()` with a difference that
          :php:meth:`Fault::exception()` returns the exception and :php:meth:`Fault::throw()` throws it directly.
          As you can see in the :php:class:`Fault` class on :underline:`line 146`


.. literalinclude:: ../../../src/Fault.php
    :language: php
    :caption: /Fault.php
    :name: Fault.php
    :emphasize-lines: 8
    :lines: 151-160
    :lineno-start: 151
    :linenos:

Message Arguments
-----------------

As you may noticed, :php:meth:`Fault::exception()` as also :php:meth:`Fault::throw()` receive 5 parameters:

.. rst-class:: public static

    :Parameters:
        * **$exceptionClass** (string)
        * **$message** (string)
        * **$code** (int)
        * **$previous** (null | \\Throwable <Throwable>)
        * **$arguments** (array)


- :php:attr:`$exceptionClass` The name of the Exception class we want to throw
- :php:attr:`$message` The message we want to deliver
- :php:attr:`$code` The error code
- :php:attr:`$previous` Previous Exception object
- :php:attr:`$arguments` Array of items to replace in message text. See `vsprintf <http://php.net/manual/en/function.vsprintf.php>`_

Since the first 4 parameters are self-explanatory we will focus on 5 :sup:`th` param :php:attr:`$arguments`,
a simple example:

.. code-block:: php
    :caption: Message with arguments
    :name: message-with-arguments

    Fault::throw(\Exception::class, 'Goodbye %s!', 0, null, ['world']);

The above example will produce a ``Fatal error: Uncaught Exception: Goodbye world!``

As you probably realised already, is not very convenient to have :php:attr:`$arguments` param at the end, but at least
for time being, is better to not break the semantics of `PHP's <http://php.net/manual/en/exception.construct.php>`_
:php:meth:`Exception::__construct`.

.. rst-class:: public

    .. php:class:: Exception

	    .. php:method:: public __construct ([ string $message = "" [, int $code = 0 [, Throwable $previous = NULL ]]] )

