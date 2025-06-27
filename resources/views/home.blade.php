@extends('layouts.app')
@php
    use App\Models\User;
    use App\Models\Company;
    use App\Models\Training;
    use App\Models\Task;
    use App\Models\TaskSubmission;
    $stdNumber = User::where('role_id', 3)->count();
    $staffNumber = User::whereIn('role_id', [4, 2])->count();
    $supervisorsCount = User::where('role_id', 2)->count();
    $trainersCount = User::where('role_id', 4)->count();
    $companiesNumber = Company::count();
    $activeTrainingCount = Training::where('status', 1)->count();
    $taskCount = Task::count();
    $trainingCount = Training::count();
    $avgTasks = $trainingCount > 0 ? $taskCount / $trainingCount : 0;
    $topStudentId = TaskSubmission::select('student_id')
        ->groupBy('student_id')
        ->orderByRaw('COUNT(*) DESC')
        ->limit(1)
        ->pluck('student_id')
        ->first();

    $topStudent = null;
    $submissionCount = 0;

    if ($topStudentId) {
        $topStudent = User::find($topStudentId);
        $submissionCount = TaskSubmission::where('student_id', $topStudentId)->count();
    }
    $completionByCompany = DB::table('task_submissions')
        ->join('trainings', 'task_submissions.student_id', '=', 'trainings.student_id')
        ->join('companies', 'companies.id', '=', 'trainings.company_id')
        ->where('task_submissions.status', '2')
        ->select('companies.name', DB::raw('COUNT(*) as total'))
        ->groupBy('companies.name')
        ->orderByDesc('total')
        ->limit(5)
        ->get();
    $activeTrainingsForAdmin = Training::where('admin_id', auth()->user()->id)
        ->where('status', 1)
        ->count();
    $activeStudentForAdmin = Training::where('admin_id', auth()->user()->id)
        ->where('status', 1)
        ->distinct('student_id')
        ->count('student_id');
    $taskCountForAdmin = Task::whereHas('training', function ($query) {
        $query->where('admin_id', auth()->user()->id);
    })->count();

    $avgTasksForAdmin = $activeTrainingsForAdmin > 0 ? $taskCountForAdmin / $activeTrainingsForAdmin : 0;
    $tasksforTrainer = Task::whereHas('training', function ($query) {
        $query->where('trainer_id', auth()->user()->id);
    })->count();
    $tasksforStudent = Task::whereHas('training', function ($query) {
        $query->where('student_id', auth()->user()->id);
    })->count();
    $completedTasksForTrainer = Task::whereHas('training', function ($query) {
        $query->where('trainer_id', auth()->user()->id);
    })
        ->where('status', 2)
        ->count();
    $activeTrainingsForAdmin = Training::where('trainer_id', auth()->user()->id)
        ->where('status', 1)
        ->count();
    $inProgressTasksForStudent = Task::whereHas('training', function ($query) {
        $query->where('student_id', auth()->user()->id);
    })
        ->where('status', 0)
        ->count();
    $completedTasksForStudent = Task::whereHas('training', function ($query) {
        $query->where('student_id', auth()->user()->id);
    })
        ->where('status', 2)
        ->count();
@endphp
{{-- @dd($taskCountForAdmin) --}}

