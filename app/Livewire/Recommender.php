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

    public $skills = [];  // Store selected skill IDs

    // This function will handle form submission
    public function submitForm()
    {
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

        // Find courses that match the average
        $courses = Course::where('required_average', '<=', $this->average)
            ->where('is_active', true)
            ->get();

        // Attach the recommended courses to the recommender result
        foreach ($courses as $course) {
            $recommenderResult->courses()->attach($course->id);
        }

        // Show a success message in the modal
        $this->dispatch('form-submitted');
    }
    public function render()
    {
        return view('livewire.recommender', [
            'skills' => Skill::where('is_active', true)->get(),
        ]);
    }
}
