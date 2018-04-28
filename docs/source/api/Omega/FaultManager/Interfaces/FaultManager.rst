.. rst-class:: phpdoctorst

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
			* **$previous** (null | :any:`\\Throwable <Throwable>`)  
			* **$arguments** (array)  

		
		:Returns: :any:`\\Throwable <Throwable>` 
		:Throws: :any:`\\Throwable <Throwable>` 
		:Throws: :any:`\\Omega\\FaultManager\\Abstracts\\FaultManagerException <Omega\\FaultManager\\Abstracts\\FaultManagerException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\FaultManagerException <Omega\\FaultManager\\Exceptions\\FaultManagerException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\EmptyErrorNameException <Omega\\FaultManager\\Exceptions\\EmptyErrorNameException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\IncompatibleErrorNameException <Omega\\FaultManager\\Exceptions\\IncompatibleErrorNameException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\InvalidCompilePathException <Omega\\FaultManager\\Exceptions\\InvalidCompilePathException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\NamespacedErrorException <Omega\\FaultManager\\Exceptions\\NamespacedErrorException>` 
		:Throws: :any:`\\Hoa\\Event\\Exception <Hoa\\Event\\Exception>` 
		:Throws: :any:`\\ReflectionException <ReflectionException>` 
		:Throws: :any:`\\Throwable <Throwable>` 
		:Throws: :any:`\\Omega\\FaultManager\\Abstracts\\FaultManagerException <Omega\\FaultManager\\Abstracts\\FaultManagerException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\FaultManagerException <Omega\\FaultManager\\Exceptions\\FaultManagerException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\EmptyErrorNameException <Omega\\FaultManager\\Exceptions\\EmptyErrorNameException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\IncompatibleErrorNameException <Omega\\FaultManager\\Exceptions\\IncompatibleErrorNameException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\InvalidCompilePathException <Omega\\FaultManager\\Exceptions\\InvalidCompilePathException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\NamespacedErrorException <Omega\\FaultManager\\Exceptions\\NamespacedErrorException>` 
		:Throws: :any:`\\Hoa\\Event\\Exception <Hoa\\Event\\Exception>` 
		:Throws: :any:`\\ReflectionException <ReflectionException>` 
		:Throws: :any:`\\Throwable <Throwable>` 
		:Throws: :any:`\\Omega\\FaultManager\\Abstracts\\FaultManagerException <Omega\\FaultManager\\Abstracts\\FaultManagerException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\FaultManagerException <Omega\\FaultManager\\Exceptions\\FaultManagerException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\EmptyErrorNameException <Omega\\FaultManager\\Exceptions\\EmptyErrorNameException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\IncompatibleErrorNameException <Omega\\FaultManager\\Exceptions\\IncompatibleErrorNameException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\InvalidCompilePathException <Omega\\FaultManager\\Exceptions\\InvalidCompilePathException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\NamespacedErrorException <Omega\\FaultManager\\Exceptions\\NamespacedErrorException>` 
		:Throws: :any:`\\Hoa\\Event\\Exception <Hoa\\Event\\Exception>` 
		:Throws: :any:`\\ReflectionException <ReflectionException>` 
		:Throws: :any:`\\Throwable <Throwable>` 
		:Throws: :any:`\\Omega\\FaultManager\\Abstracts\\FaultManagerException <Omega\\FaultManager\\Abstracts\\FaultManagerException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\FaultManagerException <Omega\\FaultManager\\Exceptions\\FaultManagerException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\EmptyErrorNameException <Omega\\FaultManager\\Exceptions\\EmptyErrorNameException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\IncompatibleErrorNameException <Omega\\FaultManager\\Exceptions\\IncompatibleErrorNameException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\InvalidCompilePathException <Omega\\FaultManager\\Exceptions\\InvalidCompilePathException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\NamespacedErrorException <Omega\\FaultManager\\Exceptions\\NamespacedErrorException>` 
		:Throws: :any:`\\Hoa\\Event\\Exception <Hoa\\Event\\Exception>` 
		:Throws: :any:`\\ReflectionException <ReflectionException>` 
		:Throws: :any:`\\Throwable <Throwable>` 
		:Throws: :any:`\\Omega\\FaultManager\\Abstracts\\FaultManagerException <Omega\\FaultManager\\Abstracts\\FaultManagerException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\FaultManagerException <Omega\\FaultManager\\Exceptions\\FaultManagerException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\EmptyErrorNameException <Omega\\FaultManager\\Exceptions\\EmptyErrorNameException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\IncompatibleErrorNameException <Omega\\FaultManager\\Exceptions\\IncompatibleErrorNameException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\InvalidCompilePathException <Omega\\FaultManager\\Exceptions\\InvalidCompilePathException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\NamespacedErrorException <Omega\\FaultManager\\Exceptions\\NamespacedErrorException>` 
		:Throws: :any:`\\Hoa\\Event\\Exception <Hoa\\Event\\Exception>` 
		:Throws: :any:`\\ReflectionException <ReflectionException>` 
		:Throws: :any:`\\Throwable <Throwable>` 
		:Throws: :any:`\\Omega\\FaultManager\\Abstracts\\FaultManagerException <Omega\\FaultManager\\Abstracts\\FaultManagerException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\FaultManagerException <Omega\\FaultManager\\Exceptions\\FaultManagerException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\EmptyErrorNameException <Omega\\FaultManager\\Exceptions\\EmptyErrorNameException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\IncompatibleErrorNameException <Omega\\FaultManager\\Exceptions\\IncompatibleErrorNameException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\InvalidCompilePathException <Omega\\FaultManager\\Exceptions\\InvalidCompilePathException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\NamespacedErrorException <Omega\\FaultManager\\Exceptions\\NamespacedErrorException>` 
		:Throws: :any:`\\Hoa\\Event\\Exception <Hoa\\Event\\Exception>` 
		:Throws: :any:`\\ReflectionException <ReflectionException>` 
		:Throws: :any:`\\Throwable <Throwable>` 
		:Throws: :any:`\\Omega\\FaultManager\\Abstracts\\FaultManagerException <Omega\\FaultManager\\Abstracts\\FaultManagerException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\FaultManagerException <Omega\\FaultManager\\Exceptions\\FaultManagerException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\EmptyErrorNameException <Omega\\FaultManager\\Exceptions\\EmptyErrorNameException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\IncompatibleErrorNameException <Omega\\FaultManager\\Exceptions\\IncompatibleErrorNameException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\InvalidCompilePathException <Omega\\FaultManager\\Exceptions\\InvalidCompilePathException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\NamespacedErrorException <Omega\\FaultManager\\Exceptions\\NamespacedErrorException>` 
		:Throws: :any:`\\Hoa\\Event\\Exception <Hoa\\Event\\Exception>` 
		:Throws: :any:`\\ReflectionException <ReflectionException>` 
		:Throws: :any:`\\Throwable <Throwable>` 
		:Throws: :any:`\\Omega\\FaultManager\\Abstracts\\FaultManagerException <Omega\\FaultManager\\Abstracts\\FaultManagerException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\FaultManagerException <Omega\\FaultManager\\Exceptions\\FaultManagerException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\EmptyErrorNameException <Omega\\FaultManager\\Exceptions\\EmptyErrorNameException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\IncompatibleErrorNameException <Omega\\FaultManager\\Exceptions\\IncompatibleErrorNameException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\InvalidCompilePathException <Omega\\FaultManager\\Exceptions\\InvalidCompilePathException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\NamespacedErrorException <Omega\\FaultManager\\Exceptions\\NamespacedErrorException>` 
		:Throws: :any:`\\Hoa\\Event\\Exception <Hoa\\Event\\Exception>` 
		:Throws: :any:`\\ReflectionException <ReflectionException>` 
		:Throws: :any:`\\Throwable <Throwable>` 
		:Throws: :any:`\\Omega\\FaultManager\\Abstracts\\FaultManagerException <Omega\\FaultManager\\Abstracts\\FaultManagerException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\FaultManagerException <Omega\\FaultManager\\Exceptions\\FaultManagerException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\EmptyErrorNameException <Omega\\FaultManager\\Exceptions\\EmptyErrorNameException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\IncompatibleErrorNameException <Omega\\FaultManager\\Exceptions\\IncompatibleErrorNameException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\InvalidCompilePathException <Omega\\FaultManager\\Exceptions\\InvalidCompilePathException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\NamespacedErrorException <Omega\\FaultManager\\Exceptions\\NamespacedErrorException>` 
		:Throws: :any:`\\Hoa\\Event\\Exception <Hoa\\Event\\Exception>` 
		:Throws: :any:`\\ReflectionException <ReflectionException>` 
	
	

