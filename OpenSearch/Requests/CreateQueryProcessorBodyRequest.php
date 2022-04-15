<?php

namespace OpenSearch\Requests;

class CreateQueryProcessorBodyRequest extends Model
{
    public string $name;
    public array $processors;
    public string $domain;
    public array $indexes;
    public bool $active;

    protected $_required = [
        'name' => true,
        'processors' => true,
    ];

    protected $_name = [
        'name' => 'name',
        'processors' => 'processors',
        'domain' => 'domain',
        'indexes' => 'indexes',
        'active' => 'active',
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
        if (null !== $this->processors) {
            $res['processors'] = $this->processors;
        }
        if (null !== $this->domain) {
            $res['domain'] = $this->domain;
        }
        if (null !== $this->indexes) {
            $res['indexes'] = $this->indexes;
        }
        if (null !== $this->active) {
            $res['active'] = $this->active;
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
        if (isset($map['processors'])) {
            $model->processors = $map['processors'];
        }
        if (isset($map['domain'])) {
            $model->domain = $map['domain'];
        }
        if (isset($map['indexes'])) {
            $model->indexes = $map['indexes'];
        }
        if (isset($map['active'])) {
            $model->active = $map['active'];
        }

        return $model;
    }
}