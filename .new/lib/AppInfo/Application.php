<?php
declare(strict_types=1);
// SPDX-FileCopyrightText: Simon Sanladerer <simon@sanladerer.com>
// SPDX-License-Identifier: AGPL-3.0-or-later

namespace OCA\FilesFullTextSearchMail\AppInfo;

use OCP\AppFramework\App;

class Application extends App {
	public const APP_ID = 'filesfulltextsearchmail';

	public function __construct() {
		parent::__construct(self::APP_ID);
	}
}
