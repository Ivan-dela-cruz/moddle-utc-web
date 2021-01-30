<?php

namespace App\Http\Livewire;

use App\Course;
use App\Level;
use App\Period;
use App\Subject;
use App\Task;
use App\Teacher;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Tasks extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => '9'],
    ];
    public $search = '', $perPage = '9';

    public $data_id, $name, $description, $start_date, $end_date, $url_file, $end_time, $status;//, $tasks = null;

    public $courses, $course_id, $periods, $period_id, $levels, $level_id, $subjects, $subject_id, $parallel;

    public function render()
    {
        $this->periods = Period::where('status', 1)->get();
        $this->levels = Level::where('status', 1)->get();
        $this->SubjectsByLevel();
        $this->courses = Course::where('subject_id', $this->subject_id)
            ->where('academic_period_id', $this->period_id)
            ->where('level_id', $this->level_id)
            ->get();

        if ($this->course_id <= 0) {
            $tasks = Task::join('courses', 'tasks.course_id', 'courses.id')
                ->where('courses.subject_id', $this->subject_id)
                ->where('courses.academic_period_id', $this->period_id)
                ->where('courses.level_id', $this->level_id)
                ->where(function ($query) {
                    $query->when($this->search != '', function ($q) {
                        $q->orWhere('tasks.name', 'LIKE', "%{$this->search}%");
                    });
                })
                ->select('tasks.*')
                ->paginate($this->perPage);
            $this->course_id = 0;
        } else {
            $tasks = Task::where('course_id', $this->course_id)
                ->where(function ($query) {
                    $query->when($this->search != '', function ($q) {
                        $q->orWhere('name', 'LIKE', "%{$this->search}%");
                    });
                })
                ->paginate($this->perPage);
        }

        return view('livewire.tasks', compact('tasks'));
    }

    public function allTasks()
    {
        $this->tasks = Task::join('courses', 'tasks.course_id', 'courses.id')
            ->where('courses.subject_id', $this->subject_id)
            ->where('courses.academic_period_id', $this->period_id)
            ->where('courses.level_id', $this->level_id)
            ->where(function ($query) {
                $query->when($this->search != '', function ($q) {
                    $q->orWhere('tasks.name', 'LIKE', "%{$this->search}%");
                });
            })
            ->select('tasks.*')
            ->get();
        $this->course_id = 0;
    }

    public function taskByCourse($id)
    {
        $this->course_id = $id;
    }

    public function SubjectsByLevel()
    {
        $this->subjects = Subject::where('level_id', $this->level_id)->get();
    }

    public function clear()
    {
        $this->search = '';
        $this->page = 1;
        $this->perPage = '9';
    }

 /*   public function resetInputFields()
    {
        $this->name = '';
        $this->description = '';
        $this->start_date = '';
        $this->end_date = '';
        $this->url_file = '';
        $this->end_time = '';
        $this->status = 1;
    }

    public function store()
    {
        $validation = $this->validate([
            'name' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'url_file' => 'required',
            'end_time' => 'required',
            'status' => 'required'
        ]);

        $data = [
            'name' => $this->name,
            'description' => $this->description,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'url_file' => $this->url_file,
            'end_time' => $this->end_time,
            'status' => $this->status
        ];
        Task::create($data);

        session()->flash('message', 'Tarea creada con exíto.');

        $this->resetInputFields();

        $this->emit('taskStore');
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        $this->name = $task->name;
        $this->description = $task->description;
        $this->start_date = $task->start_date;
        $this->end_date = $task->end_date;
        $this->url_file = $task->url_file;
        $this->end_time = $task->end_time;
        $this->data_id = $id;
    }

    public function update()
    {
        $validation = $this->validate([
            'name' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'url_file' => 'required',
            'end_time' => 'required',
            'status' => 'required'
        ]);

        $data = Task::find($this->data_id);

        $data->update([
            'name' => $this->name,
            'description' => $this->description,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'url_file' => $this->url_file,
            'end_time' => $this->end_time,
            'status' => $this->status
        ]);

        session()->flash('message', 'Tarea actualizado con exíto.');

        $this->resetInputFields();

        $this->emit('taskStore');
    }

    public function delete($id)
    {
        Task::find($id)->delete();
        session()->flash('message', 'Tarea eliminado con exíto.');
    }*/

}
