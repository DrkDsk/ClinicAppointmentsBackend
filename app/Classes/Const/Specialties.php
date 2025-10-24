<?php

namespace App\Classes\Const;

final class Specialties
{
    public const GENERAL_DENTISTRY = 'Odontología general';
    public const ORTHODONTICS = 'Ortodoncia';
    public const ENDODONTICS = 'Endodoncia';
    public const PERIODONTICS = 'Periodoncia';
    public const ORAL_AND_MAXILLOFACIAL_SURGERY = 'Cirugía oral y maxilofacial';
    public const PROSTHODONTICS = 'Prostodoncia';
    public const PEDIATRIC_DENTISTRY = 'Odontopediatría';
    public const COSMETIC_DENTISTRY = 'Odontología estética';
    public const IMPLANTOLOGY = 'Implantología';
    public const DENTAL_RADIOLOGY = 'Radiología dental';

    public static function all(): array
    {
        return [
            self::GENERAL_DENTISTRY,
            self::ORTHODONTICS,
            self::ENDODONTICS,
            self::PERIODONTICS,
            self::ORAL_AND_MAXILLOFACIAL_SURGERY,
            self::PROSTHODONTICS,
            self::PEDIATRIC_DENTISTRY,
            self::COSMETIC_DENTISTRY,
            self::IMPLANTOLOGY,
            self::DENTAL_RADIOLOGY,
        ];
    }
}
