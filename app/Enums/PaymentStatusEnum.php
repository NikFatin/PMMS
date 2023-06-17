<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Completed()
 * @method static static Failed()
 */
final class PaymentStatusEnum extends Enum
{
    const Completed = 0;
    const Failed = 1;
}
