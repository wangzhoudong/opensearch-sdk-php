<?php

namespace OpenSearch\Requests;

class PushInterventionDictionaryEntriesBodyRequest extends Model
{
    public array $list;

    public function __construct($config = [])
    {
        if (!empty($config)) {
            foreach ($config as $k => $list) {
                foreach ($list as $item) {
                    $req = new CreateInterventionDictionaryEntriesBodyRequest($item);
                    $req->validate();
                    $this->{$k}[] = $req;
                }
            }
        }
    }

    protected $_required = [
        'list' => true,
    ];

    protected $_name = [
        'list' => 'list',
    ];

    /**
     * @return array
     */
    public function toMap()
    {
        $res = [];

        if (null !== $this->list) {
            foreach ($this->list as $item){
                $res[] = $item->toMap();
            }
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

        if (isset($map['list'])) {
            $model->list = $map['list'];
        }

        return $model;
    }
}