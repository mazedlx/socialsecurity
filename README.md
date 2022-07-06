![GitHub tag (latest by date)](https://img.shields.io/github/v/tag/mazedlx/socialsecurity)
![GitHub downloads](https://img.shields.io/packagist/dt/mazedlx/socialsecurity)

# SocialSecurity

Check if Austrian social security numbers are valid.

## Installation and Usage

```composer install mazedlx/socialsecurity```

```php
$socialSecurity = new SocialSecurity('1991 02 03 99');

$socialSecurity->isValid(); // true
```
