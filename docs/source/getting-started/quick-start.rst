.. rst-class:: FaultManagerdoc

.. _getting-started.quick-start:

Quick Start
===========

It is recommended to place ``use Omega\FaultManager\Fault;`` in your PHP file in order to call
:php:class:`\\Omega\\FaultManager\\Fault`  class directly.

.. _getting-started.quick-start.traditional:

Traditional way
---------------

.. code-block:: php
    :caption: Traditional Exception Throw
    :name: traditional-exception-throw

    try {
        throw new \Exception('Something bad happened!');
    } catch (\Exception $exception) {
        // Do some handling
    }

.. _getting-started.quick-start.fault-manager:

Fault Manager approach
----------------------

You can either use :php:meth:`Fault::throw()` as shown in the below example

.. code-block:: php
    :caption: Fault Manager :php:meth:`Fault::throw()` method
    :name: fault-manager-throw

    try {
        Fault::throw(\Exception::class, 'Something bad happened!');
    } catch (\Exception $exception) {
        // Do some handling
    }

Or if you feel that you prefer to have a more traditional way then you can use :php:meth:`Fault::exception()` instead.

.. code-block:: php
    :caption: Fault Manager :php:meth:`Fault::exception()` method
    :name: fault-manager-exception

    try {
        throw Fault::exception(\Exception::class, 'Something bad happened!');
    } catch (\Exception $exception) {
        // Do some handling
    }

But Fault Manager is not just an Exception factory... To learn more, continue to :ref:`reference`.
