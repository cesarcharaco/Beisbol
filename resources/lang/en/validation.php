<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'El :attribute debe ser aceptado.',
    'active_url'           => 'La :attribute no es una URL válida.',
    'after'                => 'La :attribute debe ser una fecha despues de :date.',
    'after_or_equal'       => 'La :attribute debe ser una fecha despues o igual de :date.',
    'alpha'                => 'El/La :attribute puede contener unicamente letras.',
    'alpha_dash'           => 'El/La :attribute puede contener unicamente letras, numeros, y guiones.',
    'alpha_num'            => 'El :attribute solo puede contener letras y numeros.',
    'array'                => 'El :attribute debe ser un arreglo.',
    'before'               => 'La :attribute debe ser una fecha antes de :date.',
    'before_or_equal'      => 'El :attribute debe ser una fecha anterior o igual a :date.',
    'between'              => [
        'numeric' => 'El :attribute debe estar entre :min y :max.',
        'file'    => 'El :attribute debe estar entre :min y :max kilobytes.',
        'string'  => 'El :attribute debe estar entre :min y :max caractéres.',
        'array'   => 'El :attribute debe tener entre :min y :max artículos.',
    ],
    'boolean'              => 'El campo :attribute debe ser verdadero o falso.',
    'confirmed'            => 'La :attribute confirmación no coinciden.',
    'date'                 => 'La :attribute fecha no es válida.',
    'date_format'          => 'El :attribute formato no coinciden :format.',
    'different'            => 'El :attribute y :other deben de ser diferente.',
    'digits'               => 'El :attribute debe ser :digits digitos.',
    'digits_between'       => 'El :attribute debe estar entre :min y :max digitos.',
    'dimensions'           => 'El :attribute tiene dimensiones de imagen no válidas.',
    'distinct'             => 'El campo :attribute tiene un valor duplicado.',
    'email'                => 'La :attribute dirección de correo electrónico debe de ser válida.',
    'exists'               => 'Lo que selecciono :attribute no es valido.',
    'file'                 => 'El :attribute debe ser archivo.',
    'filled'               => 'El :attribute debe de tener un valor.',
    'image'                => 'El :attribute debe ser una imagen.',
    'in'                   => 'El seleccionado :attribute no es válido.',
    'in_array'             => 'El campo :attribute no existe en :other.',
    'integer'              => 'El :attribute debe ser entero.',
    'ip'                   => 'La :attribute dirección de IP debe ser válida.',
    'ipv4'                 => 'La :attribute dirección IPv4 debe de ser válida.',
    'ipv6'                 => 'La :attribute dirección IPv6 debe de ser válida.',
    'json'                 => 'La :attribute debe ser una cadena JSON válida.',
    'max'                  => [
        'numeric' => 'El :attribute no puede ser mayor :max.',
        'file'    => 'El :attribute no puede ser mayor :max kilobytes.',
        'string'  => 'El :attribute no puede ser mayor que :max caractéres.',
        'array'   => 'El :attribute puede no tener mas de :max artículos.',
    ],
    'mimes'                => 'El :attribute debe ser un archivo de tipo: :values.',
    'mimetypes'            => 'El :attribute debe ser un archivo de tipo: :values.',
    'min'                  => [
        'numeric' => 'El :attribute al menos debe ser :min.',
        'file'    => 'El :attribute al menos debe ser :min kilobytes.',
        'string'  => 'El :attribute al menos debe ser :min cara.',
        'array'   => 'El :attribute debe de tener por lo menos :min artículos.',
    ],
    'not_in'               => 'El seleccionado :attribute es invalido.',
    'numeric'              => 'El :attribute tiene que ser un número.',
    'present'              => 'El :attribute campo debe de estar presente.',
    'regex'                => 'El :attribute el formato no es válido',
    'required'             => 'El :attribute se requiere campo.',
    'required_if'          => 'El campo :attribute es necesario cuando :other es :value.',
    'required_unless'      => 'El campo :attribute es obligatorio al menos que :other es en :values.',
    'required_with'        => 'El campo :attribute es necesario cuando :values esta presente.',
    'required_with_all'    => 'El campo :attribute es necesesario cuando :values esta presente.',
    'required_without'     => 'El campo :attribute es necesesario cuando :values no es presente.',
    'required_without_all' => 'El campo :attribute es requerido cuando ninguno :values están presente.',
    'same'                 => 'El :attribute y :other debe marcarse.',
    'size'                 => [
        'numeric' => 'El :attribute debe ser :size.',
        'file'    => 'El :attribute debe ser :size kilobytes.',
        'string'  => 'El :attribute debe ser :size caractéres.',
        'array'   => 'El :attribute debe contener :size artículos.',
    ],
    'string'               => 'El :attribute debe ser una cadena.',
    'timezone'             => 'El :attribute debe ser una zona válida.',
    'unique'               => 'El :attribute ya se ha tomado.',
    'uploaded'             => 'El :attribute no se puede subir.',
    'url'                  => 'El :attribute el formato no es válido.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
