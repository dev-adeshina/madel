<?php

namespace App\Http\Requests\Duffel;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use App\Domains\Duffel\Flight\DTOs\OfferRequestData;

class OfferRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'slices' => ['required', 'array', 'min:1'],

            'slices.*.origin' => ['required', 'string', 'size:3'],
            'slices.*.destination' => ['required', 'string', 'size:3'],
            'slices.*.departure_date' => ['required', 'date'],

            'slices.*.departure_time' => ['nullable', 'array'],
            'slices.*.departure_time.from' => ['nullable', 'date_format:H:i'],
            'slices.*.departure_time.to' => ['nullable', 'date_format:H:i'],

            'slices.*.arrival_time' => ['nullable', 'array'],
            'slices.*.arrival_time.from' => ['nullable', 'date_format:H:i'],
            'slices.*.arrival_time.to' => ['nullable', 'date_format:H:i'],

            'private_fares' => ['nullable', 'array'],

            'passengers' => ['required', 'array', 'min:1'],
            'passengers.*.family_name' => ['nullable', 'string'],
            'passengers.*.given_name' => ['nullable', 'string'],
            'passengers.*.age' => ['nullable', 'integer', 'min:0'],
            'passengers.*.fare_type' => ['nullable', 'string'],
            'passengers.*.type' => ['nullable', 'string'],

            'passengers.*.loyalty_programme_accounts' => ['nullable', 'array'],
            'passengers.*.loyalty_programme_accounts.*.account_number' => ['nullable', 'string'],
            'passengers.*.loyalty_programme_accounts.*.airline_iata_code' => ['nullable', 'string', 'size:2'],

            'max_connections' => ['nullable', 'integer', 'min:0'],
            'include_split_ticket' => ['nullable', 'boolean'],
            'cabin_class' => ['nullable', 'string'],

            'airline_credit_ids' => ['nullable', 'array'],
            'airline_credit_ids.*' => ['string'],
        ];
    }

    public function toDTO(): OfferRequestData
    {
        return OfferRequestData::fromArray(
            $this->validated()
        );
    }
}
