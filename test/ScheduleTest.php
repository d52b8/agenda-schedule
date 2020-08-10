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
        $this->assertEquals($schedule->type, Schedule::TYPE_NORMAL);
        $this->assertEquals($schedule->priority, Schedule::PRIORITY_NORMAL);
        $this->assertEquals($schedule->lastModifiedBy, null);
    }

    public function testEmptyPriority()
    {
        $config = [
            'name' => 'name',
            'data' => [
                'task' => 'task'
            ]
        ];

        $schedule = new Schedule($config);

        $this->assertEquals($schedule->priority, Schedule::PRIORITY_NORMAL);
    }

    public function testNormalPriority()
    {
        $config = [
            'name' => 'name',
            'data' => [
                'task' => 'task'
            ]
        ];

        $schedule = new Schedule($config);
        $schedule->setPriority(Schedule::PRIORITY_NORMAL);

        $this->assertEquals($schedule->priority, Schedule::PRIORITY_NORMAL);
    }

    public function testHighPriority()
    {
        $config = [
            'name' => 'name',
            'data' => [
                'task' => 'task'
            ]
        ];

        $schedule = new Schedule($config);
        $schedule->setPriority(Schedule::PRIORITY_HIGH);

        $this->assertEquals($schedule->priority, Schedule::PRIORITY_HIGH);
    }

    public function testWrongPriority()
    {
        $config = [
            'name' => 'name',
            'data' => [
                'task' => 'task'
            ]
        ];

        $schedule = new Schedule($config);
        $schedule->setPriority(99);

        $this->assertEquals($schedule->priority, $schedule::PRIORITY_NORMAL);
    }
}
