<?php

namespace App\Http\Controllers;

use App\Vacancy;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function vacancies()
    {
        $vacancies = Vacancy::with(['users' => function ($q) {
                                    $q->select('id', 'name');}])
                    ->wherePublish(1)
                    ->select('id', 'user_id', 'title', 'description', 'email', 'updated_at')->get();
        return view('frontend.index', compact('vacancies'));
    }

    public function vacanciesShow($id)
    {
        $vacancy = Vacancy::with(['users' => function ($q) {
            $q->select('id', 'name');}])
            ->whereId($id)->select('id', 'user_id', 'title', 'description', 'email', 'updated_at')->firstOrFail();
        return view('frontend.vacancy.show', compact('vacancy'));
    }
}