@section('content')
    <div class="container-fluid px-4">
        <!-- Header Section -->
        @if (auth()->user()->role->name == 'super_admin')
            <div class="row mb-4">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h1 class="h3 mb-0 text-gray-800">Training Management Dashboard</h1>
                            <p class="mb-0 text-muted">Welcome back, {{ auth()->user()->name }} -
                                {{ auth()->user()->role->visible_name }}</p>
                        </div>
                        <div class="text-muted">
                            <i class="fas fa-calendar-alt me-1"></i>
                            {{ now()->format('M d, Y') }} - {{ now()->format('l') }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Statistics Cards Row -->
            <div class="row g-4 mb-4">
                <!-- Total Students Card -->


                <div class="col-xl-3 col-md-6">
                    <div class="card border-0 shadow-sm h-100 card-hover">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Active Students
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{ number_format($stdNumber) }}
                                    </div>

                                </div>
                                <div class="col-auto">
                                    <div class="icon-circle bg-primary">
                                        <i class="fas fa-user-graduate text-white"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Partner Companies Card -->
                <div class="col-xl-3 col-md-6">
                    <div class="card border-0 shadow-sm h-100 card-hover">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Partner Companies
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{ number_format($companiesNumber) }}
                                    </div>

                                </div>
                                <div class="col-auto">
                                    <div class="icon-circle bg-success">
                                        <i class="fas fa-building text-white"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Active Trainings Card -->
                <div class="col-xl-3 col-md-6">
                    <div class="card border-0 shadow-sm h-100 card-hover">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                        Active Trainings
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{ number_format($activeTrainingCount) }}
                                    </div>

                                </div>
                                <div class="col-auto">
                                    <div class="icon-circle bg-info">
                                        <i class="fas fa-laptop-code text-white"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Supervisors & Trainers Card -->
                <div class="col-xl-3 col-md-6">
                    <div class="card border-0 shadow-sm h-100 card-hover">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Staff Members
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{ number_format($staffNumber) }}
                                    </div>
                                    <div class="mt-2 text-xs text-muted">
                                        <i class="fas fa-chalkboard-teacher me-1"></i>
                                        {{ $supervisorsCount }} Supervisors, {{ $trainersCount }} Trainers
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="icon-circle bg-warning">
                                        <i class="fas fa-users-cog text-white"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card border-0 shadow-sm h-100 card-hover">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Average Tasks Per Training
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{ number_format($avgTasks, 3) }}
                                    </div>

                                </div>
                                <div class="col-auto">
                                    <div class="icon-circle bg-warning">
                                        <i class="fas fa-users-cog text-white"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card border-0 shadow-sm h-100 card-hover">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Top Performing Student
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{ $topStudent->name }}
                                    </div>
                                    <div class="mt-2 text-xs text-muted">
                                        {{ $submissionCount }} Task Submissions
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="icon-circle bg-warning">
                                        <i class="fas fa-users-cog text-white"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-white py-3">
                        <h6 class="m-0 font-weight-bold text-success">Top 5 Companies by Training Completions</h6>
                    </div>
                    <div class="card-body">
                        <canvas id="companyCompletionChart" height="300"></canvas>
                    </div>
                </div>
            </div>
    </div>
