<?php

namespace App\Http\Controllers\Api\V1\Payment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Payment\PaymentRequest;
use App\Models\Transaction;
use App\Models\UserAccount;
use Symfony\Component\HttpFoundation\Response;

class PaymentCrudController extends Controller
{
    /**
     * User's transaction create.
     *
     * @param PaymentRequest $request
     * @return Response
     */
    public function store(PaymentRequest $request): Response
    {
        Transaction::create($request->validated());
        // user account amount changed after transaction creation. Please check Transaction model.
        return response()->noContent(Response::HTTP_OK);
    }
}
