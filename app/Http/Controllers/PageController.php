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
                    ->select('id', 'user_id', 'title', 'description', 'email')->get();
        return view('frontend.index', compact('vacancies'));
    }

    public function vacanciesShow($id)
    {

    }

}
