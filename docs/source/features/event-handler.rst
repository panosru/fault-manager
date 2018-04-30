.. rst-class:: FaultManagerdoc

.. role:: php(code)
	:language: php

.. _features.event-handler:

Event Handler
=============

Taking into consideration that we have Event Stream enabled, that means that each exception thrown in our app is an event.

So that:

.. sourcecode:: php

    Fault::throw(\Exception::class, 'bad message');

Is an event called 'Exception'.

In order to register a handler we use the :php:meth:`Fault::registerHandler()` method which takes 3 parameters:


.. php:class:: Fault

    .. rst-class:: public static

        .. php:method:: public static registerHandler( $eventId, $handler, $override=false)

            :Parameters:
                * **$eventId** (string)
                * **$handler** (\\Omega\\FaultManager\\Interfaces\\FaultManagerEventHandler)
                * **$override** (bool)


- :php:attr:`$eventId` The name of the event
- :php:attr:`$handler` The handler object that must implement the FaultManagerEventHandler interface
- :php:attr:`$override` If that is set to true, then it will override a handler previously defined

.. sourcecode:: php

    Fault::registerHandler(\Exception::class, MyHandler());


If the asterisk (\*) character is used as value for :php:attr:`$eventId` parameter, then that handler will listen to
all events.

.. php:class:: Fault

    .. php:const:: ALL_EVENTS = \*

        :Type: string


.. sourcecode:: php

    Fault::registerHandler(Fault::ALL_EVENTS, MyHandler());


Event Handler Object
--------------------

The event handler object must implement the :php:interface:`\\Omega\\FaultManager\\Interfaces\\FaultManagerEventHandler`
interface.

a simple event handler will look like this:

.. code-block:: php
    :caption: Event Handler
    :name: event-handler

    class SimpleHandler implements \Omega\FaultManager\Interfaces\FaultManagerEventHandler
    {
        public function __invoke(\Throwable $exception)
        {
            \dump('I got: ' . \get_class($exception) . " with message: '{$exception->getMessage()}'");
        }

    }

the following code:

.. sourcecode:: php

    Fault::registerHandler(Fault::ALL_EVENTS, new SimpleHandler());

    try {
        try {
            Fault::throw('CustomException', 'Message from try!');
        } catch (\CustomException $exception) {
            Fault::throw(\Exception::class, 'Message from catch!');
        }
    } catch (\Exception $exception) {
        \dump('I catch ' . get_class($exception) . '!');
    }

will result in:

.. sourcecode:: bash

    "I got: CustomException with message: 'Message from try!'"
    "I got: Exception with message: 'Message from catch!'"
    "I catch Exception!"

