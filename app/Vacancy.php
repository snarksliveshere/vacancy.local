<?php

namespace App;

use App\Notifications\FirstAuthorVacancy;
use App\Notifications\ModeratorNotification;
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

    public function sendEmail($id)
    {
        $user = User::whereName('moderator')->first();
        Notification::send($user, new ModeratorNotification($id));
    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    public function setPublishStatus($request)
    {
        if ($request === null) {
            $this->publish = 0;
        } else {
            $this->publish = 1;
        }
        $this->save();
    }

    public function getDate()
    {
        return $this->asDateTime($this->updated_at)->format('Y-m-d H:i');
    }
}
