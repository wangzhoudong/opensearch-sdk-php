<?php

namespace OpenSearch\Requests;

class CreateInterventionDictionaryBodyRequest extends Model
{
    public string $name;
    public string $type;
    public ?string $analyzer=null;

    protected $_required = [
        'name' => true,
        'type' => true,
    ];

    protected $_name = [
        'name' => 'name',
        'type' => 'type',
        'analyzer' => 'analyzer',
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
        if (null !== $this->type) {
            $res['type'] = $this->type;
        }
        if (null !== $this->analyzer) {
            $res['analyzer'] = $this->analyzer;
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
        if (isset($map['type'])) {
            $model->type = $map['type'];
        }
        if (isset($map['analyzer'])) {
            $model->analyzer = $map['analyzer'];
        }

        return $model;
    }
}