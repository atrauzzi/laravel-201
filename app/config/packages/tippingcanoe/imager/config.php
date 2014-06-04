<?php return [

	// Multiple storage options.
	'storage' => [

		'Laravel201\ImagerSshStorage' => [

			// Public, client-accessible prefix pointing to wherever the root is hosted, including scheme.
			'public_prefix' => sprintf('%s/imager', 'http://laravel201front'),

        ],

    ],

];