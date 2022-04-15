<?php

namespace OpenSearch\Requests;

class CreateInterventionDictionaryEntriesBodyRequest extends Model
{
    public string $cmd;
    public string $word;


    protected $_required = [
        'cmd' => true,
        'word' => true,
    ];

    protected $_name = [
        'cmd' => 'cmd',
        'word' => 'word',
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
        if (null !== $this->word) {
            $res['word'] = $this->word;
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
        if (isset($map['word'])) {
            $model->word = $map['word'];
        }

        return $model;
    }
}