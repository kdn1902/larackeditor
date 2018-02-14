<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostUpdateRequest extends FormRequest
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

    public function rules()
	{
    	return [
        	'title' => 'required|max:255',
        	'post' => 'required',
    	];
	}

	public function messages()
	{
    	return [
        	'title.required' => 'Отсутствует заголовок',
        	'post.required'  => 'Отсутствует текст статьи',
    	];
	}
}