.. rst-class:: public static

	.. php:method:: public static throw( $exceptionClass, $message="", $code=0, $previous=null, $arguments=\[\])
	
		
		:Parameters:
			* **$exceptionClass** (string)  
			* **$message** (string)  
			* **$code** (int)  
			* **$previous** (null | :any:`\\Throwable <Throwable>`)  
			* **$arguments** (array)  

		
		:Throws: :any:`\\Throwable <Throwable>` 
		:Throws: :any:`\\Omega\\FaultManager\\Abstracts\\FaultManagerException <Omega\\FaultManager\\Abstracts\\FaultManagerException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\FaultManagerException <Omega\\FaultManager\\Exceptions\\FaultManagerException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\EmptyErrorNameException <Omega\\FaultManager\\Exceptions\\EmptyErrorNameException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\IncompatibleErrorNameException <Omega\\FaultManager\\Exceptions\\IncompatibleErrorNameException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\InvalidCompilePathException <Omega\\FaultManager\\Exceptions\\InvalidCompilePathException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\NamespacedErrorException <Omega\\FaultManager\\Exceptions\\NamespacedErrorException>` 
		:Throws: :any:`\\Hoa\\Event\\Exception <Hoa\\Event\\Exception>` 
		:Throws: :any:`\\ReflectionException <ReflectionException>` 
		:Throws: :any:`\\Throwable <Throwable>` 
		:Throws: :any:`\\Omega\\FaultManager\\Abstracts\\FaultManagerException <Omega\\FaultManager\\Abstracts\\FaultManagerException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\FaultManagerException <Omega\\FaultManager\\Exceptions\\FaultManagerException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\EmptyErrorNameException <Omega\\FaultManager\\Exceptions\\EmptyErrorNameException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\IncompatibleErrorNameException <Omega\\FaultManager\\Exceptions\\IncompatibleErrorNameException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\InvalidCompilePathException <Omega\\FaultManager\\Exceptions\\InvalidCompilePathException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\NamespacedErrorException <Omega\\FaultManager\\Exceptions\\NamespacedErrorException>` 
		:Throws: :any:`\\Hoa\\Event\\Exception <Hoa\\Event\\Exception>` 
		:Throws: :any:`\\ReflectionException <ReflectionException>` 
		:Throws: :any:`\\Throwable <Throwable>` 
		:Throws: :any:`\\Omega\\FaultManager\\Abstracts\\FaultManagerException <Omega\\FaultManager\\Abstracts\\FaultManagerException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\FaultManagerException <Omega\\FaultManager\\Exceptions\\FaultManagerException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\EmptyErrorNameException <Omega\\FaultManager\\Exceptions\\EmptyErrorNameException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\IncompatibleErrorNameException <Omega\\FaultManager\\Exceptions\\IncompatibleErrorNameException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\InvalidCompilePathException <Omega\\FaultManager\\Exceptions\\InvalidCompilePathException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\NamespacedErrorException <Omega\\FaultManager\\Exceptions\\NamespacedErrorException>` 
		:Throws: :any:`\\Hoa\\Event\\Exception <Hoa\\Event\\Exception>` 
		:Throws: :any:`\\ReflectionException <ReflectionException>` 
		:Throws: :any:`\\Throwable <Throwable>` 
		:Throws: :any:`\\Omega\\FaultManager\\Abstracts\\FaultManagerException <Omega\\FaultManager\\Abstracts\\FaultManagerException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\FaultManagerException <Omega\\FaultManager\\Exceptions\\FaultManagerException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\EmptyErrorNameException <Omega\\FaultManager\\Exceptions\\EmptyErrorNameException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\IncompatibleErrorNameException <Omega\\FaultManager\\Exceptions\\IncompatibleErrorNameException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\InvalidCompilePathException <Omega\\FaultManager\\Exceptions\\InvalidCompilePathException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\NamespacedErrorException <Omega\\FaultManager\\Exceptions\\NamespacedErrorException>` 
		:Throws: :any:`\\Hoa\\Event\\Exception <Hoa\\Event\\Exception>` 
		:Throws: :any:`\\ReflectionException <ReflectionException>` 
		:Throws: :any:`\\Throwable <Throwable>` 
		:Throws: :any:`\\Omega\\FaultManager\\Abstracts\\FaultManagerException <Omega\\FaultManager\\Abstracts\\FaultManagerException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\FaultManagerException <Omega\\FaultManager\\Exceptions\\FaultManagerException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\EmptyErrorNameException <Omega\\FaultManager\\Exceptions\\EmptyErrorNameException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\IncompatibleErrorNameException <Omega\\FaultManager\\Exceptions\\IncompatibleErrorNameException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\InvalidCompilePathException <Omega\\FaultManager\\Exceptions\\InvalidCompilePathException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\NamespacedErrorException <Omega\\FaultManager\\Exceptions\\NamespacedErrorException>` 
		:Throws: :any:`\\Hoa\\Event\\Exception <Hoa\\Event\\Exception>` 
		:Throws: :any:`\\ReflectionException <ReflectionException>` 
		:Throws: :any:`\\Throwable <Throwable>` 
		:Throws: :any:`\\Omega\\FaultManager\\Abstracts\\FaultManagerException <Omega\\FaultManager\\Abstracts\\FaultManagerException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\FaultManagerException <Omega\\FaultManager\\Exceptions\\FaultManagerException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\EmptyErrorNameException <Omega\\FaultManager\\Exceptions\\EmptyErrorNameException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\IncompatibleErrorNameException <Omega\\FaultManager\\Exceptions\\IncompatibleErrorNameException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\InvalidCompilePathException <Omega\\FaultManager\\Exceptions\\InvalidCompilePathException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\NamespacedErrorException <Omega\\FaultManager\\Exceptions\\NamespacedErrorException>` 
		:Throws: :any:`\\Hoa\\Event\\Exception <Hoa\\Event\\Exception>` 
		:Throws: :any:`\\ReflectionException <ReflectionException>` 
		:Throws: :any:`\\Throwable <Throwable>` 
		:Throws: :any:`\\Omega\\FaultManager\\Abstracts\\FaultManagerException <Omega\\FaultManager\\Abstracts\\FaultManagerException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\FaultManagerException <Omega\\FaultManager\\Exceptions\\FaultManagerException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\EmptyErrorNameException <Omega\\FaultManager\\Exceptions\\EmptyErrorNameException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\IncompatibleErrorNameException <Omega\\FaultManager\\Exceptions\\IncompatibleErrorNameException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\InvalidCompilePathException <Omega\\FaultManager\\Exceptions\\InvalidCompilePathException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\NamespacedErrorException <Omega\\FaultManager\\Exceptions\\NamespacedErrorException>` 
		:Throws: :any:`\\Hoa\\Event\\Exception <Hoa\\Event\\Exception>` 
		:Throws: :any:`\\ReflectionException <ReflectionException>` 
		:Throws: :any:`\\Throwable <Throwable>` 
		:Throws: :any:`\\Omega\\FaultManager\\Abstracts\\FaultManagerException <Omega\\FaultManager\\Abstracts\\FaultManagerException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\FaultManagerException <Omega\\FaultManager\\Exceptions\\FaultManagerException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\EmptyErrorNameException <Omega\\FaultManager\\Exceptions\\EmptyErrorNameException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\IncompatibleErrorNameException <Omega\\FaultManager\\Exceptions\\IncompatibleErrorNameException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\InvalidCompilePathException <Omega\\FaultManager\\Exceptions\\InvalidCompilePathException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\NamespacedErrorException <Omega\\FaultManager\\Exceptions\\NamespacedErrorException>` 
		:Throws: :any:`\\Hoa\\Event\\Exception <Hoa\\Event\\Exception>` 
		:Throws: :any:`\\ReflectionException <ReflectionException>` 
		:Throws: :any:`\\Throwable <Throwable>` 
		:Throws: :any:`\\Omega\\FaultManager\\Abstracts\\FaultManagerException <Omega\\FaultManager\\Abstracts\\FaultManagerException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\FaultManagerException <Omega\\FaultManager\\Exceptions\\FaultManagerException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\EmptyErrorNameException <Omega\\FaultManager\\Exceptions\\EmptyErrorNameException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\IncompatibleErrorNameException <Omega\\FaultManager\\Exceptions\\IncompatibleErrorNameException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\InvalidCompilePathException <Omega\\FaultManager\\Exceptions\\InvalidCompilePathException>` 
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\NamespacedErrorException <Omega\\FaultManager\\Exceptions\\NamespacedErrorException>` 
		:Throws: :any:`\\Hoa\\Event\\Exception <Hoa\\Event\\Exception>` 
		:Throws: :any:`\\ReflectionException <ReflectionException>` 
	
	

.. rst-class:: public static

	.. php:method:: public static registerHandler( $eventId, $handler, $override=false)
	
		
		:Parameters:
			* **$eventId** (string)  
			* **$handler** (:any:`Omega\\FaultManager\\Interfaces\\FaultManagerEventHandler <Omega\\FaultManager\\Interfaces\\FaultManagerEventHandler>`)  
			* **$override** (bool)  

		
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\EventHandlerExistsException <Omega\\FaultManager\\Exceptions\\EventHandlerExistsException>` 
	
	

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

		
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\InvalidCompilePathException <Omega\\FaultManager\\Exceptions\\InvalidCompilePathException>` 
	
	

.. rst-class:: public static

	.. php:method:: public static getCompilePath()
	
		.. rst-class:: phpdoc-description
		
			| Get compile path
			
		
		
		:Returns: string 
	
	

.. rst-class:: public static

	.. php:method:: public static autoloadCompiledExceptions()
	
		.. rst-class:: phpdoc-description
		
			| Autoload compiled exceptions
			
		
		
		:Throws: :any:`\\Omega\\FaultManager\\Exceptions\\InvalidCompilePathException <Omega\\FaultManager\\Exceptions\\InvalidCompilePathException>` 
	
	

