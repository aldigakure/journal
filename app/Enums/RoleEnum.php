<?php

namespace App\Enums;

enum RoleEnum: string
{
    case ADMIN = 'admin';
    case TEACHER = 'teacher';
    
    public function label(): string
    {
        return match($this) {
            RoleEnum::ADMIN => 'Admin',
            RoleEnum::TEACHER => 'Guru',
        };
    }
}
