AttributeMapTrait
==================

This trait provides a convenient way to rename attributes in your project. 

It is written for a Laravel 5 project, and assumes that it will be used in Eloquent models.



Installation
------------

Install the package via Composer. Edit your composer.json file to require jijoel/attribute-map-trait.

    "require": {
        "jijoel/attribute-map-trait": "dev-master"
    }

Next, update Composer from the terminal:

    composer update


Usage
--------
use Jijoel\AttributeMapTrait;

class Foo extends Model 
{
    use AttributeMapTrait;

    protected $attributeMap = [
        'field1' => ['long_field_name_1', 'default'],
        'field2' => ['even_longer_field_name', 0],
        'field3' => 'one more field name'
    ];
}

You can now access $foo->field1



