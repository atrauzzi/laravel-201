<?php namespace Laravel201\Web\Validator {

	use TippingCanoe\Validator\Base;


	class ImageBatchStore extends Base {

		protected $rules = [
			'uris' => 'required|array|size:10'
		];

	}

}