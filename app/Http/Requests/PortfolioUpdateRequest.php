<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PortfolioUpdateRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return Auth::check();
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, mixed>
	 */
	public function rules()
	{
		return [
			'name' => 'required|string|max:255',
			'year_created' => 'required|numeric|digits:4',
			'photos' => 'nullable|array',
			'photos.*' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048'
		];
	}
}
