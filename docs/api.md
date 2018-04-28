## Table of contents

- [\Omega\FaultManager\Fault](#class-omegafaultmanagerfault)
- [\Omega\FaultManager\Abstracts\FaultManagerException (abstract)](#class-omegafaultmanagerabstractsfaultmanagerexception-abstract)
- [\Omega\FaultManager\Exceptions\EmptyErrorNameException](#class-omegafaultmanagerexceptionsemptyerrornameexception)
- [\Omega\FaultManager\Exceptions\FaultManagerException](#class-omegafaultmanagerexceptionsfaultmanagerexception)
- [\Omega\FaultManager\Exceptions\InvalidCompilePathException](#class-omegafaultmanagerexceptionsinvalidcompilepathexception)
- [\Omega\FaultManager\Exceptions\EventHandlerExistsException](#class-omegafaultmanagerexceptionseventhandlerexistsexception)
- [\Omega\FaultManager\Exceptions\NamespacedErrorException](#class-omegafaultmanagerexceptionsnamespacederrorexception)
- [\Omega\FaultManager\Exceptions\IncompatibleErrorNameException](#class-omegafaultmanagerexceptionsincompatibleerrornameexception)
- [\Omega\FaultManager\Interfaces\FaultManagerException (interface)](#interface-omegafaultmanagerinterfacesfaultmanagerexception)
- [\Omega\FaultManager\Interfaces\FaultManager (interface)](#interface-omegafaultmanagerinterfacesfaultmanager)
- [\Omega\FaultManager\Interfaces\FaultManagerEventHandler (interface)](#interface-omegafaultmanagerinterfacesfaultmanagereventhandler)
- [\Omega\FaultManager\Plugins\CompiledExceptions](#class-omegafaultmanagerpluginscompiledexceptions)
- [\Omega\FaultManager\Plugins\RouteExceptions](#class-omegafaultmanagerpluginsrouteexceptions)

<hr />

### Class: \Omega\FaultManager\Fault

> Class Fault

| Visibility | Function |
|:-----------|:---------|
| public static | <strong>autoloadCompiledExceptions()</strong> : <em>void</em> |
| public static | <strong>disableEventStream()</strong> : <em>void</em> |
| public static | <strong>enableEventStream()</strong> : <em>void</em> |
| public static | <strong>exception(</strong><em>\string</em> <strong>$exceptionClass</strong>, <em>\string</em> <strong>$message=`''`</strong>, <em>\integer</em> <strong>$code</strong>, <em>\Throwable</em> <strong>$previous=null</strong>, <em>array</em> <strong>$arguments=array()</strong>)</strong> : <em>void</em> |
| public static | <strong>getCompilePath()</strong> : <em>mixed</em> |
| public static | <strong>isEventStreamEnabled()</strong> : <em>bool</em> |
| public static | <strong>registerHandler(</strong><em>\string</em> <strong>$eventId</strong>, <em>[\Omega\FaultManager\Interfaces\FaultManagerEventHandler](#interface-omegafaultmanagerinterfacesfaultmanagereventhandler)</em> <strong>$handler</strong>, <em>\boolean</em> <strong>$override=false</strong>)</strong> : <em>void</em> |
| public static | <strong>setCompilePath(</strong><em>\string</em> <strong>$path</strong>)</strong> : <em>void</em> |
| public static | <strong>throw(</strong><em>\string</em> <strong>$exceptionClass</strong>, <em>\string</em> <strong>$message=`''`</strong>, <em>\integer</em> <strong>$code</strong>, <em>\Throwable</em> <strong>$previous=null</strong>, <em>array</em> <strong>$arguments=array()</strong>)</strong> : <em>void</em> |
| public static | <strong>unregisterHandler(</strong><em>\string</em> <strong>$eventId</strong>)</strong> : <em>void</em> |
| protected static | <strong>mutate(</strong><em>\Throwable</em> <strong>$exception</strong>)</strong> : <em>void</em> |
| protected static | <strong>registerEvent(</strong><em>\Hoa\Event\Source</em> <strong>$router</strong>, <em>\Throwable</em> <strong>$exception</strong>)</strong> : <em>void</em> |

*This class implements [\Omega\FaultManager\Interfaces\FaultManager](#interface-omegafaultmanagerinterfacesfaultmanager)*

<hr />

### Class: \Omega\FaultManager\Abstracts\FaultManagerException (abstract)

| Visibility | Function |
|:-----------|:---------|
| public | <strong>__construct(</strong><em>\string</em> <strong>$message=null</strong>, <em>\integer</em> <strong>$code=null</strong>, <em>\Throwable</em> <strong>$previous=null</strong>, <em>array/null/array</em> <strong>$arguments=null</strong>)</strong> : <em>void</em><br /><em>FaultManagerException constructor.</em> |
| public | <strong>send()</strong> : <em>void</em><br /><em>Override parent::send() Sends the exception on `hoa://Event/Exception`.</em> |
| protected static | <strong>mutate(</strong><em>\Throwable</em> <strong>$exception</strong>)</strong> : <em>void</em> |

*This class extends \Hoa\Exception\Exception*

*This class implements \Hoa\Event\Source, \Throwable, [\Omega\FaultManager\Interfaces\FaultManagerException](#interface-omegafaultmanagerinterfacesfaultmanagerexception)*

<hr />

### Class: \Omega\FaultManager\Exceptions\EmptyErrorNameException

> Class EmptyErrorNameException

| Visibility | Function |
|:-----------|:---------|

*This class extends [\Omega\FaultManager\Abstracts\FaultManagerException](#class-omegafaultmanagerabstractsfaultmanagerexception-abstract)*

*This class implements [\Omega\FaultManager\Interfaces\FaultManagerException](#interface-omegafaultmanagerinterfacesfaultmanagerexception), \Throwable, \Hoa\Event\Source*

<hr />

### Class: \Omega\FaultManager\Exceptions\FaultManagerException

> Class FaultManagerException

| Visibility | Function |
|:-----------|:---------|

*This class extends [\Omega\FaultManager\Abstracts\FaultManagerException](#class-omegafaultmanagerabstractsfaultmanagerexception-abstract)*

*This class implements [\Omega\FaultManager\Interfaces\FaultManagerException](#interface-omegafaultmanagerinterfacesfaultmanagerexception), \Throwable, \Hoa\Event\Source*

<hr />

### Class: \Omega\FaultManager\Exceptions\InvalidCompilePathException

> Class InvalidCompilePathException

| Visibility | Function |
|:-----------|:---------|
| public | <strong>__construct(</strong><em>\string</em> <strong>$path</strong>)</strong> : <em>void</em><br /><em>InvalidCompilePathException constructor.</em> |

*This class extends [\Omega\FaultManager\Abstracts\FaultManagerException](#class-omegafaultmanagerabstractsfaultmanagerexception-abstract)*

*This class implements [\Omega\FaultManager\Interfaces\FaultManagerException](#interface-omegafaultmanagerinterfacesfaultmanagerexception), \Throwable, \Hoa\Event\Source*

<hr />

### Class: \Omega\FaultManager\Exceptions\EventHandlerExistsException

> Class EventHandlerExistsException

| Visibility | Function |
|:-----------|:---------|
| public | <strong>__construct(</strong><em>\string</em> <strong>$eventHandler</strong>)</strong> : <em>void</em><br /><em>InvalidCompilePathException constructor.</em> |

*This class extends [\Omega\FaultManager\Abstracts\FaultManagerException](#class-omegafaultmanagerabstractsfaultmanagerexception-abstract)*

*This class implements [\Omega\FaultManager\Interfaces\FaultManagerException](#interface-omegafaultmanagerinterfacesfaultmanagerexception), \Throwable, \Hoa\Event\Source*

<hr />

### Class: \Omega\FaultManager\Exceptions\NamespacedErrorException

> Class NamespacedErrorException

| Visibility | Function |
|:-----------|:---------|

*This class extends [\Omega\FaultManager\Abstracts\FaultManagerException](#class-omegafaultmanagerabstractsfaultmanagerexception-abstract)*

*This class implements [\Omega\FaultManager\Interfaces\FaultManagerException](#interface-omegafaultmanagerinterfacesfaultmanagerexception), \Throwable, \Hoa\Event\Source*

<hr />

### Class: \Omega\FaultManager\Exceptions\IncompatibleErrorNameException

> Class IncompatibleErrorNameException

| Visibility | Function |
|:-----------|:---------|
| public | <strong>__construct(</strong><em>\string</em> <strong>$class</strong>)</strong> : <em>void</em><br /><em>IncompatibleErrorNameException constructor.</em> |

*This class extends [\Omega\FaultManager\Abstracts\FaultManagerException](#class-omegafaultmanagerabstractsfaultmanagerexception-abstract)*

*This class implements [\Omega\FaultManager\Interfaces\FaultManagerException](#interface-omegafaultmanagerinterfacesfaultmanagerexception), \Throwable, \Hoa\Event\Source*

<hr />

### Interface: \Omega\FaultManager\Interfaces\FaultManagerException

| Visibility | Function |
|:-----------|:---------|

<hr />

### Interface: \Omega\FaultManager\Interfaces\FaultManager

| Visibility | Function |
|:-----------|:---------|
| public static | <strong>autoloadCompiledExceptions()</strong> : <em>void</em><br /><em>Autoload compiled exceptions</em> |
| public static | <strong>disableEventStream()</strong> : <em>void</em><br /><em>Disables Event Stream for Exceptions</em> |
| public static | <strong>enableEventStream()</strong> : <em>void</em><br /><em>Enables Event Stream for Exceptions</em> |
| public static | <strong>exception(</strong><em>\string</em> <strong>$exceptionClass</strong>, <em>\string</em> <strong>$message=`''`</strong>, <em>int/\integer</em> <strong>$code</strong>, <em>\Throwable</em> <strong>$previous=null</strong>, <em>array</em> <strong>$arguments=array()</strong>)</strong> : <em>\Throwable</em> |
| public static | <strong>getCompilePath()</strong> : <em>string</em><br /><em>Get compile path</em> |
| public static | <strong>isEventStreamEnabled()</strong> : <em>bool</em><br /><em>Returns try if enabled false if not</em> |
| public static | <strong>registerHandler(</strong><em>\string</em> <strong>$eventId</strong>, <em>[\Omega\FaultManager\Interfaces\FaultManagerEventHandler](#interface-omegafaultmanagerinterfacesfaultmanagereventhandler)</em> <strong>$handler</strong>, <em>\boolean</em> <strong>$override=false</strong>)</strong> : <em>void</em> |
| public static | <strong>setCompilePath(</strong><em>\string</em> <strong>$path</strong>)</strong> : <em>void</em><br /><em>Set compile path</em> |
| public static | <strong>throw(</strong><em>\string</em> <strong>$exceptionClass</strong>, <em>\string</em> <strong>$message=`''`</strong>, <em>int/\integer</em> <strong>$code</strong>, <em>\Throwable</em> <strong>$previous=null</strong>, <em>array</em> <strong>$arguments=array()</strong>)</strong> : <em>void</em> |

<hr />

### Interface: \Omega\FaultManager\Interfaces\FaultManagerEventHandler

| Visibility | Function |
|:-----------|:---------|
| public | <strong>__invoke(</strong><em>\Throwable</em> <strong>$exception</strong>)</strong> : <em>void</em> |

<hr />

### Class: \Omega\FaultManager\Plugins\CompiledExceptions

| Visibility | Function |
|:-----------|:---------|
| public | <strong>getMethod()</strong> : <em>string</em> |
| public | <strong>handle(</strong><em>array/null/array</em> <strong>$filter=null</strong>, <em>\boolean</em> <strong>$whitelist=true</strong>)</strong> : <em>[\Generator](http://php.net/manual/en/class.generator.php)</em> |
| public | <strong>setFilesystem(</strong><em>\Omega\FaultManager\Plugins\IFilesystemInterface/\League\Flysystem\FilesystemInterface</em> <strong>$filesystem</strong>)</strong> : <em>void</em> |

*This class implements \League\Flysystem\PluginInterface*

<hr />

### Class: \Omega\FaultManager\Plugins\RouteExceptions

> Class RouteExceptions

| Visibility | Function |
|:-----------|:---------|

*This class implements \Hoa\Event\Source*

