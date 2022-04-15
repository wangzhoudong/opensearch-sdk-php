<?php

namespace OpenSearch\Requests;

class CreateUserAnalyzerBodyRequest extends Model
{
    public string $name;
    public string $business;

    protected $_required = [
        'name' => true,
        'business' => true,
    ];

    protected $_name = [
        'name' => 'name',
        'business' => 'business',
    ];

    /**
     * @return array
     */
    public function toMap()
    {
        $res = [];

        if (null !== $this->name) {
            $res['name'] = $this->name;
        }
        if (null !== $this->business) {
            $res['business'] = $this->business;
        }

        return $res;
    }

    /**
     * @param array $map
     * @return CreateInterventionDictionaryBodyRequest
     */
    public static function fromMap($map = [])
    {
        $model = new self();

        if (isset($map['name'])) {
            $model->name = $map['name'];
        }
        if (isset($map['business'])) {
            $model->business = $map['business'];
        }

        return $model;
    }
}