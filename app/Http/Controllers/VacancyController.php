<?php

namespace App\Http\Controllers;

use App\Http\Requests\VacancyCheck;
use App\User;
use App\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if((null !== $user->roles()->first()) && $user->roles()->first()->name === 'moderator') {
            $vacancies = Vacancy::with('users')->select('id', 'user_id', 'title', 'description', 'publish', 'email')->get();
        } else {
            $vacancies = Vacancy::where('user_id', $user->id)->select('id', 'user_id', 'title', 'description', 'publish', 'email')->get();
        }
        return view('admin.vacancy.index', compact('vacancies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return view('admin.vacancy.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VacancyCheck $request)
    {
        $vacancy = new Vacancy();
        $newVacancy = $vacancy->add($request, $vacancy);
        $newVacancy->checkVacancyCount();
        $newVacancy->sendEmail($vacancy->id);
        return redirect()->route('vacancy.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function show(Vacancy $vacancy)
    {

        return view('admin.vacancy.show', compact('vacancy'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function edit(Vacancy $vacancy)
    {
        return view('admin.vacancy.edit', compact('vacancy'));
    }

    /**
     * @param VacancyCheck $request
     * @param Vacancy $vacancy
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(VacancyCheck $request, Vacancy $vacancy)
    {
        $this->authorize('checkUser', $vacancy);
        $vacancy->edit($request->all());
        $vacancy->setPublishStatus($request->get('publish'));

        return redirect()->route('vacancy.index');
    }

    /**
     * @param Vacancy $vacancy
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Vacancy $vacancy)
    {
        $this->authorize('checkUser', $vacancy);
        $vacancy->delete();
        return redirect()->route('vacancy.index');
    }

}
