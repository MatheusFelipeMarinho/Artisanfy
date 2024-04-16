<?php

namespace App\Enums;

enum UserType: int
{
    case UserAdmin = 1;
    case UserListener = 2;
    case UserSinger = 3;

}