@elseif(auth()->user()->role->name == 'admin')
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="h3 mb-0 text-gray-800">Training Management Dashboard</h1>
                    <p class="mb-0 text-muted">Welcome back, {{ auth()->user()->name }} -
                        {{ auth()->user()->role->visible_name }}</p>
                </div>
                <div class="text-muted">
                    <i class="fas fa-calendar-alt me-1"></i>
                    {{ now()->format('M d, Y') }} - {{ now()->format('l') }}
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics Cards Row -->
    <div class="row g-4 mb-4">
        <!-- Total Students Card -->
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm h-100 card-hover">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Active Students
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ number_format($activeStudentForAdmin) }}
                            </div>

                        </div>
                        <div class="col-auto">
                            <div class="icon-circle bg-primary">
                                <i class="fas fa-user-graduate text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <!-- Active Trainings Card -->
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm h-100 card-hover">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Active Trainings
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ number_format($activeTrainingsForAdmin) }}
                            </div>

                        </div>
                        <div class="col-auto">
                            <div class="icon-circle bg-info">
                                <i class="fas fa-laptop-code text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Supervisors & Trainers Card -->
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm h-100 card-hover">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Average Tasks Per Training
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ number_format($avgTasksForAdmin, 3) }}
                            </div>

                        </div>
                        <div class="col-auto">
                            <div class="icon-circle bg-warning">
                                <i class="fas fa-users-cog text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@elseif(auth()->user()->role->name == 'trainer')
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="h3 mb-0 text-gray-800">Training Management Dashboard</h1>
                    <p class="mb-0 text-muted">Welcome back, {{ auth()->user()->name }} -
                        {{ auth()->user()->role->visible_name }}</p>
                </div>
                <div class="text-muted">
                    <i class="fas fa-calendar-alt me-1"></i>
                    {{ now()->format('M d, Y') }} - {{ now()->format('l') }}
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics Cards Row -->
    <div class="row g-4 mb-4">
        <!-- Total Students Card -->
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm h-100 card-hover">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Tasks
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ number_format($tasksforTrainer) }}
                            </div>

                        </div>
                        <div class="col-auto">
                            <div class="icon-circle bg-primary">
                                <i class="fas fa-user-graduate text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <!-- Active Trainings Card -->
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm h-100 card-hover">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Completed Tasks
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ number_format($completedTasksForTrainer) }}
                            </div>

                        </div>
                        <div class="col-auto">
                            <div class="icon-circle bg-info">
                                <i class="fas fa-laptop-code text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Supervisors & Trainers Card -->
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm h-100 card-hover">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Trainings
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ number_format($activeTrainingsForAdmin) }}
                            </div>

                        </div>
                        <div class="col-auto">
                            <div class="icon-circle bg-warning">
                                <i class="fas fa-users-cog text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@elseif(auth()->user()->role->name == 'student')
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="h3 mb-0 text-gray-800">Training Management Dashboard</h1>
                    <p class="mb-0 text-muted">Welcome back, {{ auth()->user()->name }} -
                        {{ auth()->user()->role->visible_name }}</p>
                </div>
                <div class="text-muted">
                    <i class="fas fa-calendar-alt me-1"></i>
                    {{ now()->format('M d, Y') }} - {{ now()->format('l') }}
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics Cards Row -->
    <div class="row g-4 mb-4">
        <!-- Total Students Card -->
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm h-100 card-hover">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Tasks
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ number_format($tasksforStudent) }}
                            </div>

                        </div>
                        <div class="col-auto">
                            <div class="icon-circle bg-primary">
                                <i class="fas fa-user-graduate text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <!-- Active Trainings Card -->
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm h-100 card-hover">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Completed Tasks
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ number_format($completedTasksForStudent) }}
                            </div>

                        </div>
                        <div class="col-auto">
                            <div class="icon-circle bg-info">
                                <i class="fas fa-laptop-code text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Supervisors & Trainers Card -->
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm h-100 card-hover">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                In Progress Tasks
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ number_format($inProgressTasksForStudent) }}
                            </div>

                        </div>
                        <div class="col-auto">
                            <div class="icon-circle bg-warning">
                                <i class="fas fa-users-cog text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @endif
    @push('styles')
        <style>
            .card-hover {
                transition: all 0.3s ease;
            }

            .card-hover:hover {
                transform: translateY(-5px);
                box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
            }

            .icon-circle {
                width: 60px;
                height: 60px;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .text-gray-800 {
                color: #5a5c69 !important;
            }

            .avatar-sm {
                width: 36px;
                height: 36px;
            }

            .avatar-title {
                width: 100%;
                height: 100%;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 0.75rem;
                font-weight: 600;
            }

            .progress-sm {
                height: 0.5rem;
            }

            .chart-area,
            .chart-pie {
                position: relative;
                height: 320px;
                width: 100%;
            }

            .table-hover tbody tr:hover {
                background-color: rgba(0, 0, 0, 0.025);
                transition: background-color 0.15s ease-in-out;
            }

            .btn:hover {
                transform: translateY(-1px);
                transition: all 0.2s ease;
            }

            .text-xs {
                font-size: 0.75rem;
            }

            .text-sm {
                font-size: 0.875rem;
            }

            .list-group-item:last-child {
                border-bottom: 0;
            }

            .badge {
                font-size: 0.65rem;
            }
        </style>
    @endpush

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const companyLabels = {!! json_encode($completionByCompany->pluck('name')) !!};
            const companyData = {!! json_encode($completionByCompany->pluck('total')) !!};

            const ctx = document.getElementById('companyCompletionChart').getContext('2d');

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: companyLabels,
                    datasets: [{
                        label: 'Completed Trainings',
                        data: companyData,
                        backgroundColor: 'rgba(75, 192, 192, 0.9)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1,
                        borderRadius: 5,
                    }]
                },
                options: {
                    indexAxis: 'y',
                    responsive: true,
                    scales: {
                        x: {
                            beginAtZero: true,
                            ticks: {
                                precision: 0
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });
        </script>
    @endpush
@endsection
