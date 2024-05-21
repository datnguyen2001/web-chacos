<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class OrderDeliveryStatus extends Enum
{
    const CANCEL = -1;
    const PENDING = 0;
    const ACCEPTED = 1;
    const DELIVERED = 2;
    const COMPLETE = 3;
}
