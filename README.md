# WebfactoryAwsSdk2Bundle

[![Build Status](https://travis-ci.org/webfactory/WebfactoryAwsSdk2Bundle.svg?branch=master)](https://travis-ci.org/webfactory/WebfactoryAwsSdk2Bundle)

Provides a simple Symfony Bundle to wrap the [AWS PHP SDK v2.x](https://github.com/aws/aws-sdk-php).

This is a fork of the original [platinumpixs/aws-symfony2-bundle](https://github.com/platinumpixs/aws-symfony2-bundle)
that we created to also allow the use of Symfony 3.x and above. Additionally, we've tried to limit
Composer dependencies to something more specific than using the whole `symfony/symfony` stack.

## Usage

The code calls \Aws\Common\Aws::factory(), which setups the ability to call all the services provided by the library.

There is a base class always setup under:

```php
$this->get('webfactory_aws_sdk2.default');
```

This will call the factory method with blank config values

To provide custom setup for access, secret keys. Add a config options in your config.yml, like:

```yaml
webfactory_aws_sdk2:
    base:
        region: us-east-1
        key: my-access-key
        secret: my-secret-key
```

Then to access this setup call:

```php
$this->get('webfactory_aws_sdk2.base');
```
