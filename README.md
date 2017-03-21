# PhalueObjects

[![Build Status](https://travis-ci.org/nark3d/PhalueObjects.svg)](https://travis-ci.org/nark3d/PhalueObjects)
[![Scrutinizer Quality Score](https://scrutinizer-ci.com/g/nark3d/phalueobjects/badges/quality-score.png?s=979567c2d791ffbeab12777c60c8edb86776ddcc)](https://scrutinizer-ci.com/g/nark3d/phalueobjects/)
[![Code Coverage](https://scrutinizer-ci.com/g/nark3d/phalueobjects/badges/coverage.png?s=59dd4a142412a9dcd989870610f1c9f89c19cf48)](https://scrutinizer-ci.com/g/nark3d/phalueobjects/)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/5820fcfd-8593-4b76-99a6-397b94cd659c/mini.png)](https://insight.sensiolabs.com/projects/5820fcfd-8593-4b76-99a6-397b94cd659c)

A generic set of PHP Value Objects for use in any project.


[Wikipedia](https://en.wikipedia.org/wiki/Domain-driven_design)
> When people exchange business cards, they generally do not distinguish between each unique card; they only are concerned about the information printed on the card. In this context, business cards are value objects.

## Installation
```shell
composer require best-served-cold/phalue-objects
```

## Usage

Read the [Docs](https://github.com/nark3d/PhalueObjects/wiki) for usage
  instructions.

## Philosophy
To make this code consistent, we've stuck to a certain set of restrictions:

### Rules
* [**Must** be immutable](#immutable)
* **Must** contain one value
* **Can** instantiate new object from value
* **Can** be created from multiple arguments
* **Can** be equal regardless of object
* **Must** have a zero lifespan


*Disclaimer: This is my interpretation of "The rules".*

#<a name="immutable"></a>
#### Must be immutable
The value object's value must be set at the time of construction.
At no point should the value be mutated within the object.

#### Must contain one value
The value object can only be constructed from one value, this can be 
any of the following types:
* boolean 
* integer
* float/double
* string
* array
* object
* resource
* null 

#### Can instantiate new object from value
Rather than mutating, a new object can be instantiated from an existing one.

Example:
```php
//...
public function double() 
{
    return new static($this->getValue() * 2);
}
...//
```

#### Can be created from multiple arguments
Instead of an object having multiple object properties, it should be created from
multiple arguments.

Example:
```php
//...
public static function fromVars($one = 1, $two = 2, $three = 3)
{
    return new static([$one, $two, $three]); 
}
...//
```

#### Can be equal regardless of object
The type of a value object is irrelevant to equality:

Example:
```php
//...
$bob = $stringValueObject->equals($csvValueObject);
...//
```

```$bob``` is true where the type and value are equal.

#### Must have a zero lifespan
Value objects must not persist data between run times.  For example: 
no database or session information should be collected from within the
object.
