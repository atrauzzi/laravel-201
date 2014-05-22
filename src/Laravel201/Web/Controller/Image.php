<?php namespace Laravel201\Web\Controller {

	use Illuminate\Http\RedirectResponse;
	use Illuminate\Routing\Controller;
	//
	use Illuminate\Session\SessionManager;
	use Laravel201\Service\Image as ImageService;
	use Illuminate\View\Factory as ViewFactory;
	//
	use Laravel201\Web\Validator\ImageStore;
	use Laravel201\Web\Validator\ImageBatchStore;
	//
	use Illuminate\Http\Response;
	use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
	use \Exception;


	class Image extends Controller {

		/** @var \Laravel201\Service\Image */
		protected $imageService;

		/** @var \Illuminate\View\Factory */
		protected $view;

		/** @var \Illuminate\Session\SessionManager|\Illuminate\Session\CacheBasedSessionHandler */
		protected $session;

		/**
		 * @param \Laravel201\Service\Image $imageService
		 * @param \Illuminate\View\Factory $view
		 * @param \Illuminate\Session\SessionManager $session
		 */
		public function __construct(
			ImageService $imageService,
			ViewFactory $view,
			SessionManager $session
		) {
			$this->imageService = $imageService;
			$this->view = $view;
			$this->session = $session;
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
			return new Response($this->view->make('image/create'));
		}

		/**
		 * Saves a single image immediately.
		 */
		public function store() {

			$imageStoreData = ImageStore::make();

			if($imageStoreData->valid())
				$image = $this->imageService->saveFromUri($imageStoreData->get('uri'));
			else
				return new Response($this->view->make('image/create', ['data' => $imageStoreData]));


		}

		//
		//
		//

		/**
		 * Displays the form for multiple image submission.
		 */
		public function batchCreate() {
			return new Response($this->view->make('image/batch_create'));
		}

		/**
		 * Queues multiple images for saving via batch processing.
		 */
		public function batchStore() {

			$imageBatchStore = ImageBatchStore::make();

			if($imageBatchStore->valid()) {

				try {
					$this->imageService->batchSaveFromUris($imageBatchStore->get('uris'));
					$this->session->flash('notices', 'Your batch has been queued for processing!');
					$response = new RedirectResponse('/');
				}
				catch(Exception $ex) {
					$errors = [
						$ex->getMessage()
					];
					$response = new Response($this->view->make('image/batch_create', [
						'data' => $imageBatchStore
					])->withErrors($errors));
				}

			}
			else {
				$response = new Response($this->view->make('image/batch_create', [
					'data' => $imageBatchStore,
				])->withErrors($imageBatchStore->errors));
			}

			return $response;

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