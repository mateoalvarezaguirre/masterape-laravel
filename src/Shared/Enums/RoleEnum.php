<?php

namespace Src\Shared\Enums;

enum RoleEnum: int
{
    case REGULAR     = 1;
    case ADMIN       = 2;
    case SUPER_ADMIN = 3;
}
