.. rst-class:: FaultManagerdoc

.. role:: php(code)
	:language: php


Fault
=====


.. php:namespace:: Omega\FaultManager

.. php:class:: Fault


	.. rst-class:: phpdoc-description
	
		| Class Fault
		
	
	:Implements:
		:php:interface:`Omega\\FaultManager\\Interfaces\\FaultManager` 
	
	:Used traits:
		:php:trait:`Omega\\FaultManager\\Traits\\FaultGenerator` :php:trait:`Omega\\FaultManager\\Traits\\FaultEventStream` :php:trait:`Omega\\FaultManager\\Traits\\FaultMutator` 
	

Methods
-------

.. rst-class:: public static

	.. php:method:: public static exception( $exceptionClass, $message="", $code=0, $previous=null, $arguments=\[\])
	
		.. rst-class:: phpdoc-description
		
			| \{@inheritdoc\}
			
		
		
	
	

.. rst-class:: public static

	.. php:method:: public static throw( $exceptionClass, $message="", $code=0, $previous=null, $arguments=\[\])
	
		.. rst-class:: phpdoc-description
		
			| \{@inheritdoc\}
			
		
		
	
	

