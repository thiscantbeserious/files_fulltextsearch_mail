<?php
declare(strict_types=1);
// SPDX-FileCopyrightText: Simon Sanladerer <simon@sanladerer.com>
// SPDX-License-Identifier: AGPL-3.0-or-later

namespace OCA\FilesFullTextSearchMail\Tests\Unit\Controller;

use OCA\FilesFullTextSearchMail\Controller\NoteApiController;

class NoteApiControllerTest extends NoteControllerTest {
	public function setUp(): void {
		parent::setUp();
		$this->controller = new NoteApiController($this->request, $this->service, $this->userId);
	}
}
