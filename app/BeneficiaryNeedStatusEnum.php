<?php

namespace App;

enum BeneficiaryNeedStatusEnum: string
{
    case Pending = "pending";
    case Approved = "approved";
    case Rejected = "rejected";

    public static function labels() {
        return [
            self::Pending->value => __('pending'),
            self::Approved->value => __('approved'),
            self::Rejected->value => __('rejected')
        ];
    }
}
