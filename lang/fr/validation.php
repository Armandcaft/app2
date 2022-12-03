<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Lignes du langage de validation
    |--------------------------------------------------------------------------
    |
    | Les lignes de langage suivantes contiennent les messages d'erreur par défaut utilisés par le
    | la classe validateur. Certaines de ces règles ont plusieurs versions, comme
    | comme les règles de taille. N'hésitez pas à modifier chacun de ces messages ici.
    |
    */

    'accepted' => 'L\'attribut :doit être accepté.',
    'accepted_if' => 'L\' :attribute doit être accepté lorsque :other est :value.',
    'active_url' => 'L\' :attribute n\'est pas une URL valide',
    'after' => 'L\' :attribute doit être une date postérieure à :date.',
    'after_or_equal' => 'L\' :attribute doit être une date postérieure ou égale à :date.',
    'alpha' => 'L\' :attribute doit contenir uniquement des lettres',
    'alpha_dash' => 'L\' :attribute doit contenir uniquement des lettres, des chiffres, des tirets et des caractères de soulignement',
    'alpha_num' => 'L\' :attribute ne doit contenir que des lettres et des chiffres',
    'array' => 'L\' :attribute doit être un tableau',
    'before' => 'L\' :attribute doit être une date antérieure à :date.',
    'before_or_equal' => 'L\' :attribute doit être une date antérieure ou égale à :date.',
    'between' => [
        'array' => 'L\' :attribute doit avoir entre :min et :max éléments.',
        'file' => 'L\' :attribute doit avoir une taille comprise entre :min et :max ko.',
        'numeric' => 'L\' :attribute doit être compris entre :min et :max.',
        'string' => 'L\' :attribute doit être compris entre :min et :max caractères.',
    ],
    'boolean' => 'Le champ :attribute doit être vrai ou faux',
    'confirmed' => 'La confirmation de l\' :attribute ne correspond pas.',
    'current_password' => 'Le mot de passe est incorrect.',
    'date' => 'L\' :attribut n\'est pas une date valide',
    'date_equals' => 'L\' :attribute doit être une date égale à :date.',
    'date_format' => 'L\' :attribute ne correspond pas au format :format.',
    'declined' => 'L\' :attribute doit être refusé',
    'declined_if' => 'L\' :attribute doit être refusé lorsque :other est :value.',
    'different' => 'L\' :attribute et :other doivent être différents',
    'digits' => 'L\' :attribute doit être :digits digits.',
    'digits_between' => 'L\' :attribute doit être compris entre :min et :max digits.',
    'dimensions' => 'L\' :attribute a des dimensions d\'image non valides',
    'distinct' => 'Le champ :attribute a une valeur en double',
    'doesnt_end_with" => "L\' :attribute ne peut pas se terminer par l\'un des éléments suivants : :values : :values.',
    'doesnt_start_with" => "L\' :attribute ne peut pas commencer par l\'un des éléments suivants : :values.',
    'email' => 'L\' :attribut doit être une adresse électronique valide.',
    'ends_with' => 'L\' :attribute doit se terminer par l\'une des valeurs suivantes : :values.',
    'enum' => 'L\' :attribute sélectionné n\'est pas valide.',
    'exists' => 'L\' :attribute sélectionné n\'est pas valide.',
    'file' => 'L\' :attribute doit être un fichier.',
    'filled' => 'Le champ :attribute doit avoir une valeur.',
    'gt' => [
        'array' => 'L\' :attribute doit avoir plus de :value items.',
        'file' => 'L\' :attribute doit être supérieur à :value kilobytes.',
        'numeric' => 'L\' :attribute doit être supérieur à :value.',
        'string' => 'L\' :attribute doit être supérieur à :value caractères.',
    ],
    'gte' => [
        'array' => 'L\' :attribute doit avoir des éléments :value ou plus.',
        'file' => 'L\' :attribute doit être supérieur ou égal à :value kilobytes.',
        'numeric' => 'L\' :attribute doit être supérieur ou égal à :value.',
        'string' => 'L\' :attribute doit être supérieur ou égal à :value caractères.',
    ],
    'image' => 'The :attribute must be an image.',
    'in' => 'The selected :attribute is invalid.',
    'in_array' => 'The :attribute field does not exist in :other.',
    'integer' => 'The :attribute must be an integer.',
    'ip' => 'The :attribute must be a valid IP address.',
    'ipv4' => 'The :attribute must be a valid IPv4 address.',
    'ipv6' => 'The :attribute must be a valid IPv6 address.',
    'json' => 'The :attribute must be a valid JSON string.',
    'lowercase' => 'The :attribute must be lowercase.',
    'lt' => [
        'array' => 'The :attribute must have less than :value items.',
        'file' => 'The :attribute must be less than :value kilobytes.',
        'numeric' => 'The :attribute must be less than :value.',
        'string' => 'The :attribute must be less than :value characters.',
    ],
    'lte' => [
        'array' => 'The :attribute must not have more than :value items.',
        'file' => 'The :attribute must be less than or equal to :value kilobytes.',
        'numeric' => 'The :attribute must be less than or equal to :value.',
        'string' => 'The :attribute must be less than or equal to :value characters.',
    ],
    'mac_address' => 'The :attribute must be a valid MAC address.',
    'max' => [
        'array' => 'The :attribute must not have more than :max items.',
        'file' => 'The :attribute must not be greater than :max kilobytes.',
        'numeric' => 'The :attribute must not be greater than :max.',
        'string' => 'The :attribute must not be greater than :max characters.',
    ],
    'max_digits' => 'The :attribute must not have more than :max digits.',
    'mimes' => 'The :attribute must be a file of type: :values.',
    'mimetypes' => 'The :attribute must be a file of type: :values.',
    'min' => [
        'array' => 'The :attribute must have at least :min items.',
        'file' => 'The :attribute must be at least :min kilobytes.',
        'numeric' => 'The :attribute must be at least :min.',
        'string' => 'The :attribute must be at least :min characters.',
    ],
    'min_digits' => 'The :attribute must have at least :min digits.',
    'multiple_of' => 'The :attribute must be a multiple of :value.',
    'not_in' => 'The selected :attribute is invalid.',
    'not_regex' => 'The :attribute format is invalid.',
    'numeric' => 'The :attribute must be a number.',
    'password' => [
        'letters' => 'The :attribute must contain at least one letter.',
        'mixed' => 'The :attribute must contain at least one uppercase and one lowercase letter.',
        'numbers' => 'The :attribute must contain at least one number.',
        'symbols' => 'The :attribute must contain at least one symbol.',
        'uncompromised' => 'The given :attribute has appeared in a data leak. Please choose a different :attribute.',
    ],
    'present' => 'The :attribute field must be present.',
    'prohibited' => 'The :attribute field is prohibited.',
    'prohibited_if' => 'The :attribute field is prohibited when :other is :value.',
    'prohibited_unless' => 'The :attribute field is prohibited unless :other is in :values.',
    'prohibits' => 'The :attribute field prohibits :other from being present.',
    'regex' => 'The :attribute format is invalid.',
    'required' => 'The :attribute field is required.',
    'required_array_keys' => 'The :attribute field must contain entries for: :values.',
    'required_if' => 'The :attribute field is required when :other is :value.',
    'required_if_accepted' => 'The :attribute field is required when :other is accepted.',
    'required_unless' => 'The :attribute field is required unless :other is in :values.',
    'required_with' => 'The :attribute field is required when :values is present.',
    'required_with_all' => 'The :attribute field is required when :values are present.',
    'required_without' => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same' => 'The :attribute and :other must match.',
    'size' => [
        'array' => 'The :attribute must contain :size items.',
        'file' => 'The :attribute must be :size kilobytes.',
        'numeric' => 'The :attribute must be :size.',
        'string' => 'The :attribute must be :size characters.',
    ],
    'starts_with' => 'The :attribute must start with one of the following: :values.',
    'string' => 'The :attribute must be a string.',
    'timezone' => 'The :attribute must be a valid timezone.',
    'unique' => 'The :attribute has already been taken.',
    'uploaded' => 'The :attribute failed to upload.',
    'uppercase' => 'The :attribute must be uppercase.',
    'url' => 'The :attribute must be a valid URL.',
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
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
