<?php

namespace App\Classes\Const;

final class TreatmentsCatalog
{

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


    public const TREATMENTS_PROCEDURES = [
        'Limpieza dental' => [
            'Profilaxis de placa y sarro',
            'Pulido dental',
            'Aplicación de flúor'
        ],
        'Selladores de fosas y fisuras' => [
            'Limpieza de surcos',
            'Aplicación del sellador',
            'Fotopolimerización'
        ],
        'Aplicación de flúor' => [
            'Limpieza previa',
            'Aplicación de flúor tópico',
            'Instrucciones post-aplicación'
        ],
        'Examen dental de rutina' => [
            'Evaluación visual',
            'Palpación de encías',
            'Revisión de mordida y articulación',
            'Revisión de piezas dentales'
        ],
        'Radiografía de control' => [
            'Preparación del paciente',
            'Colocación de película o sensor',
            'Toma de radiografía',
            'Revisión de imágenes'
        ],

        'Empaste simple' => [
            'Anestesia local',
            'Remoción de caries',
            'Colocación de material restaurador',
            'Pulido final'
        ],
        'Empaste múltiple' => [
            'Anestesia local',
            'Remoción de caries extensas',
            'Colocación de restauraciones múltiples',
            'Pulido y ajuste oclusal'
        ],
        'Corona dental' => [
            'Preparación del diente',
            'Toma de impresión',
            'Colocación de corona provisional',
            'Colocación de corona definitiva'
        ],
        'Puente dental' => [
            'Preparación de dientes pilares',
            'Toma de impresión',
            'Prueba del puente',
            'Cementado definitivo'
        ],
        'Incrustación / Onlay' => [
            'Preparación del diente',
            'Toma de impresión',
            'Fabricación del onlay',
            'Colocación y cementado'
        ],

        'Tratamiento de conducto (endodoncia)' => [
            'Anestesia local',
            'Apertura de cámara pulpar',
            'Limpieza y modelado de conductos',
            'Obturación y sellado del conducto',
            'Restauración final'
        ],
        'Retratamiento de conducto' => [
            'Anestesia local',
            'Apertura de conducto previo',
            'Remoción de material antiguo',
            'Limpieza y modelado',
            'Obturación y sellado'
        ],
        'Apicectomía' => [
            'Anestesia local',
            'Incisión y exposición de ápice',
            'Resección del ápice',
            'Suturas y control postoperatorio'
        ],

        'Extracción simple' => [
            'Anestesia local',
            'Aflojamiento del diente',
            'Extracción',
            'Suturas si necesario'
        ],
        'Extracción quirúrgica' => [
            'Anestesia local',
            'Incisión y flap',
            'Extracción de diente retenido',
            'Suturas y control postoperatorio'
        ],
        'Implante dental' => [
            'Evaluación y planificación',
            'Colocación del implante',
            'Colocación de tornillo de cicatrización',
            'Colocación de corona definitiva'
        ],
        'Injerto óseo' => [
            'Preparación del sitio receptor',
            'Colocación de injerto',
            'Suturas y control postoperatorio'
        ],
        'Cirugía periodontal' => [
            'Incisión y acceso a tejido periodontal',
            'Limpieza de bolsas periodontales',
            'Suturas y control postoperatorio'
        ],

        'Ortodoncia metálica' => [
            'Colocación de brackets',
            'Colocación de arco inicial',
            'Ajustes periódicos',
            'Retiro de brackets'
        ],
        'Ortodoncia estética' => [
            'Colocación de brackets cerámicos',
            'Colocación de arco inicial',
            'Ajustes periódicos',
            'Retiro de brackets'
        ],
        'Ortodoncia lingual' => [
            'Colocación de brackets en cara interna',
            'Colocación de arco inicial',
            'Ajustes periódicos',
            'Retiro de brackets'
        ],
        'Alineadores transparentes' => [
            'Toma de impresiones o escaneo',
            'Fabricación de alineadores',
            'Entrega y ajuste inicial',
            'Control periódico de progreso'
        ],
        'Retenedores' => [
            'Evaluación final del tratamiento',
            'Fabricación de retenedores',
            'Entrega e instrucciones de uso'
        ],

        'Limpieza profunda / Raspado y alisado radicular' => [
            'Anestesia local',
            'Raspado de placa y cálculo',
            'Alisado radicular',
            'Instrucciones post-tratamiento'
        ],
        'Tratamiento de gingivitis' => [
            'Evaluación de encías',
            'Limpieza de placa y sarro',
            'Aplicación de gel antiséptico',
            'Instrucciones de higiene oral'
        ],
        'Cirugía periodontal avanzada' => [
            'Incisión y flap',
            'Limpieza profunda de bolsas',
            'Alisado radicular',
            'Suturas y control postoperatorio'
        ],

        'Blanqueamiento dental' => [
            'Evaluación inicial',
            'Protección de encías',
            'Aplicación de gel blanqueador',
            'Activación con luz',
            'Control post-tratamiento'
        ],
        'Carillas dentales' => [
            'Evaluación y planificación',
            'Preparación del diente',
            'Toma de impresiones',
            'Colocación de carilla provisional',
            'Cementado definitivo'
        ],
        'Remodelado de encías (gingivoplastia)' => [
            'Evaluación y planificación',
            'Marcado de tejido',
            'Resección o remodelado de encías',
            'Suturas y control postoperatorio'
        ],

        'Odontopediatría básica' => [
            'Evaluación dental infantil',
            'Aplicación de flúor',
            'Sellado de fosas y fisuras',
            'Educación en higiene oral'
        ],
        'Prótesis dentales removibles' => [
            'Toma de impresiones',
            'Registro de mordida',
            'Prueba de dientes',
            'Entrega de prótesis y ajustes'
        ],
        'Férula para bruxismo' => [
            'Evaluación y diagnóstico',
            'Toma de impresiones',
            'Fabricación de férula',
            'Entrega y ajuste'
        ],
        'Odontología de urgencia' => [
            'Evaluación rápida',
            'Control de dolor',
            'Control de hemorragia',
            'Tratamiento temporal de fractura o trauma'
        ]
    ];
}
