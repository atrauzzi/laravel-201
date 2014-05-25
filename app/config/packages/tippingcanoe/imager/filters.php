<?php return [

	'thumbnail' => [

		'TippingCanoe\Imager\Processing\FixRotation',

		[
			'TippingCanoe\Imager\Processing\Resize',
			[
				'width' => 100,
				'height' => 100,
				'preserve_ratio' => true
			]
		],

	],

	'image_show' => [

		'TippingCanoe\Imager\Processing\FixRotation',

		[
			'TippingCanoe\Imager\Processing\Resize',
			[
				'width' => 900,
				'height' => 500,
				'preserve_ratio' => true
			]
		],

	]

];