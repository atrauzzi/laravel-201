<?php namespace Laravel201 {

	use TippingCanoe\Imager\Storage\Filesystem;
	//
	use Illuminate\Remote\RemoteManager;
	//
	use TippingCanoe\Imager\Model\Image;
	use Symfony\Component\HttpFoundation\File\File;

	/**
	 * Class ImagerSshStorage
	 *
	 * Simple SSH file upload shim for the Laravel201 demo.
	 *
	 * @package Laravel201
	 */
	class ImagerSshStorage extends Filesystem {

		/** @var \Illuminate\Remote\RemoteManager|\Illuminate\Remote\Connection */
		protected $ssh;

		/**
		 * @param \Illuminate\Remote\RemoteManager $ssh
		 */
		public function __construct(
			RemoteManager $ssh
		) {
			$this->ssh = $ssh;
		}

		//
		// Public Interface Implementation
		//

		/**
		 * Saves an image.
		 *
		 * Exceptions can provide extended error information and will abort the save process.
		 *
		 * @param File $file
		 * @param Image $image
		 * @param array $filters
		 */
		public function saveFile(File $file, Image $image, array $filters = []) {
			$this->ssh->put($file->getRealPath(), $this->generateFileName($image, $filters));
		}

		/**
		 * @param Image $image
		 * @param array $filters
		 * @return bool|mixed
		 */
		public function has(Image $image, array $filters = []) {

			try {
				$filename = tempnam(sys_get_temp_dir(), null);
				$this->ssh->get($this->generateFilePath($image, $filters), $filename);
			}
			catch(\Exception $ex) {
				return false;
			}

			return true;

		}

		/**
		 * Deletes an image.
		 *
		 * If the image is the original, also removes all derived images.
		 *
		 * @param Image $image
		 * @param array $filters
		 * @throws \Exception
		 */
		public function delete(Image $image, array $filters = []) {
			throw new \Exception('Not supported in this demo!');
		}

		/**
		 * Tells the driver to prepare a copy of the original image locally.
		 *
		 * @param Image $image
		 * @return File
		 */
		public function tempOriginal(Image $image) {
			$tempOriginalPath = tempnam(sys_get_temp_dir(), null);
			$this->ssh->get($this->generateFilePath($image), $tempOriginalPath);
			return new File($tempOriginalPath);
		}

	}

}