.. rst-class:: FaultManagerdoc

.. role:: php(code)
	:language: php


FaultManager
============


.. php:namespace:: Omega\FaultManager\Interfaces

.. php:interface:: FaultManager



Constants
---------

.. php:const:: ALL_EVENTS = \*

	:Type: string


Methods
-------

.. rst-class:: public static

	.. php:method:: public static exception( $exceptionClass, $message="", $code=0, $previous=null, $arguments=\[\])


		:Parameters:
			* **$exceptionClass** (string)
			* **$message** (string)
			* **$code** (int)
			* **$previous** (null | \\Throwable <Throwable>)
			* **$arguments** (array)


		:Returns: \\Throwable <Throwable>
		:Throws: \\Throwable <Throwable>
		:Throws: \\Omega\\FaultManager\\Abstracts\\FaultManagerException <Omega\\FaultManager\\Abstracts\\FaultManagerException>
		:Throws: \\Omega\\FaultManager\\Exceptions\\BaseError <Omega\\FaultManager\\Exceptions\\BaseError>
		:Throws: \\Omega\\FaultManager\\Exceptions\\ExceptionNameIsEmpty <Omega\\FaultManager\\Exceptions\\ExceptionNameIsEmpty>
		:Throws: \\Omega\\FaultManager\\Exceptions\\InvalidCompilePath <Omega\\FaultManager\\Exceptions\\InvalidCompilePath>
		:Throws: \\Omega\\FaultManager\\Exceptions\\NamespaceError <Omega\\FaultManager\\Exceptions\\NamespaceError>
		:Throws: \\Hoa\\Event\\Exception <Hoa\\Event\\Exception>
		:Throws: \\ReflectionException <ReflectionException>
		:Throws: \\Throwable <Throwable>
		:Throws: \\Omega\\FaultManager\\Abstracts\\FaultManagerException <Omega\\FaultManager\\Abstracts\\FaultManagerException>
		:Throws: \\Omega\\FaultManager\\Exceptions\\BaseError <Omega\\FaultManager\\Exceptions\\BaseError>
		:Throws: \\Omega\\FaultManager\\Exceptions\\ExceptionNameIsEmpty <Omega\\FaultManager\\Exceptions\\ExceptionNameIsEmpty>
		:Throws: \\Omega\\FaultManager\\Exceptions\\InvalidCompilePath <Omega\\FaultManager\\Exceptions\\InvalidCompilePath>
		:Throws: \\Omega\\FaultManager\\Exceptions\\NamespaceError <Omega\\FaultManager\\Exceptions\\NamespaceError>
		:Throws: \\Hoa\\Event\\Exception <Hoa\\Event\\Exception>
		:Throws: \\ReflectionException <ReflectionException>
		:Throws: \\Throwable <Throwable>
		:Throws: \\Omega\\FaultManager\\Abstracts\\FaultManagerException <Omega\\FaultManager\\Abstracts\\FaultManagerException>
		:Throws: \\Omega\\FaultManager\\Exceptions\\BaseError <Omega\\FaultManager\\Exceptions\\BaseError>
		:Throws: \\Omega\\FaultManager\\Exceptions\\ExceptionNameIsEmpty <Omega\\FaultManager\\Exceptions\\ExceptionNameIsEmpty>
		:Throws: \\Omega\\FaultManager\\Exceptions\\InvalidCompilePath <Omega\\FaultManager\\Exceptions\\InvalidCompilePath>
		:Throws: \\Omega\\FaultManager\\Exceptions\\NamespaceError <Omega\\FaultManager\\Exceptions\\NamespaceError>
		:Throws: \\Hoa\\Event\\Exception <Hoa\\Event\\Exception>
		:Throws: \\ReflectionException <ReflectionException>
		:Throws: \\Throwable <Throwable>
		:Throws: \\Omega\\FaultManager\\Abstracts\\FaultManagerException <Omega\\FaultManager\\Abstracts\\FaultManagerException>
		:Throws: \\Omega\\FaultManager\\Exceptions\\BaseError <Omega\\FaultManager\\Exceptions\\BaseError>
		:Throws: \\Omega\\FaultManager\\Exceptions\\ExceptionNameIsEmpty <Omega\\FaultManager\\Exceptions\\ExceptionNameIsEmpty>
		:Throws: \\Omega\\FaultManager\\Exceptions\\InvalidCompilePath <Omega\\FaultManager\\Exceptions\\InvalidCompilePath>
		:Throws: \\Omega\\FaultManager\\Exceptions\\NamespaceError <Omega\\FaultManager\\Exceptions\\NamespaceError>
		:Throws: \\Hoa\\Event\\Exception <Hoa\\Event\\Exception>
		:Throws: \\ReflectionException <ReflectionException>
		:Throws: \\Throwable <Throwable>
		:Throws: \\Omega\\FaultManager\\Abstracts\\FaultManagerException <Omega\\FaultManager\\Abstracts\\FaultManagerException>
		:Throws: \\Omega\\FaultManager\\Exceptions\\BaseError <Omega\\FaultManager\\Exceptions\\BaseError>
		:Throws: \\Omega\\FaultManager\\Exceptions\\ExceptionNameIsEmpty <Omega\\FaultManager\\Exceptions\\ExceptionNameIsEmpty>
		:Throws: \\Omega\\FaultManager\\Exceptions\\InvalidCompilePath <Omega\\FaultManager\\Exceptions\\InvalidCompilePath>
		:Throws: \\Omega\\FaultManager\\Exceptions\\NamespaceError <Omega\\FaultManager\\Exceptions\\NamespaceError>
		:Throws: \\Hoa\\Event\\Exception <Hoa\\Event\\Exception>
		:Throws: \\ReflectionException <ReflectionException>
		:Throws: \\Throwable <Throwable>
		:Throws: \\Omega\\FaultManager\\Abstracts\\FaultManagerException <Omega\\FaultManager\\Abstracts\\FaultManagerException>
		:Throws: \\Omega\\FaultManager\\Exceptions\\BaseError <Omega\\FaultManager\\Exceptions\\BaseError>
		:Throws: \\Omega\\FaultManager\\Exceptions\\ExceptionNameIsEmpty <Omega\\FaultManager\\Exceptions\\ExceptionNameIsEmpty>
		:Throws: \\Omega\\FaultManager\\Exceptions\\InvalidCompilePath <Omega\\FaultManager\\Exceptions\\InvalidCompilePath>
		:Throws: \\Omega\\FaultManager\\Exceptions\\NamespaceError <Omega\\FaultManager\\Exceptions\\NamespaceError>
		:Throws: \\Hoa\\Event\\Exception <Hoa\\Event\\Exception>
		:Throws: \\ReflectionException <ReflectionException>
		:Throws: \\Throwable <Throwable>
		:Throws: \\Omega\\FaultManager\\Abstracts\\FaultManagerException <Omega\\FaultManager\\Abstracts\\FaultManagerException>
		:Throws: \\Omega\\FaultManager\\Exceptions\\BaseError <Omega\\FaultManager\\Exceptions\\BaseError>
		:Throws: \\Omega\\FaultManager\\Exceptions\\ExceptionNameIsEmpty <Omega\\FaultManager\\Exceptions\\ExceptionNameIsEmpty>
		:Throws: \\Omega\\FaultManager\\Exceptions\\InvalidCompilePath <Omega\\FaultManager\\Exceptions\\InvalidCompilePath>
		:Throws: \\Omega\\FaultManager\\Exceptions\\NamespaceError <Omega\\FaultManager\\Exceptions\\NamespaceError>
		:Throws: \\Hoa\\Event\\Exception <Hoa\\Event\\Exception>
		:Throws: \\ReflectionException <ReflectionException>
		:Throws: \\Throwable <Throwable>
		:Throws: \\Omega\\FaultManager\\Abstracts\\FaultManagerException <Omega\\FaultManager\\Abstracts\\FaultManagerException>
		:Throws: \\Omega\\FaultManager\\Exceptions\\BaseError <Omega\\FaultManager\\Exceptions\\BaseError>
		:Throws: \\Omega\\FaultManager\\Exceptions\\ExceptionNameIsEmpty <Omega\\FaultManager\\Exceptions\\ExceptionNameIsEmpty>
		:Throws: \\Omega\\FaultManager\\Exceptions\\InvalidCompilePath <Omega\\FaultManager\\Exceptions\\InvalidCompilePath>
		:Throws: \\Omega\\FaultManager\\Exceptions\\NamespaceError <Omega\\FaultManager\\Exceptions\\NamespaceError>
		:Throws: \\Hoa\\Event\\Exception <Hoa\\Event\\Exception>
		:Throws: \\ReflectionException <ReflectionException>
		:Throws: \\Throwable <Throwable>
		:Throws: \\Omega\\FaultManager\\Abstracts\\FaultManagerException <Omega\\FaultManager\\Abstracts\\FaultManagerException>
		:Throws: \\Omega\\FaultManager\\Exceptions\\BaseError <Omega\\FaultManager\\Exceptions\\BaseError>
		:Throws: \\Omega\\FaultManager\\Exceptions\\ExceptionNameIsEmpty <Omega\\FaultManager\\Exceptions\\ExceptionNameIsEmpty>
		:Throws: \\Omega\\FaultManager\\Exceptions\\InvalidCompilePath <Omega\\FaultManager\\Exceptions\\InvalidCompilePath>
		:Throws: \\Omega\\FaultManager\\Exceptions\\NamespaceError <Omega\\FaultManager\\Exceptions\\NamespaceError>
		:Throws: \\Hoa\\Event\\Exception <Hoa\\Event\\Exception>
		:Throws: \\ReflectionException <ReflectionException>



