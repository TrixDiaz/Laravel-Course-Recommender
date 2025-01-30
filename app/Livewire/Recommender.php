<?php

namespace App\Livewire;

use App\Models\Course;
use App\Models\RecommenderResult;
use App\Models\Skill;
use Livewire\Component;

class Recommender extends Component
{
    public $name;
    public $school;
    public $average;

    public $skills = [];

    public $qualifiedCourses = [];

    public $showModal = false;

    // This function will handle form submission
    public function submitForm()
    {
        $this->validate([
            'name' => 'required|string',
            'school' => 'required|string',
            'average' => 'required|numeric|min:75|max:100',
            'skills' => 'required|array|min:1',
        ]);

        // Store the recommender result data
        $recommenderResult = RecommenderResult::create([
            'name' => $this->name,
            'school' => $this->school,
            'average' => $this->average,
        ]);

        // Store the selected skills for this recommender result
        foreach ($this->skills as $skillId) {
            $recommenderResult->skills()->attach($skillId);
        }

        // Find courses that match the average and skills
        $this->qualifiedCourses = Course::where('required_average', '<=', $this->average)
            ->whereHas('courseLevelSkill', function ($query) {
                $query->whereIn('skill_id', $this->skills)
                    ->where('is_active', true);
            })
            ->orderBy('required_average', 'desc') // Order by required average in descending order
            ->take(3) // Limit to top 3 courses
            ->get();

        // Attach the recommended courses to the recommender result
        foreach ($this->qualifiedCourses as $course) {
            $recommenderResult->courses()->attach($course->id);
        }

        // Show the modal
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
        // Reset form fields after closing the modal
        $this->reset(['name', 'school', 'average', 'skills']);
    }

    public function render()
    {
        return view('livewire.recommender', [
            'skillsData' => Skill::where('is_active', true)->get(),
            'qualifiedCourses' => $this->qualifiedCourses,
        ]);
    }
}
