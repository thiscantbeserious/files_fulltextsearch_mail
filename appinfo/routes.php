<?php
declare(strict_types=1);
// SPDX-FileCopyrightText: Simon Sanladerer <simon@sanladerer.com>
// SPDX-License-Identifier: AGPL-3.0-or-later

/**
 * Create your routes in here. The name is the lowercase name of the controller
 * without the controller part, the stuff after the hash is the method.
 * e.g. page#index -> OCA\FilesFullTextSearchMail\Controller\PageController->index()
 *
 * The controller class has to be registered in the application.php file since
 * it's instantiated in there
 */
return [
	'routes' => [
		['name' => 'Settings#getSettingsAdmin', 'url' => '/admin/settings', 'verb' => 'GET'],
		['name' => 'Settings#setSettingsAdmin', 'url' => '/admin/settings', 'verb' => 'POST']
	]
];
