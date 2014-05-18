<?php namespace Laravel201\Web\Controller {

	use Illuminate\Routing\Controller;
	//
	use Laravel201\Service\Image as ImageService;
	use Illuminate\View\Factory as ViewFactory;
	//
	use Laravel201\Web\Validator\ImageStore;
	use Laravel201\Web\Validator\ImageBatchStore;
	//
	use Illuminate\Http\Response;
	use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


	class Image extends Controller {

		/** @var \Laravel201\Service\Image */
		protected $imageService;

		/** @var \Illuminate\View\Factory */
		protected $view;

		/**
		 * @param \Laravel201\Service\Image $imageService
		 * @param \Illuminate\View\Factory $view
		 */
		public function __construct(
			ImageService $imageService,
			ViewFactory $view
		) {
			$this->imageService = $imageService;
			$this->view = $view;
		}

		//
		//
		//

		public function show($id) {

			$image = $this->getImageById($id);

		}

		/**
		 * A simple index action.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function index() {

			$images = $this->imageService->find()->paginate(15);

			return new Response($this->view->make('image/index', [
				'images' => $images
			]));

		}

		//
		//
		//

		/**
		 * Displays the form for single image submission.
		 */
		public function create() {
		}

		/**
		 * Saves a single image immediately.
		 */
		public function store() {

			$imageStoreData = ImageStore::make();

			if($imageStoreData->valid())
				$image = $this->imageService->saveFromUri($imageStoreData->get('uri'));
			else
				echo "hi";


		}

		//
		//
		//

		/**
		 * Displays the form for multiple image submission.
		 */
		public function createBatch() {
		}

		/**
		 * Queues multiple images for saving via batch processing.
		 */
		public function batchStore() {

			$imageBatchStore = ImageBatchStore::make();

			if($imageBatchStore->valid())
				$this->imageService->batchSaveFromUris($imageBatchStore->get('uris'));
			else
				echo "hi";

		}

		//
		//
		//

		/**
		 * Obtains an image by it's id.  If it isn't found, an HTTP 404 exception is raised.
		 *
		 * @param $id
		 * @return mixed
		 * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
		 */
		protected function getById($id) {

			if(!$image = $this->imageService->getById($id))
				throw new NotFoundHttpException(sprintf('Unable to find image with id %s.', $id));

			return $image;

		}

	}

}