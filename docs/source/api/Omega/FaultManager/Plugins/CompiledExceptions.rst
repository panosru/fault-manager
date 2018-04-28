.. rst-class:: phpdoctorst

.. role:: php(code)
	:language: php


CompiledExceptions
==================


.. php:namespace:: Omega\FaultManager\Plugins

.. php:class:: CompiledExceptions


	:Implements:
		:php:interface:`League\\Flysystem\\PluginInterface` 
	

Constants
---------

.. php:const:: RETURN_IN_ARRAY = true

	:Type: bool 


.. php:const:: RETURN_NOT_IN_ARRAY = false

	:Type: bool 


Properties
----------

.. php:attr:: protected static filesystem

	:Type: :any:`\\League\\Flysystem\\FilesystemInterface <League\\Flysystem\\FilesystemInterface>` 


Methods
-------

.. rst-class:: public

	.. php:method:: public setFilesystem( $filesystem)
	
		
		:Parameters:
			* **$filesystem** (:any:`League\\Flysystem\\FilesystemInterface <League\\Flysystem\\FilesystemInterface>`)  

		
	
	

.. rst-class:: public

	.. php:method:: public getMethod()
	
		
		:Returns: string 
	
	

.. rst-class:: public

	.. php:method:: public handle( $filter=null, $whitelist=true)
	
		
		:Parameters:
			* **$filter** (array | null)  
			* **$whitelist** (bool)  

		
		:Returns: :any:`\\Generator <Generator>` 
	
	

