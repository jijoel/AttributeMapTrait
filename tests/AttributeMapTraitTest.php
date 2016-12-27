<?php


class AttributeMapTraitTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function can_get_alternate_key_field_as_id()
    {
        $mock = $this->getMockForTrait('Jijoel\AttributeMapTrait');
        $mock->primaryKey = 'foo';
        $mock->foo = 132;

        $this->assertSame(132, $mock->getAttribute('id'));
    }

    /**
     * @test
     */
    public function can_get_alternate_field_name()
    {
        $mock = $this->getMockForTrait('Jijoel\AttributeMapTrait');
        $mock->attributeMap = ['bar' => 'foo'];
        $mock->foo = 153;

        $this->assertSame(153, $mock->getAttribute('bar'));
    }

    /**
     * @test
     */
    public function can_get_default_values()
    {
        $mock = $this->getMockForTrait('Jijoel\AttributeMapTrait');
        $mock->attributeMap = ['bar' => ['foo',0]];
        $mock->foo = null;

        $this->assertSame(0, $mock->getAttribute('bar'));
    }

}
