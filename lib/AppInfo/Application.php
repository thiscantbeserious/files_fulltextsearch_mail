<?php
declare(strict_types=1);

namespace OCA\Files_FullTextSearch_Mail\AppInfo;

use OCA\Files_FullTextSearch_Mail\Service\MailService;
use OCP\AppFramework\App;
use OCP\AppFramework\QueryException;
use OCP\AppFramework\Bootstrap\IBootContext;
use OCP\AppFramework\Bootstrap\IBootstrap;
use OCP\AppFramework\Bootstrap\IRegistrationContext;
use OCP\EventDispatcher\IEventDispatcher;
use OCP\EventDispatcher\GenericEvent;

use \OCP\ILogger;

require_once __DIR__ . '/../../vendor/autoload.php';

/**
 * Class Application
 *
 * @package OCA\Files_FullTextSearch_Mail\AppInfo
 */
class Application extends App implements IBootstrap {


	const APP_NAME = 'files_fulltextsearch_mail';

	private ILogger $logger;

	private MailService $mailService;

	public function __construct(array $params = []) {
		parent::__construct(self::APP_NAME, $params);

		$container = $this->getContainer();

		$this->logger = $container->get('ServerContainer')->getLogger();
		$this->mailService = $container->get(MailService::class);
		
	}

	public function register(IRegistrationContext $context): void {
		$context->registerService('Logger', function($c) {
            return $c->query('ServerContainer')->getLogger();
        });

		$context->registerService('MailService', function($c) {
            return new MailService(
                $c->get('Logger'),
                $c->get('ConfigService'),
				$c->get('MiscService'),
            );
        });
		$this->logger->info("Registering Event hooks for ".self::APP_NAME);
		/** @var IEventDispatcher $eventDispatcher */
		//$eventDispatcher= $this->getContainer()->get(IEventDispatcher::class);
		$eventDispatcher = \OCP\Server::get(\OCP\EventDispatcher\IEventDispatcher::class);
		//$eventDispatcher = \OC::$server->getEventDispatcher();

		//fixed thanks to this hint: https://github.com/nextcloud/files_fulltextsearch/issues/159
		$eventDispatcher->addListener(
			'OCP\EventDispatcher\GenericEvent',
			function (GenericEvent $e) {
				$subject = $e->getSubject();
				$this->logger->info(self::APP_NAME." {$subject} event catched");
				switch($subject) {
					case "Files_FullTextSearch.onFileIndexing":
					$this->mailService->onFileIndexing($e);
					break;
					case "Files_FullTextSearch.onSearchRequest":
					$this->mailService->onSearchRequest($e);
					break;
					case "Files_FullTextSearch.onSearchResult":
					$this->mailService->onSearchResult($e);
					break;

				}
				$this->mailService->onSearchResult($e);
			}
		);

		//test event dispatch from same app

		//$eventDispatcher->dispatchTyped(new GenericEvent('Files_FullTextSearch.onFileIndexing', ['file' => null, 'document' => null]));
	}

	public function boot(IBootContext $context): void {

	}
}

