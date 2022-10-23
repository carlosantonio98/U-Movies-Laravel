<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovieRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {

        $movie = $this->route()->parameter('movie');  // obtenemos un parametro dado por la ruta(el modelo de movie ya cargado) este parametro llega del update()

        $rules = [
            'name' => 'required',
            'year' => 'required|digits:4|integer',
            'slug' => "required|unique:movies",
            'premier' => 'required|in:1,2',  // premier es requerido y solo puede tomar el valor 1 y el valor de 2
            'img_cover' => 'required|image',
            'img_slide' => 'required|image',
            'trailer' => 'required|url',
            'categories' => 'required',
            'extract' => 'required',
            'description' => 'required'
        ];

        if ($movie) {
            $rules['slug'] = "required|unique:movies,slug,$movie->id";
            $rules['img_cover'] = 'nullable';
            $rules['img_slide'] = 'nullable';
        }

        return $rules;
    }
}
