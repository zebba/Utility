Utility
=======

Installation
------------
   
Modify your composer.json to add the ZebbaFilterBundle:

```json
{
    "require" : {
        "zebba/Utilit<" : "1.*"
    }
}    
```

Usage
-----

### ClassUtility

``` php
<?php

$method = ClassUtility::generateMethodName(ClassUtility::ACCESS_GET, 'foo'); // getFoo
$method = ClassUtility::generateMethodName(ClassUtility::ACCESS_SET, 'foo'); // SetFoo

$method = ClassUtility::generateMethodName(ClassUtility::ACCESS_GET, 'foo_bar'); // getFooBar
$method = ClassUtility::generateMethodName(ClassUtility::ACCESS_GET, 'foo bar'); // getFooBar
$method = ClassUtility::generateMethodName(ClassUtility::ACCESS_GET, 'fooBar'); // getFooBar

```

### ParameterConverter


``` php
<?php

$now = new \DateTime('now');
$period = new \DateInterval('P1D');

try {
    $datetimes = ParameterConverter::toArray($now, '\DateTime'); // array($now)
    
    #$datetimes = ParameterConverter::toArray(array($now, $now, $now), '\DateTime'); // array($now, $now, $now)
    #$datetimes = ParameterConverter::toArray(array($now, $interval), '\DateTime'); // \DomainException
} catch (\DomainException $e) {
    throw $e;
}
```