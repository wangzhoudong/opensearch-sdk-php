<?php

namespace OpenSearch\Requests;

class CreateQueryProcessorRequest extends Model
{
    /**
     * @var string
     */
    public string $dryRun;

    protected $_name = [
        'dryRun' => 'dryRun',
    ];

    public function toMap()
    {
        $res = [];
        if (null !== $this->dryRun) {
            $res['dryRun'] = $this->dryRun;
        }

        return $res;
    }

    /**
     * @param array $map
     *
     * @return CreateQueryProcessorRequest
     */
    public static function fromMap($map = [])
    {
        $model = new self();
        if (isset($map['dryRun'])) {
            $model->dryRun = $map['dryRun'];
        }

        return $model;
    }
}
