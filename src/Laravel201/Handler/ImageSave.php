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

			// The save from a URI should be pokey enough, but let's just add some more time to be certain.
			sleep(10);

			$this->imageService->saveFromUri($uri);

			$job->delete();

		}

	}

}