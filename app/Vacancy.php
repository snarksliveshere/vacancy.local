<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
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
    public static function add($fields, $userId)
    {
        $vacancy = new static;
        $vacancy->fill($fields);
        $vacancy->user_id = $userId;
        $vacancy->save();
        Session::flash('success', 'Успешна добавлена новая вакансия');
    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }
}
