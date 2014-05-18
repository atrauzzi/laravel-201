<?php return [

	// Here's a sample image filter for you to use.  Create as many as your project requires!
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

	]

];