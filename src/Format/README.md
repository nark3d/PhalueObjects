
[Back](../../README.md)

# Format

```php
BestServedCold\PhalueObjects\Format
```

## UML
![png](diagram.png?raw=true)


## Classes

### Byte

```php
BestServedCold\PhalueObjects\Format\Byte\Binary
BestServedCold\PhalueObjects\Format\Byte\Decimal
```

Usage:

```php
var_dump(Binary::fromString('100 MB')->getValue());
// outputs 104857600
var_dump(Decimal::fromString('100 MB')->getValue());
// outputs 100000000
var_dump(Binary::fromFloat(123456)->toString());
```

### Csv
```php
BestServedCold\PhalueObjects\Format\Csv
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
