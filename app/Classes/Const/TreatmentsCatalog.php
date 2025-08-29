<?php

namespace App\Classes\Const;

final class TreatmentsCatalog {

    public const TREATMENTS = [
        ['nombre' => 'Limpieza dental', 'categoria' => 'Preventivo'],
        ['nombre' => 'Selladores de fosas y fisuras', 'categoria' => 'Preventivo'],
        ['nombre' => 'Aplicación de flúor', 'categoria' => 'Preventivo'],
        ['nombre' => 'Examen dental de rutina', 'categoria' => 'Preventivo'],
        ['nombre' => 'Radiografía de control', 'categoria' => 'Preventivo'],

        ['nombre' => 'Empaste simple', 'categoria' => 'Restaurativo'],
        ['nombre' => 'Empaste múltiple', 'categoria' => 'Restaurativo'],
        ['nombre' => 'Corona dental', 'categoria' => 'Restaurativo'],
        ['nombre' => 'Puente dental', 'categoria' => 'Restaurativo'],
        ['nombre' => 'Incrustación / Onlay', 'categoria' => 'Restaurativo'],

        ['nombre' => 'Tratamiento de conducto (endodoncia)', 'categoria' => 'Endodoncia'],
        ['nombre' => 'Retratamiento de conducto', 'categoria' => 'Endodoncia'],
        ['nombre' => 'Apicectomía', 'categoria' => 'Endodoncia'],

        ['nombre' => 'Extracción simple', 'categoria' => 'Cirugía'],
        ['nombre' => 'Extracción quirúrgica', 'categoria' => 'Cirugía'],
        ['nombre' => 'Implante dental', 'categoria' => 'Cirugía'],
        ['nombre' => 'Injerto óseo', 'categoria' => 'Cirugía'],
        ['nombre' => 'Cirugía periodontal', 'categoria' => 'Cirugía'],

        ['nombre' => 'Ortodoncia metálica', 'categoria' => 'Ortodoncia'],
        ['nombre' => 'Ortodoncia estética', 'categoria' => 'Ortodoncia'],
        ['nombre' => 'Ortodoncia lingual', 'categoria' => 'Ortodoncia'],
        ['nombre' => 'Alineadores transparentes', 'categoria' => 'Ortodoncia'],
        ['nombre' => 'Retenedores', 'categoria' => 'Ortodoncia'],

        ['nombre' => 'Limpieza profunda / Raspado y alisado radicular', 'categoria' => 'Periodontal'],
        ['nombre' => 'Tratamiento de gingivitis', 'categoria' => 'Periodontal'],
        ['nombre' => 'Cirugía periodontal avanzada', 'categoria' => 'Periodontal'],

        ['nombre' => 'Blanqueamiento dental', 'categoria' => 'Estético'],
        ['nombre' => 'Carillas dentales', 'categoria' => 'Estético'],
        ['nombre' => 'Remodelado de encías (gingivoplastia)', 'categoria' => 'Estético'],

        ['nombre' => 'Odontopediatría básica', 'categoria' => 'Especializado'],
        ['nombre' => 'Prótesis dentales removibles', 'categoria' => 'Especializado'],
        ['nombre' => 'Férula para bruxismo', 'categoria' => 'Especializado'],
        ['nombre' => 'Odontología de urgencia', 'categoria' => 'Especializado'],
    ];

}