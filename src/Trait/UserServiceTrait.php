<?php

namespace App\Trait;

use App\Service\UserService;

trait UserServiceTrait
{
    private UserService $userService;

    public function __construct(UserService $userService) {
        $this->userService = $userService;
    }
}
