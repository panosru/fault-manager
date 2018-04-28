.. rst-class:: phpdoctorst

.. role:: php(code)
	:language: php


FaultManagerException
=====================


.. php:namespace:: Omega\FaultManager\Abstracts

.. rst-class::  abstract

.. php:class:: FaultManagerException


	:Parent:
		:php:class:`Hoa\\Exception\\Exception`
	
	:Implements:
		:php:interface:`Omega\\FaultManager\\Interfaces\\FaultManagerException` 
	
	:Used traits:
		:php:trait:`Omega\\FaultManager\\Traits\\FaultMutator` 
	

Properties
----------

.. php:attr:: protected static code

	:Type: int 


.. php:attr:: protected static message

	:Type: string 


.. php:attr:: protected static arguments

	:Type: array 


Methods
-------

.. rst-class:: public

	.. php:method:: public __construct( $message=null, $code=null, $previous=null, $arguments=null)
	
		.. rst-class:: phpdoc-description
		
			| FaultManagerException constructor\.
			
		
		
		:Parameters:
			* **$message** (null | string)  
			* **$code** (int | null)  
			* **$previous** (null | :any:`\\Throwable <Throwable>`)  
			* **$arguments** (array | null)  

		
	
	

.. rst-class:: public

	.. php:method:: public send()
	
		.. rst-class:: phpdoc-description
		
			| Override parent::send\(\)
			
			| Sends the exception on \`hoa://Event/Exception\`\.
			
		
		
	
	

