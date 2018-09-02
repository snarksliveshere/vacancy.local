<?php

namespace App;

use App\Notifications\FirstAuthorVacancy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Session;

class Vacancy extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'email'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @param $fields
     * @return Vacancy
     */
//    public static function add($fields, $userId)
//    {
//        $vacancy = new static;
//        $vacancy->fill($fields);
//        $vacancy->user_id = $userId;
//        $vacancy->save();
//        Session::flash('success', 'Успешна добавлена новая вакансия');
//        return $vacancy;
//    }

    public function add($request, Vacancy $vacancy)
    {
        $vacancy->fill($request->all());
        $vacancy->user_id = $request->user()->id;
        $vacancy->save();
        Session::flash('success', 'Успешна добавлена новая вакансия');
        return $vacancy;
    }

    public function checkVacancyCount()
    {
        $count = Vacancy::where('user_id', $this->user_id)->count();

        if ($count === 1) {
            Notification::send(Auth::user(), new FirstAuthorVacancy());
            return;
        } else {
            $this->publish = 1;
            $this->save();
        }
    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }
}
