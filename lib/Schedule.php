<?php
namespace d52b8\agenda;

class Schedule
{
    public $name;
    public $data;
    public $type;
    public $priority;
    public $nextRunAt;
    public $lastModifiedBy;

    const TYPE_NORMAL = 'normal';

    public function __construct($config) {
        $this->name = isset($config['name']) ? $config['name'] : null;
        $this->data = isset($config['data']) ? $config['data'] : [];
        $this->type = self::TYPE_NORMAL;
        $this->priority = 0;
        $this->nextRunAt =  self::now();
        $this->lastModifiedBy =  null;
    }

    static private function now()
    {
        if (!extension_loaded('mongodb')) {
            throw new \RuntimeException("Extension <mongodb> is not loaded", 1);
        }
        return new \MongoDB\BSON\UTCDateTime(time());
    }
}
