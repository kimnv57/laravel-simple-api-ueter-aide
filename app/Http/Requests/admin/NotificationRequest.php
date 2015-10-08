<?php namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class NotificationRequest extends FormRequest {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
            'title' => 'required|min:5|unique:notification',
            'content' => 'required|min:15',
            'package_id' => 'required'
		];
	}

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

}