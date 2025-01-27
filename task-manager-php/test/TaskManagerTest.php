<?php

// Tests

use PHPUnit\Framework\TestCase;

class TaskManagerTest extends TestCase
{
    public function testAddTask(): void
    {
        $taskManager = new TaskManager();
        $taskManager->addTask('Task 1', 'Description 1');

        $tasks = $taskManager->getTasks();
        $this->assertCount(1, $tasks);
        $this->assertEquals('Task 1', $tasks[0]['title']);
        $this->assertEquals('Description 1', $tasks[0]['description']);
        $this->assertFalse($tasks[0]['completed']);
    }

    public function testCompleteTask(): void
    {
        $taskManager = new TaskManager();
        $taskManager->addTask('Task 1', 'Description 1');
        $this->assertTrue($taskManager->completeTask('Task 1'));

        $tasks = $taskManager->getCompletedTasks();
        $this->assertCount(1, $tasks);
        $this->assertEquals('Task 1', $tasks[0]['title']);
        $this->assertTrue($tasks[0]['completed']);
    }

    public function testCompleteNonExistentTask(): void
    {
        $taskManager = new TaskManager();
        $this->assertFalse($taskManager->completeTask('Nonexistent Task'));
    }
}
