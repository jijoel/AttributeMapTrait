<?php namespace Jijoel;


trait AttributeMapTrait
{

    public function getAttribute($key)
    {
        // return the given primary key if asked for id
        if ($key == 'id')
            return $this->{$this->primaryKey};

        // return the contents of an attribute map
        if ( isset($this->attributeMap[$key]) ) {
            $item = $this->attributeMap[$key];
            
            if (is_string($item))
                return $this->$item;

            return $this->{$item[0]} ?: $item[1];
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

        foreach($this->attributeMap as $mapKey=>$mapValue) {
            if (is_string($mapValue))
                if ($mapValue == $key)
                    return parent::setAttribute($mapKey, $value);

            if ($mapValue[0] == $key)
                return parent::setAttribute($mapKey, $value);
        }

        return parent::setAttribute($key, $value);
    }

}
