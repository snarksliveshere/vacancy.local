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
        // TODO: тут пойдет проверка, но потом
        $user = Auth::user();
        $vacancies = Vacancy::where('user_id', $user->id)
            ->select('id', 'user_id', 'title', 'description', 'publish', 'email')->get();

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
        $user = Auth::user()->id;
        Vacancy::add($request->all(), $user);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function update(VacancyCheck $request, Vacancy $vacancy)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vacancy $vacancy)
    {
        $vacancy->delete();
        return redirect()->route('vacancy.index');
    }

}
