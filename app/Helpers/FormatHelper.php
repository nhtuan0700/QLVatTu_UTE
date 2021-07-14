<?php
namespace App\Helpers;

use Carbon\Carbon;

class FormatHelper
{
    public function formatDateTime($date)
    {
        return Carbon::parse($date)->format('d/m/Y H:i:s');
    }

    public function formatDate($date)
    {
        return Carbon::parse($date)->format('d/m/Y');
    }
}
