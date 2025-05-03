<?php

namespace App\Policies;

use App\Models\Task;
use App\Models\Training;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can create tasks for the training.
     */
    public function createTask(User $user, Training $training)
    {
        // Only trainers and admins can create tasks
        return $user->id === $training->trainer_id ||
            $user->id === $training->admin_id;
    }

    /**
     * Determine whether the user can view the task.
     */
    public function viewTask(User $user, Task $task, Training $training)
    {

        return $user->id === $training->student_id ||
            $user->id === $training->trainer_id ||
            $user->id === $training->admin_id;
    }

    /**
     * Determine whether the user can update the task.
     */
    public function updateTask(User $user, Task $task, Training $training)
    {
        // Only the task creator, trainer or admin can update the task
        return $user->id === $task->created_by ||
            $user->id === $training->trainer_id ||
            $user->id === $training->admin_id;
    }

    /**
     * Determine whether the user can delete the task.
     */
    public function deleteTask(User $user, Task $task, Training $training)
    {
        // Only the task creator, trainer or admin can delete the task
        return $user->id === $task->created_by ||
            $user->id === $training->trainer_id ||
            $user->id === $training->admin_id;
    }

    /**
     * Determine whether the user can submit to the task.
     */
    public function submitTask(User $user, Task $task, Training $training)
    {
        // Only the student assigned to the training can submit
        return $user->id === $training->student_id;
    }
}
