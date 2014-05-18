<?php namespace Laravel201\Handler {


	use Laravel201\Service\Image as ImageService;
	//
	use Illuminate\Queue\Jobs\Job;


	class ImageSave {

		/** @var \Laravel201\Service\Image */
		protected $imageService;

		public function __construct(
			ImageService $imageService
		) {
			$this->imageService = $imageService;
		}

		/**
		 * @param \Illuminate\Queue\Jobs\Job $job
		 * @param string $uri
		 */
		public function fire(Job $job, $uri) {

			// ToDo: Introduce an artificial delay here, just to guarantee presentation quality.
			$this->imageService->saveFromUri($uri);
			$job->delete();

		}

	}

}