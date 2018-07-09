<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Music;

class StoreMusic extends FormRequest
{

    protected $music;

    /**
     * StoreMusic constructor.
     * @param Music $music
     */
    public function __construct(Music $music)
    {
        $this->music = $music;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'source' => [
                'required',
                'url',
                'regex:/^(https?\:\/\/)?(www\.youtube\.com|youtu\.?be)\/.+$/',
            ],
            'type' => ['required',
                Rule::in($this->music->getTypes()),
            ],
            'weight' => 'numeric'
        ];
    }

    public function messages()
    {
        return [
            'source.required' => 'Link is required',
            'source.url' => 'Link is required',
            'source.regex' => 'Link does not match type',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {

            $code = $this->music->parseCode($validator->getData()['source']);

            if (!$code) {
                $validator->errors()->add('source', 'Could not parse id from link');
            }

        });
    }
}
