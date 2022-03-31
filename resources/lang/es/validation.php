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

    'accepted'             => 'El campo :attribute debe ser aceptado.',
    'active_url'           => 'El campo :attribute no es una URL válida.',
    'after'                => 'El campo :attribute debe ser una fecha posterior a :date.',
    'after_or_equal'       => 'El campo :attribute debe ser una fecha posterior o igual a :date.',
    'alpha'                => 'El campo :attribute sólo puede contener letras.',
    'alpha_dash'           => 'El campo :attribute sólo puede contener letras, números y guiones (a-z, 0-9, -_).',
    'alpha_num'            => 'El campo :attribute sólo puede contener letras y números.',
    'array'                => 'El campo :attribute debe ser un array.',
    //'before'               => 'El campo :attribute debe ser una fecha anterior a :date.',
    'before'               => 'El campo :attribute debe ser una hora anterio a :date.',
    'before_or_equal'      => 'El campo :attribute debe ser una fecha anterior o igual a :date.',
    'between'              => [
        'numeric' => 'El campo :attribute debe ser un valor entre :min y :max.',
        'file'    => 'El archivo :attribute debe pesar entre :min y :max kilobytes.',
        'string'  => 'El campo :attribute debe contener entre :min y :max caracteres.',
        'array'   => 'El campo :attribute debe contener entre :min y :max elementos.',
        'date'    => 'El campo :attribute debe estar entre :min y :max .',
    ],
    'boolean'              => 'El campo :attribute debe ser verdadero o falso.',
    'confirmed'            => 'El campo Confirmación de :attribute no coincide.',
    'date'                 => 'El campo :attribute no corresponde con una fecha válida.',
    'date_equals'          => 'El campo :attribute debe ser igual a :date.',
    //'date_format'          => 'El campo :attribute no corresponde con el formato de fecha :format.',
    'date_format'          => 'El campo :attribute no puede estar vacío',
    'different'            => 'Los campos :attribute y :other han de ser diferentes.',
    'digits'               => 'El campo :attribute debe ser un número de :digits dígitos.',
    'digits_between'       => 'El campo :attribute debe contener entre :min y :max dígitos.',
    'dimensions'           => 'El campo :attribute tiene dimensiones inválidas.',
    'distinct'             => 'El campo :attribute tiene un valor duplicado.',
    'email'                => 'El campo :attribute no corresponde con una dirección de e-mail válida.',
    'ends_with'            => 'El campo :attribute debe finalizar con uno de los siguientes: :values.',
    'exists'               => 'El campo :attribute seleccionado no es válido.',
    'file'                 => 'El campo :attribute debe ser un archivo.',
    'filled'               => 'El campo :attribute es obligatorio.',
    'gt' => [
        'numeric' => 'The :attribute must be greater than :value.',
        'file' => 'The :attribute must be greater than :value kilobytes.',
        'string' => 'The :attribute must be greater than :value characters.',
        'array' => 'The :attribute must have more than :value items.',
    ],
    'gte' => [
        'numeric' => 'The :attribute must be greater than or equal :value.',
        'file' => 'The :attribute must be greater than or equal :value kilobytes.',
        'string' => 'The :attribute must be greater than or equal :value characters.',
        'array' => 'The :attribute must have :value items or more.',
    ],
    'image'                => 'El campo :attribute debe ser una imagen.',
    'in'                   => 'El campo :attribute debe ser igual a alguno de estos valores :values.',
    'in_array'             => 'El campo :attribute no existe en :other.',
    'integer'              => 'El campo :attribute debe ser un número entero.',
    'ip'                   => 'El campo :attribute debe ser una dirección IP válida.',
    'ipv4'                 => 'El campo :attribute debe ser una dirección IPv4 válida.',
    'ipv6'                 => 'El campo :attribute debe ser una dirección IPv6 válida.',
    'json'                 => 'El campo :attribute debe ser una cadena de texto JSON válida.',
    'lt' => [
        'numeric' => 'The :attribute must be less than :value.',
        'file' => 'The :attribute must be less than :value kilobytes.',
        'string' => 'The :attribute must be less than :value characters.',
        'array' => 'The :attribute must have less than :value items.',
    ],
    'lte' => [
        'numeric' => 'The :attribute must be less than or equal :value.',
        'file' => 'The :attribute must be less than or equal :value kilobytes.',
        'string' => 'The :attribute must be less than or equal :value characters.',
        'array' => 'The :attribute must not have more than :value items.',
    ],
    'max'                  => [
        'numeric' => ':attribute debe ser :max como máximo.',
        'file'    => 'El archivo :attribute debe pesar :max kilobytes como máximo.',
        'string'  => ':attribute debe contener :max caracteres como máximo.',
        'array'   => ':attribute debe contener :max elementos como máximo.',

        'date_format'=> ' :attribute debe ser anterior a :max',
    ],
    'mimes'                => 'El campo :attribute debe ser un archivo de tipo :values.',
    'mimetypes'            => 'El campo :attribute debe ser un archivo de tipo :values.',
    'min'                  => [
        'numeric' => ':attribute debe tener al menos :min.',
        'file'    => ':attribute debe pesar al menos :min kilobytes.',
        'string'  => ':attribute debe contener al menos :min caracteres.',
        'array'   => ':attribute debe contener al menos :min elementos.',

        'date_format'=> ' :attribute debe ser posterior a :min',
    ],
    'not_in'               => 'El campo :attribute seleccionado es inválido.',
    'not_regex' => 'The :attribute format is invalid.',
    'numeric'              => 'El campo :attribute debe ser un número.',
    'password' => 'The password is incorrect.',
    'present'              => 'El campo :attribute debe estar presente.',
    'regex'                => 'El formato del campo :attribute es inválido.',
    'required'             => 'El campo :attribute es obligatorio.',
    'required_if'          => 'El campo :attribute es obligatorio. ',
    'required_unless'      => 'El campo :attribute es requerido a menos que :other se encuentre en :values.',
    'required_with'        => 'El campo :attribute es obligatorio cuando :values está presente.',
    'required_with_all'    => 'El campo :attribute es obligatorio cuando :values está presente.',
    'required_without'     => 'El campo :attribute es obligatorio cuando :values no está presente.',
    'required_without_all' => 'El campo :attribute es obligatorio cuando ninguno de los campos :values está presente.',
    'same'                 => 'Los campos :attribute y :other deben coincidir.',
    'size'                 => [
        'numeric' => 'El campo :attribute debe ser :size.',
        'file'    => 'El archivo :attribute debe pesar :size kilobytes.',
        'string'  => 'El campo :attribute debe contener :size caracteres.',
        'array'   => 'El campo :attribute debe contener :size elementos.',
    ],
    'starts_with' => 'The :attribute must start with one of the following: :values.',
    'string'               => 'El campo :attribute debe contener sólo caracteres.',
    'timezone'             => 'El campo :attribute debe contener una zona válida.',
    'unique'               => 'El elemento :attribute ya está en uso.',
    'uploaded'             => 'El elemento :attribute falló al subir.',
    'url'                  => 'El formato de :attribute no corresponde con el de una URL válida.',
    'uuid' => 'The :attribute must be a valid UUID.',

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

    'attributes' => [
        
    
        'usuario_autorizo' => 'Autorizado por',
        'fecha_autorizacion_responsable' => 'Fecha autorización',
        'autorizacion_responsable' => 'Autorización del responsable',
        'beforeModification' => 'Antes del cambio',
        'afterModification' => 'Después del cambio',
        'fecha_hora_modificacion' => 'Fecha y hora de modificación',
        'create' => 'Crear',
        'save' => 'Guardar',
        'cancel' => 'Cancelar',
        'continue' => 'Continuar',
        'login' => 'Acceso',
        'user' => 'Usuario',
        'createdAt' => 'Fecha de creación',
        'password' => 'Contraseña',
        'titleUsers' => 'Gestión de usuarios',
        'titleUser' => 'Usuario',
        'sessionUser' => 'Usuario de la sesión',
        'description' => 'Descripción',
        'name' => 'Nombre Usuario',
        'email' => 'Correo electrónico',
        're-password' => 'Confirmación de contraseña',
        'role' => 'Perfil',
        'apellidos' => 'Apellidos',
        'date' => 'Fecha',
        'nombre'=> 'Nombre',
        'correo' => 'Email',
        'nuevo' => 'Nuevo',
        'image'=>'Imagen',
        'title'=>'Título',
        'titulo'=>'Título',
        'sala_id'=>'Sala',
        'end'=> 'Hora Fin',
        'start'=> 'Hora Inicio',
       
        
       
    ],

    'messages' => [
        'updateSuccess' => 'Registro actualizado!',
        'deleteSuccess' => 'Registro eliminado!',
        'deleteError' => 'El registro no pudo ser eliminado!',
        'deleteNotPossible' => 'El usuario no se puede borrar ya que tiene registros asociados',
        'createSuccess' => 'Registro creado!',
        'uploadSuccess' => 'Los ficheros se han subido con éxito!',
        'uploadFailed' => 'Los ficheros no se han subido!',
        'badFileFormat' => 'El formato del fichero no es .XLS ó .XLSX.',
        'createFailed' => 'Hora y sala ya estan ocupadas',
        'dayFailed' => 'ya no se puede reservar en esta fecha',
        'hoursFailed' => 'el horario de reserva es de 08:30 a 22:30'
    ]

];
