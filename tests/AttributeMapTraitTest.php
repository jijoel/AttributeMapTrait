<?php


class AttributeMapTraitTest extends PHPUnit_Framework_TestCase
{
    protected $mock;

    public function setUp()
    {
        $this->mock = $this->getMockForTrait('Jijoel\AttributeMapTrait');
    }

    /**
     * @test
     */
    public function can_get_alternate_key_field_as_id()
    {
        $this->mock->primaryKey = 'foo';
        $this->mock->foo = 132;

        $this->assertSame(132, $this->mock->getAttribute('id'));
    }

    /**
     * @test
     */
    public function can_get_alternate_field_name()
    {
        $this->mock->attributeMap = ['bar' => 'foo'];
        $this->mock->foo = 153;

        $this->assertSame(153, $this->mock->getAttribute('bar'));
    }

    /**
     * @test
     */
    public function can_get_default_values()
    {
        $this->mock->attributeMap = ['bar' => ['foo',0]];
        $this->mock->foo = null;

        $this->assertSame(0, $this->mock->getAttribute('bar'));
    }

    /**
     * @test
     */
    public function will_only_return_defaults_for_nulls()
    {
        $this->mock->attributeMap = ['bar' => ['foo', 'x']];
        $this->mock->foo = 0;

        $this->assertSame(0, $this->mock->getAttribute('bar'));
    }
}
