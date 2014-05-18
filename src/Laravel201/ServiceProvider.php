<?php namespace Laravel201 {

	use Illuminate\Support\ServiceProvider as Base;


	class ServiceProvider extends Base {

		/**
		 * Register the service provider.
		 *
		 * @return void
		 */
		public function register() {

			// Definitions like this are re-bindings of a core Laravel facility to it's actual type.
			// This then allows for the instance to be injected into any others that request it.
			$this->app->bind('Illuminate\Queue\QueueManager', 'queue');
			$this->app->bind('Illuminate\View\Factory', 'view');

		}

	}

}