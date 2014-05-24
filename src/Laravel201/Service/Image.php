<?php namespace Laravel201\Service {

	use TippingCanoe\Imager\Service as Imager;
	use Illuminate\Queue\QueueManager;
	//
	use TippingCanoe\Imager\Model\Image as ImageModel;


	class Image {

		/** @var \TippingCanoe\Imager\Service */
		protected $imager;

		/** @var \Illuminate\Queue\QueueManager|\Illuminate\Queue\RedisQueue */
		protected $queue;

		/**
		 * @param \TippingCanoe\Imager\Service $imager
		 * @param \Illuminate\Queue\QueueManager $queue
		 */
		public function __construct(
			Imager $imager,
			QueueManager $queue
		) {
			$this->imager = $imager;
			$this->queue = $queue;
		}

		/**
		 * Pass through to Imager's getById.
		 *
		 * @param int|string $id
		 * @return \TippingCanoe\Imager\Model\Image
		 */
		public function getById($id) {
			return $this->imager->getById($id);
		}

		/**
		 * For simplicity, this project is going to avoid using repository classes.
		 *
		 * @return \Illuminate\Database\Eloquent\Builder
		 */
		public function find() {
			return ImageModel::select();
		}

		/**
		 * Pass through to Imager's saveFromUri.
		 *
		 * @param string $uri
		 * @return \TippingCanoe\Imager\Model\Image
		 */
		public function saveFromUri($uri) {
			return $this->imager->saveFromUri($uri);
		}

		/**
		 * Take multiple URIs and queue them to be processed later.
		 *
		 * @param string[] $uris
		 */
		public function batchSaveFromUris(array $uris)	{

			// What we accomplish here is to separate out each individual URI submitted as individual jobs.
			// This allows the work to be spread out across multiple workers rather than clumped together on one.
			foreach($uris as $uri)
				if($uri)
					$this->queue->push('Laravel201\Handler\ImageSave', $uri);

		}

	}

}