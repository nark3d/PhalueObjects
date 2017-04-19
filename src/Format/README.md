
[Back](../../README.md)

# Format

```php
BestServedCold\PhalueObjects\Format
```

## UML
![png](diagram.png)


## Float classes

### Byte

```php
BestServedCold\PhalueObjects\Format\Byte\Binary
BestServedCold\PhalueObjects\Format\Byte\Decimal
```

Usage:

```php
var_dump(Binary::fromString('100 MB')->getValue());
var_dump(Decimal::fromString('100 MB')->getValue());
var_dump(Binary::fromFloat(123456)->toString());
var_dump((string) Binary::fromFloat(1.208925819614629e24)); 
```

Outputs:

```shell
double(104857600)
double(100000000)
string(16) "120.56 Kilobytes"
string(11) "1 Yottabyte"
```

## String classes

### Csv
```php
BestServedCold\PhalueObjects\Format\Csv
```

Usage:
```php
var_dump(
    Csv::fromArray(
        [['some', 'text'], ['in', 'a'], ['multi-dimensional', 'array']]
    )->toJson()
);
var_dump(Csv::fromArray(['test', 'a', 'thing'])->getValue());
var_dump(Csv::fromString("this,is,some,CSV\nFor,you,to,see")->toArray());
var_dump(Csv::fromVOYaml(
    Yaml::fromString("[['some','yaml'],['with','multiple'],['aspects','jungle']]")
)->toString());
```

Outputs:
```shell
string(58) "[["some","text"],["in","a"],["multi-dimensional","array"]]"
string(13) "test,a,thing
"
array(2) {
  [0] =>
  array(4) {
    [0] =>
    string(4) "this"
    [1] =>
    string(2) "is"
    [2] =>
    string(4) "some"
    [3] =>
    string(3) "CSV"
  }
  [1] =>
  array(4) {
    [0] =>
    string(3) "For"
    [1] =>
    string(3) "you"
    [2] =>
    string(2) "to"
    [3] =>
    string(3) "see"
  }
}
string(39) "some,yaml
with,multiple
aspects,jungle
"
```
### Json
```php
BestServedcold\PhalueObjects\Format\Json
```

### Xml
```php
BestServedCold\PhalueObjects\Format\Xml
```

### Yaml
```php 
BestServedCold\PhalueObjects\Format\Yaml
```
