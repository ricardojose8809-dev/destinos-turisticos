<?php

namespace App\Models;

class Lugar
{
    protected static string $path = 'data/lugares.json';

    public static function all(): array
    {
        $json = \Storage::exists(self::$path)
            ? \Storage::get(self::$path)
            : '[]';

        return json_decode($json, true) ?? [];
    }

    public static function find(int $id): ?array
    {
        $lugares = self::all();

        foreach ($lugares as $lugar) {
            if ((int) $lugar['id'] === $id) {
                return $lugar;
            }
        }

        return null;
    }
}