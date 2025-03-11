<?php

namespace App;

enum BeneficiaryNeedStatusEnum: string
{
    case Pending = "pending";
    case Approved = "approved";
    case Rejected = "rejected";
}
