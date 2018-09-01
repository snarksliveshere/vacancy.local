<?php

namespace App\Http\Requests;

use App\Vacancy;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class VacancyCheck extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            'title.required' => 'Необходим заголовок',
            'title.min' => 'Заголовок не должен быть менее 4 символов',
            'title.different' => 'Заголовок и описание не должны быть одинаковыми',
            'title.unique' => 'Вы уже создали вакансию с таким названием',
            'description.required' => 'Необходимо описание',
            'description.min' => 'Описание не может быть менее 6 (для теста) символов',
            'email.required' => 'Необходимо ввести email',
            'email.email' => 'email должен соответствовать принятым стандартам',
        ];
    }

    public function rules()
    {
//        TODO: проверить потом уникальность при редактировании
        $vacancyTitle = $this->request->get('title');
        $vacancy = Vacancy::whereTitle($vacancyTitle)->select('id')->first();
        return [
            'title' => 'required|min:4|different:description|unique:vacancies,title,' . $vacancy->id,
            'email' => 'required|email',
            'description' => 'required|min:6',
        ];
    }
}
