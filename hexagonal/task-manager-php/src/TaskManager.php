<?php

class TaskManager
{
    private array $tasks = [];

    public function addTask(string $title, string $description): void
    {
        $this->tasks[] = [
            'title' => $title,
            'description' => $description,
            'completed' => false,
        ];
    }

    public function completeTask(string $title): bool
    {
        foreach ($this->tasks as &$task) {
            if ($task['title'] === $title) {
                $task['completed'] = true;
                return true;
            }
        }
        return false;
    }

    public function getTasks(): array
    {
        return $this->tasks;
    }

    public function getCompletedTasks(): array
    {
        return array_filter($this->tasks, fn($task) => $task['completed']);
    }
}

