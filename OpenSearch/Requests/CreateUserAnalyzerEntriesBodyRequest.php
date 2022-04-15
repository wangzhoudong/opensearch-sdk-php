<?php

namespace OpenSearch\Requests;

class CreateUserAnalyzerEntriesBodyRequest extends Model
{
    public string $cmd;
    public string $key;
    public string $value;
    public bool $splitEnabled;

    protected $_required = [
        'cmd' => true,
        'key' => true,
        'value' => true,
    ];

    protected $_name = [
        'cmd' => 'cmd',
        'key' => 'key',
        'value' => 'value',
        'splitEnabled' => 'splitEnabled',
    ];

    /**
     * @return array
     */
    public function toMap()
    {
        $res = [];

        if (null !== $this->cmd) {
            $res['cmd'] = $this->cmd;
        }
        if (null !== $this->key) {
            $res['key'] = $this->key;
        }
        if (null !== $this->value) {
            $res['value'] = $this->value;
        }
        if (null !== $this->splitEnabled) {
            $res['splitEnabled'] = $this->splitEnabled;
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

        if (isset($map['cmd'])) {
            $model->cmd = $map['cmd'];
        }
        if (isset($map['key'])) {
            $model->key = $map['key'];
        }
        if (isset($map['value'])) {
            $model->value = $map['value'];
        }
        if (isset($map['splitEnabled'])) {
            $model->splitEnabled = $map['splitEnabled'];
        }

        return $model;
    }
}