.. rst-class:: public static

	.. php:method:: public static throw( $exceptionClass, $message="", $code=0, $previous=null, $arguments=\[\])


		:Parameters:
			* **$exceptionClass** (string)
			* **$message** (string)
			* **$code** (int)
			* **$previous** (null | \\Throwable <Throwable>)
			* **$arguments** (array)


		:Throws: \\Throwable <Throwable>
		:Throws: \\Omega\\FaultManager\\Abstracts\\FaultManagerException <Omega\\FaultManager\\Abstracts\\FaultManagerException>
		:Throws: \\Omega\\FaultManager\\Exceptions\\BaseError <Omega\\FaultManager\\Exceptions\\BaseError>
		:Throws: \\Omega\\FaultManager\\Exceptions\\ExceptionNameIsEmpty <Omega\\FaultManager\\Exceptions\\ExceptionNameIsEmpty>
		:Throws: \\Omega\\FaultManager\\Exceptions\\InvalidCompilePath <Omega\\FaultManager\\Exceptions\\InvalidCompilePath>
		:Throws: \\Omega\\FaultManager\\Exceptions\\NamespaceError <Omega\\FaultManager\\Exceptions\\NamespaceError>
		:Throws: \\Hoa\\Event\\Exception <Hoa\\Event\\Exception>
		:Throws: \\ReflectionException <ReflectionException>
		:Throws: \\Throwable <Throwable>
		:Throws: \\Omega\\FaultManager\\Abstracts\\FaultManagerException <Omega\\FaultManager\\Abstracts\\FaultManagerException>
		:Throws: \\Omega\\FaultManager\\Exceptions\\BaseError <Omega\\FaultManager\\Exceptions\\BaseError>
		:Throws: \\Omega\\FaultManager\\Exceptions\\ExceptionNameIsEmpty <Omega\\FaultManager\\Exceptions\\ExceptionNameIsEmpty>
		:Throws: \\Omega\\FaultManager\\Exceptions\\InvalidCompilePath <Omega\\FaultManager\\Exceptions\\InvalidCompilePath>
		:Throws: \\Omega\\FaultManager\\Exceptions\\NamespaceError <Omega\\FaultManager\\Exceptions\\NamespaceError>
		:Throws: \\Hoa\\Event\\Exception <Hoa\\Event\\Exception>
		:Throws: \\ReflectionException <ReflectionException>
		:Throws: \\Throwable <Throwable>
		:Throws: \\Omega\\FaultManager\\Abstracts\\FaultManagerException <Omega\\FaultManager\\Abstracts\\FaultManagerException>
		:Throws: \\Omega\\FaultManager\\Exceptions\\BaseError <Omega\\FaultManager\\Exceptions\\BaseError>
		:Throws: \\Omega\\FaultManager\\Exceptions\\ExceptionNameIsEmpty <Omega\\FaultManager\\Exceptions\\ExceptionNameIsEmpty>
		:Throws: \\Omega\\FaultManager\\Exceptions\\InvalidCompilePath <Omega\\FaultManager\\Exceptions\\InvalidCompilePath>
		:Throws: \\Omega\\FaultManager\\Exceptions\\NamespaceError <Omega\\FaultManager\\Exceptions\\NamespaceError>
		:Throws: \\Hoa\\Event\\Exception <Hoa\\Event\\Exception>
		:Throws: \\ReflectionException <ReflectionException>
		:Throws: \\Throwable <Throwable>
		:Throws: \\Omega\\FaultManager\\Abstracts\\FaultManagerException <Omega\\FaultManager\\Abstracts\\FaultManagerException>
		:Throws: \\Omega\\FaultManager\\Exceptions\\BaseError <Omega\\FaultManager\\Exceptions\\BaseError>
		:Throws: \\Omega\\FaultManager\\Exceptions\\ExceptionNameIsEmpty <Omega\\FaultManager\\Exceptions\\ExceptionNameIsEmpty>
		:Throws: \\Omega\\FaultManager\\Exceptions\\InvalidCompilePath <Omega\\FaultManager\\Exceptions\\InvalidCompilePath>
		:Throws: \\Omega\\FaultManager\\Exceptions\\NamespaceError <Omega\\FaultManager\\Exceptions\\NamespaceError>
		:Throws: \\Hoa\\Event\\Exception <Hoa\\Event\\Exception>
		:Throws: \\ReflectionException <ReflectionException>
		:Throws: \\Throwable <Throwable>
		:Throws: \\Omega\\FaultManager\\Abstracts\\FaultManagerException <Omega\\FaultManager\\Abstracts\\FaultManagerException>
		:Throws: \\Omega\\FaultManager\\Exceptions\\BaseError <Omega\\FaultManager\\Exceptions\\BaseError>
		:Throws: \\Omega\\FaultManager\\Exceptions\\ExceptionNameIsEmpty <Omega\\FaultManager\\Exceptions\\ExceptionNameIsEmpty>
		:Throws: \\Omega\\FaultManager\\Exceptions\\InvalidCompilePath <Omega\\FaultManager\\Exceptions\\InvalidCompilePath>
		:Throws: \\Omega\\FaultManager\\Exceptions\\NamespaceError <Omega\\FaultManager\\Exceptions\\NamespaceError>
		:Throws: \\Hoa\\Event\\Exception <Hoa\\Event\\Exception>
		:Throws: \\ReflectionException <ReflectionException>
		:Throws: \\Throwable <Throwable>
		:Throws: \\Omega\\FaultManager\\Abstracts\\FaultManagerException <Omega\\FaultManager\\Abstracts\\FaultManagerException>
		:Throws: \\Omega\\FaultManager\\Exceptions\\BaseError <Omega\\FaultManager\\Exceptions\\BaseError>
		:Throws: \\Omega\\FaultManager\\Exceptions\\ExceptionNameIsEmpty <Omega\\FaultManager\\Exceptions\\ExceptionNameIsEmpty>
		:Throws: \\Omega\\FaultManager\\Exceptions\\InvalidCompilePath <Omega\\FaultManager\\Exceptions\\InvalidCompilePath>
		:Throws: \\Omega\\FaultManager\\Exceptions\\NamespaceError <Omega\\FaultManager\\Exceptions\\NamespaceError>
		:Throws: \\Hoa\\Event\\Exception <Hoa\\Event\\Exception>
		:Throws: \\ReflectionException <ReflectionException>
		:Throws: \\Throwable <Throwable>
		:Throws: \\Omega\\FaultManager\\Abstracts\\FaultManagerException <Omega\\FaultManager\\Abstracts\\FaultManagerException>
		:Throws: \\Omega\\FaultManager\\Exceptions\\BaseError <Omega\\FaultManager\\Exceptions\\BaseError>
		:Throws: \\Omega\\FaultManager\\Exceptions\\ExceptionNameIsEmpty <Omega\\FaultManager\\Exceptions\\ExceptionNameIsEmpty>
		:Throws: \\Omega\\FaultManager\\Exceptions\\InvalidCompilePath <Omega\\FaultManager\\Exceptions\\InvalidCompilePath>
		:Throws: \\Omega\\FaultManager\\Exceptions\\NamespaceError <Omega\\FaultManager\\Exceptions\\NamespaceError>
		:Throws: \\Hoa\\Event\\Exception <Hoa\\Event\\Exception>
		:Throws: \\ReflectionException <ReflectionException>
		:Throws: \\Throwable <Throwable>
		:Throws: \\Omega\\FaultManager\\Abstracts\\FaultManagerException <Omega\\FaultManager\\Abstracts\\FaultManagerException>
		:Throws: \\Omega\\FaultManager\\Exceptions\\BaseError <Omega\\FaultManager\\Exceptions\\BaseError>
		:Throws: \\Omega\\FaultManager\\Exceptions\\ExceptionNameIsEmpty <Omega\\FaultManager\\Exceptions\\ExceptionNameIsEmpty>
		:Throws: \\Omega\\FaultManager\\Exceptions\\InvalidCompilePath <Omega\\FaultManager\\Exceptions\\InvalidCompilePath>
		:Throws: \\Omega\\FaultManager\\Exceptions\\NamespaceError <Omega\\FaultManager\\Exceptions\\NamespaceError>
		:Throws: \\Hoa\\Event\\Exception <Hoa\\Event\\Exception>
		:Throws: \\ReflectionException <ReflectionException>
		:Throws: \\Throwable <Throwable>
		:Throws: \\Omega\\FaultManager\\Abstracts\\FaultManagerException <Omega\\FaultManager\\Abstracts\\FaultManagerException>
		:Throws: \\Omega\\FaultManager\\Exceptions\\BaseError <Omega\\FaultManager\\Exceptions\\BaseError>
		:Throws: \\Omega\\FaultManager\\Exceptions\\ExceptionNameIsEmpty <Omega\\FaultManager\\Exceptions\\ExceptionNameIsEmpty>
		:Throws: \\Omega\\FaultManager\\Exceptions\\InvalidCompilePath <Omega\\FaultManager\\Exceptions\\InvalidCompilePath>
		:Throws: \\Omega\\FaultManager\\Exceptions\\NamespaceError <Omega\\FaultManager\\Exceptions\\NamespaceError>
		:Throws: \\Hoa\\Event\\Exception <Hoa\\Event\\Exception>
		:Throws: \\ReflectionException <ReflectionException>



