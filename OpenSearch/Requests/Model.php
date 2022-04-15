<?php

namespace OpenSearch\Requests;

use AlibabaCloud\Tea\Model as BaseModel;

class Model extends BaseModel
{

    public function validate()
    {
        $vars = get_object_vars($this);
        foreach ($this->_required as $k => $v) {
            if (!in_array($k, array_keys($vars)) || !isset($this->$k) || blank($this->$k)) {
                throw new \InvalidArgumentException("{$k} is required.[" . static::class . "]");
            }
        }
    }

}