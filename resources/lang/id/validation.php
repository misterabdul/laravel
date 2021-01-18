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

    'accepted' => ':attribute harus diterima.',
    'active_url' => ':attribute bukan merupakan URL yang valid.',
    'after' => ':attribute haruslah tanggal setelah :date.',
    'after_or_equal' => ':attribute haruslah tanggal setelah atau sama dengan :date.',
    'alpha' => ':attribute hanya boleh berisi huruf saja.',
    'alpha_dash' => ':attribute hanya boleh berisi huruf, angka, tanda hubung dan garis bawah.',
    'alpha_num' => ':attribute hanya boleh berisi huruf dan angka.',
    'aplha_num_space' => ':attribute hanya boleh berisi huruf, angka, dan spasi.',
    'array' => ':attribute hanya boleh berisi himpunan.',
    'before' => ':attribute haruslah tanggal sebelum :date.',
    'before_or_equal' => ':attribute haruslah tanggal sebelum atau sama dengan :date.',
    'between' => [
        'numeric' => ':attribute harus berada di antara :min dan :max.',
        'file' => ':attribute harus berada di antara ukuran :min dan :max kb.',
        'string' => ':attribute harus berisikan karakter di antara :min dan :max.',
        'array' => ':attribute harus memiliki :min and :max item.',
    ],
    'boolean' => ':attribute hanya boleh berisi true (benar) atau false (salah).',
    'confirmed' => ':attribute konfirmasi tidak cocok.',
    'date' => ':attribute bukanlah tanggal yang valid.',
    'date_equals' => ':attribute haruslah tanggal yang sama dengan :date.',
    'date_format' => ':attribute tidak sesuai dengan format :format.',
    'different' => ':attribute dan :other tidak boleh sama.',
    'digits' => ':attribute harus berisi sebanyak :digits digit.',
    'digits_between' => ':attribute harus berisi di antara :min dan :max digit.',
    'dimensions' => ':attribute memiliki dimensi gambar yang tidak valid.',
    'distinct' => ':attribute berisikan nilai yang duplikat.',
    'email' => ':attribute harus berisikan alamat email yang valid.',
    'ends_with' => ':attribute harus diakhiri dengan: :values.',
    'exists' => ':attribute yang dipilih tidak valid.',
    'file' => ':attribute haruslah file.',
    'filled' => ':attribute harus diisi.',
    'gt' => [
        'numeric' => ':attribute harus lebih besar dari :value.',
        'file' => ':attribute harus berukuran lebih besar dari :value kb.',
        'string' => ':attribute harus berisikan lebih dari :value karakter.',
        'array' => ':attribute harus memiliki lebih dari :value item.',
    ],
    'gte' => [
        'numeric' => ':attribute harus lebih besar dari atau sama dengan :value.',
        'file' => ':attribute harus berukuran :value kb atau lebih.',
        'string' => ':attribute harus berisi :value karakter atau lebih.',
        'array' => ':attribute harus memiliki :value item atau lebih.',
    ],
    'image' => ':attribute haruslah gambar.',
    'in' => ':attribute yang dipilih tidak valid.',
    'in_array' => ':attribute tidak ada di dalam :other.',
    'integer' => ':attribute haruslah bilangan bulat.',
    'ip' => ':attribute harus berisikan alamat IP yang valid.',
    'ipv4' => ':attribute harus berisikan alamat IPv4 yang valid.',
    'ipv6' => ':attribute harus berisikan alamt IPv6 yang valid.',
    'json' => ':attribute harsu bersikan JSON string yang valid.',
    'lt' => [
        'numeric' => ':attribute harus lebih kecil dari :value.',
        'file' => ':attribute harus berukuran lebih kecil dari :value kb.',
        'string' => ':attribute harus berisikan kurang dari :value karakter.',
        'array' => ':attribute memiliki kurang dari :value item.',
    ],
    'lte' => [
        'numeric' => ':attribute harus lebih kecil dari atau sama dengan :value.',
        'file' => ':attribute harus berukuran :value kb atau kurang.',
        'string' => ':attribute harus berisi :value karakter atau kurang.',
        'array' => 'The :attribute tidak boleh berisi lebih dari :value item.',
    ],
    'max' => [
        'numeric' => ':attribute tidak boleh melewati :max.',
        'file' => ':attribute tidak boleh melebihi :max kb.',
        'string' => ':attribute tidak boleh melebihi :max karakter.',
        'array' => ':attribute tidak boleh memiliki lebih dari :max item.',
    ],
    'mimes' => ':attribute haruslah file bertipe: :values.',
    'mimetypes' => ':attribute haruslah file bertipe: :values.',
    'min' => [
        'numeric' => ':attribute paling sedikitnya bernilai :min.',
        'file' => ':attribute paling sedikitnya berukuran :min kb.',
        'string' => ':attribute paling sedikitnya berisikan :min karakter.',
        'array' => ':attribute harus memiliki setidaknya :min item.',
    ],
    'not_in' => ':attribute yang dipilih tidak valid.',
    'not_regex' => 'Format dari :attribute tidak valid.',
    'numeric' => ':attribute haruslah angka.',
    'password' => 'Kata sandi salah.',
    'present' => ':attribute harus ada.',
    'regex' => 'Format dari :attribute tidak valid.',
    'required' => ':attribute harus diisi.',
    'required_if' => ':attribute harus diisi ketika :other bernilai :value.',
    'required_unless' => ':attribute harus diisi kecuali jika :other bernilai :values.',
    'required_with' => ':attribute harus diisi ketika :values ada.',
    'required_with_all' => ':attribute harus diisi ketika :values ada.',
    'required_without' => ':attribute harus diisi jika :values tidak ada.',
    'required_without_all' => ':attribute harus diisi jika :values tidak ada.',
    'same' => ':attribute dan :other harus cocok.',
    'size' => [
        'numeric' => ':attribute harus bernilai :size.',
        'file' => ':attribute harus berukuran :size kb.',
        'string' => ':attribute harus berisikan :size karakter.',
        'array' => ':attribute harus berisikan :size item.',
    ],
    'starts_with' => ':attribute harus diawali dengan: :values.',
    'string' => ':attribute harus berisikan string.',
    'timezone' => ':attribute harus berisikan timezone yang valid.',
    'unique' => ':attribute sudah terdaftar.',
    'uploaded' => ':attribute gagal diunggah.',
    'url' => 'Format URL dari :attribute tidak valid.',
    'uuid' => ':attribute harus berisikan UUID yang valid.',

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