.. rst-class:: public static

	.. php:method:: public static registerHandler( $eventId, $handler, $override=false)


		:Parameters:
			* **$eventId** (string)
			* **$handler** (Omega\\FaultManager\\Interfaces\\FaultManagerEventHandler <Omega\\FaultManager\\Interfaces\\FaultManagerEventHandler>)
			* **$override** (bool)


		:Throws: \\Omega\\FaultManager\\Exceptions\\EventHandlerExistsException <Omega\\FaultManager\\Exceptions\\EventHandlerExistsException>



.. rst-class:: public static

	.. php:method:: public static enableEventStream()

		.. rst-class:: phpdoc-description

			| Enables Event Stream for Exceptions






.. rst-class:: public static

	.. php:method:: public static disableEventStream()

		.. rst-class:: phpdoc-description

			| Disables Event Stream for Exceptions






.. rst-class:: public static

	.. php:method:: public static isEventStreamEnabled()

		.. rst-class:: phpdoc-description

			| Returns try if enabled false if not



		:Returns: bool



.. rst-class:: public static

	.. php:method:: public static setCompilePath( $path)

		.. rst-class:: phpdoc-description

			| Set compile path



		:Parameters:
			* **$path** (string)


		:Throws: \\Omega\\FaultManager\\Exceptions\\InvalidCompilePath <Omega\\FaultManager\\Exceptions\\InvalidCompilePath>



.. rst-class:: public static

	.. php:method:: public static compilePath()

		.. rst-class:: phpdoc-description

			| Get compile path



		:Returns: string



.. rst-class:: public static

	.. php:method:: public static autoloadCompiledExceptions()

		.. rst-class:: phpdoc-description

			| Autoload compiled exceptions



		:Throws: \\Omega\\FaultManager\\Exceptions\\InvalidCompilePath <Omega\\FaultManager\\Exceptions\\InvalidCompilePath>



