<?php
namespace d52b8\agenda;

use DateTime;

class Schedule
{
    public $name;
    public $data;
    public $type;
    public $priority;
    public $nextRunAt;
    public $lastModifiedBy;

    const TYPE_NORMAL = 'normal';

    const PRIORITY_HIGH = 10;
    const PRIORITY_NORMAL = 0;

    const PRIORITIES = [
        self::PRIORITY_HIGH,
        self::TYPE_NORMAL
    ];

    public function __construct($config) {
        $this->name = isset($config['name']) ? $config['name'] : null;
        $this->data = isset($config['data']) ? $config['data'] : null;
        $this->type = self::TYPE_NORMAL;
        $this->priority = self::PRIORITY_NORMAL;
        $this->nextRunAt =  self::now();
        $this->lastModifiedBy =  null;
    }

    static private function now()
    {
        if (!extension_loaded('mongodb')) {
            throw new \RuntimeException("Extension <mongodb> is not loaded", 1);
        }
        return new \MongoDB\BSON\UTCDateTime(time() * 1000);
    }

    public function setPriority($priority) {
        if (in_array($priority, self::PRIORITIES)) {
            $this->priority = $priority;
        }
    }
}
