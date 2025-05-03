<?php

namespace App\Policies;


use App\Models\TaskSubmission;
use App\Models\Training;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskSubmissionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can review submissions.
     */
    public function reviewSubmission(User $user, TaskSubmission $submission, Training $training)
    {
        // Only trainers and admins can review submissions
        return $user->id === $training->trainer_id ||
            $user->id === $training->admin_id;
    }
}
