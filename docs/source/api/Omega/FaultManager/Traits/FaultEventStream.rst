.. rst-class:: FaultManagerdoc

.. role:: php(code)
	:language: php


FaultEventStream
================


.. php:namespace:: Omega\FaultManager\Traits

.. php:trait:: FaultEventStream


	.. rst-class:: phpdoc-description

		| Trait FaultEventStream


Methods
-------

.. rst-class:: public static

	.. php:method:: public static enableEventStream()

		.. rst-class:: phpdoc-description

			| \{@inheritdoc\}






.. rst-class:: public static

	.. php:method:: public static disableEventStream()

		.. rst-class:: phpdoc-description

			| \{@inheritdoc\}






.. rst-class:: public static

	.. php:method:: public static isEventStreamEnabled()

		.. rst-class:: phpdoc-description

			| \{@inheritdoc\}






.. rst-class:: public static

	.. php:method:: public static registerHandler( $eventId, $handler, $override=false)

		.. rst-class:: phpdoc-description

			| \{@inheritdoc\}






.. rst-class:: public static

	.. php:method:: public static unregisterHandler( $eventId)


		:Parameters:
			* **$eventId** (string)





.. rst-class:: protected static

	.. php:method:: protected static registerEvent( $router, $exception)


		:Parameters:
			* **$router** (Hoa\\Event\\Source <Hoa\\Event\\Source>)
			* **$exception** (Throwable <Throwable>)


		:Throws: \\Hoa\\Event\\Exception <Hoa\\Event\\Exception>



