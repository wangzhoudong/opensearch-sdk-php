<?php

namespace OpenSearch\Requests;

class PushUserAnalyzerEntriesBodyRequest extends Model
{
    public array $entries;

    public function __construct($config = [])
    {
        if (!empty($config)) {
            foreach ($config as $k => $list) {
                foreach ($list as $item) {
                    $req = new CreateUserAnalyzerEntriesBodyRequest($item);
                    $req->validate();
                    $this->{$k}[] = $req;
                }
            }
        }
    }

    protected $_required = [
        'entries' => true,
    ];

    protected $_name = [
        'entries' => 'entries',
    ];

    /**
     * @return array
     */
    public function toMap()
    {
        $res = [];

        if (null !== $this->entries) {
            foreach ($this->entries as $item){
                $res[] = (object)$item->toMap();
            }
        }

        return (object)['entries'=>$res];
    }

    /**
     * @param array $map
     * @return CreateUserAnalyzerEntriesBodyRequest
     */
    public static function fromMap($map = [])
    {
        $model = new self();

        if (isset($map['entries'])) {
            $model->entries = $map['entries'];
        }

        return $model;
    }
}