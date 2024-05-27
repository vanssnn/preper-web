<?php

use App\Models\TrMentoringSchedule;

if (!function_exists('generateUniqueCode')) {
    function generateUniqueCode()
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $charactersLength = strlen($characters);
        $uniqueCode = '';

        for ($i = 0; $i < 4; $i++) {
            $uniqueCode .= $characters[rand(0, $charactersLength - 1)];
        }

        return $uniqueCode;
    }
}

if (!function_exists('getUniqueCode')) {
    function getUniqueCode()
    {
        do {
            $uniqueCode = generateUniqueCode();
        } while (TrMentoringSchedule::where('UniqueCode', $uniqueCode)->exists());

        return $uniqueCode;
    }
}
