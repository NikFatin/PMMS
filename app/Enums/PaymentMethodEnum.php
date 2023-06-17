<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Cash()
 * @method static static InstantTransfer()
 */
final class PaymentMethodEnum extends Enum
{
    const Cash = 0;
    const InstantTransfer = 1;
}
