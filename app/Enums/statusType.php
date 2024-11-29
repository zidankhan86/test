<?php

namespace App\Enums;

enum statusType: string
{
    case IN_PROGRESS = 'in_progress';
    case IN_REVIEW = 'in_review';
    case CONFIRMED = 'confirmed';
    case PAID = 'paid';
}
