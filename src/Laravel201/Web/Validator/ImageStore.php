<?php namespace Laravel201\Web\Validator {

	use TippingCanoe\Validator\Base;


	class ImageStore extends Base {

		protected $rules = [
			'uri' => 'required|url'
		];

		protected $autoPopulate = true;

	}

}