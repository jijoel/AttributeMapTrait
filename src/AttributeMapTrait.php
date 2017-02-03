<?php namespace Jijoel;


trait AttributeMapTrait
{
    // Map of attributes to reassign:
    // protected $attributeMap = [
    //     Use attributes in one of these formats:
    //     'new_name' => 'old_name',
    //     'new_name' => ['old_name','default_value'],
    // ];

    public function getAttribute($key)
    {
        // return the given primary key if asked for id
        if ($key == 'id')
            return $this->attributes[$this->primaryKey];

        // return the contents of an attribute map
        if ( isset($this->getAttributeMap()[$key]) ) {
            $item = $this->getAttributeMap()[$key];
            
            if (is_string($item))
                return $this->$item;

            return (! is_null($this->{$item[0]}))
                ? $this->{$item[0]}
                : $item[1];
        }

        // If all else fails, ask our parent for help
        // (TODO: Figure out how to test this...)
        return parent::getAttribute($key);
    }

    // TODO: We rely completely on the parent class to 
    // set attribute values. I currently do not know 
    // how to test this.
    public function setAttribute($key, $value)
    {
        if ($key == 'id')
            return parent::setAttribute($this->primaryKey, $value);

        foreach($this->getAttributeMap() as $mapKey=>$mapValue) {
            if (is_string($mapValue))
                if ($mapValue == $key)
                    return parent::setAttribute($mapKey, $value);

            if ($mapKey == $key)
                return parent::setAttribute($mapValue[0], $value);
        }

        return parent::setAttribute($key, $value);
    }

    private function getAttributeMap()
    {
        if (isset($this->attributeMap))
            return $this->attributeMap;

        return [];
    }

}
