<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var string[]
	 */
	public $ruleSets = [
		Rules::class,
		FormatRules::class,
		FileRules::class,
		CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array<string, string>
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------
	public $formMember = [
        'nama' => [
            'rules'  => 'required|min_length[5]',
            'errors' => [
                'required' => 'Nama member tidak boleh kosong',
                'min_length' => 'Nama member harus lebih dari 5 huruf'
            ]
        ],
        'telp'    => [
            'rules'  => 'required|max_length[13]|min_length[12]|numeric',
            'errors' => [
                'required' => 'No telp tidak boleh kosong',
                'max_length' => 'No telp tidak valid',
                'min_length' => 'No telp tidak valid',
                'numeric' => 'No telp tidak valid',
            ]
        ],
        'gender'    => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'Harap pilih jenis kelamin'
            ]
        ],
        'alamat'    => [
            'rules'  => 'required|min_length[10]',
            'errors' => [
                'required' => 'Alamat tidak boleh kosong',
                'min_length' => 'Alamat tidak valid',
            ]
        ],
    ];

    public $formPaket = [
        'nama_paket' => [
            'rules'  => 'required|min_length[5]',
            'errors' => [
                'required' => 'Nama paket tidak boleh kosong',
                'min_length' => 'Nama paket terlalu pendek'
            ]
        ],
        'harga'    => [
            'rules'  => 'required|numeric|greater_than_equal_to[1000]',
            'errors' => [
                'required' => 'Harga tidak boleh kosong',
                'greater_than_equal_to' => 'Harga minimal adalah 1000',
                'numeric' => 'Harga tidak valid'
            ]
        ],
        'jenis_paket'    => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'Pilih satu atau lebih'
            ]
        ],
    ];

    public $formOutlet = [
        'nama_outlet' => [
            'rules'  => 'required|min_length[5]',
            'errors' => [
                'required' => 'Nama member tidak boleh kosong',
                'min_length' => 'Nama member harus lebih dari 5 huruf'
            ]
        ],
        'telp' => [
            'rules'  => 'required|max_length[13]|min_length[12]|numeric',
            'errors' => [
                'required' => 'No telp tidak boleh kosong',
                'max_length' => 'No telp tidak valid',
                'min_length' => 'No telp tidak valid',
                'numeric' => 'No telp tidak valid',
            ]
        ],
        'email'    => [
            'rules'  => 'required|valid_email',
            'errors' => [
            	'required' => 'Email tidak boleh kosong',
                'valid_email' => 'Harap masukan email yang valid'
            ]
        ],
        'alamat' => [
            'rules'  => 'required|min_length[10]',
            'errors' => [
                'required' => 'Alamat tidak boleh kosong',
                'min_length' => 'Alamat tidak valid',
            ]
        ],
    ];

    public $formUser = [
        'nama' => [
            'rules'  => 'required|min_length[5]',
            'errors' => [
                'required' => 'Nama tidak boleh kosong.',
                'min_length' => 'Nama user harus lebih dari 5 huruf',
            ]
        ],
        'username'    => [
            'rules'  => 'required|min_length[5]',
            'errors' => [
                'required' => 'Username tidak boleh kosong',
                'min_length' => 'Username harus lebih dari 5 huruf',
            ]
        ],
        'password'    => [
            'rules'  => 'required|min_length[5]',
            'errors' => [
                'required' => 'Password tidak boleh kosong',
                'min_length' => 'Passwrord harus lebih dari 5 huruf',
            ]
        ],
        'id_outlet'    => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'Harap pilih outlet',
            ]
        ],
        'role'    => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'Harap pilih peran untuk user',
            ]
        ],
    ];

    public $formDiskon = [
        'nama_diskon' => [
            'rules'  => 'required|min_length[5]',
            'errors' => [
                'required' => 'Nama diskon tidak boleh kosong',
                'min_length' => 'Nama diskon harus lebih dari 5 huruf'
            ]
        ],
        'kode_diskon'    => [
            'rules'  => 'required|min_length[5]',
            'errors' => [
                'required' => 'Kode diskon tidak boleh kosong',
                'min_length' => 'Kode diskon harus lebih dari 5 huruf',
            ]
        ],
        'diskon'    => [
            'rules'  => 'required|numeric|less_than_equal_to[100]',
            'errors' => [
                'required' => 'Diskon tidak boleh kosong',
                'numeric' => 'Diskon tidak valid',
                'less_than_equal_to' => 'Diskon maksimal adalah 100'
            ]
        ],
        'syarat'    => [
            'rules'  => 'required|numeric|greater_than_equal_to[1000]',
            'errors' => [
                'required' => 'Syarat diskon tidak boleh kosong',
                'numeric' => 'Syarat diskon tidak valid',
                'greater_than_equal_to' => 'Syarat diskon minimum adalah 1000'
            ]
        ],
        'keterangan'    => [
            'rules'  => 'required|min_length[10]',
            'errors' => [
                'required' => 'keterangan diskon tidak boleh kosong',
                'min_length' => 'keterangan diskon harus lebih dari 10 huruf',
            ]
        ],
        'tgl_mulai'    => [
            'rules'  => 'required|valid_date[Y-m-d]',
            'errors' => [
                'required' => 'Tanggal mulai tidak boleh kosong',
                'valid_date' => 'Tanggal tidak valid'
            ]
        ],
        'tgl_selesai'    => [
            'rules'  => 'required|valid_date[Y-m-d]',
            'errors' => [
                'required' => 'Tanggal selesai tidak boleh kosong',
                'valid_date' => 'Tanggal tidak valid'
            ]
        ],
    ];

    public $formTransaksi = [
        'nama' => [
            'rules'  => 'required|min_length[5]',
            'errors' => [
                'required' => 'Nama member tidak boleh kosong',
                'min_length' => 'Nama member harus lebih dari 5 huruf'
            ]
        ],
        'telp'    => [
            'rules'  => 'required|max_length[13]|min_length[12]|numeric',
            'errors' => [
                'required' => 'No telp tidak boleh kosong',
                'max_length' => 'No telp tidak valid',
                'min_length' => 'No telp tidak valid',
                'numeric' => 'No telp tidak valid',
            ]
        ],
        'gender'    => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'Harap pilih jenis kelamin'
            ]
        ],
        'alamat'    => [
            'rules'  => 'required|min_length[10]',
            'errors' => [
                'required' => 'Alamat tidak boleh kosong',
                'min_length' => 'Alamat tidak valid',
            ]
        ],
    ];
}
