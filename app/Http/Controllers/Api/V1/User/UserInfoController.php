<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserIndexResource;
use App\Http\Resources\UserAccount\UserAccountResource;
use App\Models\User;
use App\Models\UserAccount;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class UserInfoController extends Controller
{
    /**
     * Get all users.
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return UserIndexResource::collection(User::orderByDesc('id')->get());
    }

    /**
     * Show user's account and transactions info.
     *
     * @param UserAccount $userAccount
     * @return UserAccountResource
     */
    public function show(UserAccount $userAccount): UserAccountResource
    {
        return new UserAccountResource($userAccount);
    }
}
