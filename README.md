AttributeMapTrait
==================

This trait provides a convenient way to rename attributes in your project. 

It is written for a Laravel 5 project, and assumes that it will be used in Eloquent models.



Installation
------------

Install the package via Composer. I am not yet uploading this to packagist, so to include the project, you also need to include the repository. Edit your composer.json file to require jijoel/attribute-map-trait:

    "require": {
        "jijoel/attribute-map-trait": "dev-master"
    },
    "repositories": {
        "attribute-map-trait": {
            "type": "vcs",
            "url":  "https://github.com/jijoel/AttributeMapTrait.git"
        }
    },


Next, update Composer from the terminal:

    composer update


Usage
--------
use Jijoel\AttributeMapTrait;

class Foo extends Model 
{
    use AttributeMapTrait;

    protected $attributeMap = [
        'field1' => ['long_field_name_1', 'default_value'],
        'field2' => ['even_longer_field_name', 0],
        'field3' => 'one more field name'
    ];
}

You can now access $foo->field1. It will get or set data you would ordinarily get from $foo->long_field_name_1.

If you use an array, the second item is the default value if the field is null.

