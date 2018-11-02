/*
 * Files_FullTextSearch_Mail - OCR your documents before index
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later. See the COPYING file.
 *
 * @author Maxence Lange <maxence@artificial-owl.com>
 * @copyright 2018
 * @license GNU AGPL version 3 or any later version
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

/** global: OCA */
/** global: fts_mail_elements */
/** global: fts_mail_settings */


$(document).ready(function () {


	/**
	 * @constructs Fts_deck
	 */
	var Fts_mail = function () {
		$.extend(Fts_mail.prototype, fts_mail_elements);
		$.extend(Fts_mail.prototype, fts_mail_settings);

		fts_mail_elements.init();
		fts_mail_settings.refreshSettingPage();
	};

	OCA.FullTextSearchAdmin.fts_mail = Fts_mail;
	OCA.FullTextSearchAdmin.fts_mail.settings = new Fts_mail();

});
