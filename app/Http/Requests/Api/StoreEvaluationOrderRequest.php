<?php

namespace App\Http\Requests\Api;

use App\Repositories\Contracts\IOrderRepository;
use Illuminate\Foundation\Http\FormRequest;

class StoreEvaluationOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $client = auth()->user();

        if(!$client) {
            return false;
        }

        $order = app(IOrderRepository::class)->getOrderByIdentify($this->identifyOrder);

        if(!$order) {
            return false;
        }

        return $client->id == $order->client_id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'stars' => ['required', 'integer', 'min:1', 'max:5'],
            'comment' => ['nullable', 'min:3', 'max:1000'],
        ];
    }
}
