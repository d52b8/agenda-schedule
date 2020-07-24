<?php
require './vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use d52b8\agenda\Schedule;

class ScheduleTest extends TestCase
{
    public function testScheduleConstruct()
    {
        $config = [
            'name' => 'name',
            'data' => [
                'task' => 'task'
            ]
        ];

        $schedule = new Schedule($config);

        $this->assertEquals($schedule->name, $config['name']);
        $this->assertEquals($schedule->data, $config['data']);
        $this->assertEquals($schedule->type, $schedule::TYPE_NORMAL);
        $this->assertEquals($schedule->priority, 0);
        $this->assertEquals($schedule->lastModifiedBy, null);
    }
}
