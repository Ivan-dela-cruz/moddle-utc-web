<?php

namespace App\Http\Livewire;

use App\Level;
use App\Period;
use App\Subject;
use Livewire\Component;
use Livewire\WithPagination;

class CsActivities extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => '10'],

    ];
    public $perPage = '10';
    public $search = '';

    public $periods, $levels, $subjects, $level_id = '', $period_id = '', $subject_id = '';
    public $parallel;

    public function render()
    {
        $this->periods = Period::all();
        $this->levels = Level::all();
        $this->SubjectsByLevel();
        return view('livewire.cs-activities');
    }


    public function SubjectsByLevel()
    {
        $this->subjects = Subject::where('level_id', $this->level_id)->get();
    }

    public function clear()
    {
        $this->search = '';
        $this->page = 1;
        $this->perPage = '10';
    }
}
