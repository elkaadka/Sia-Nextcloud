<?php
/**
 * @copyright Copyright (c) 2016, ownCloud, Inc.
 *
 * @author Johnathan Howell <me@johnathanhowell.com> 
 *
 * @license AGPL-3.0
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License, version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */

namespace OCA\Files_External_Sia\Backend;


use \OCP\IL10N;
use \OCA\Files_External\Lib\Backend\Backend;
use \OCA\Files_External\Lib\DefinitionParameter;
use \OCA\Files_External\Lib\Auth\AuthMechanism;
use \OCA\Files_External\Service\BackendService;
use \OCA\Files_External\Lib\Auth\NullMechanism;

class Sia extends Backend {
	public function __construct(IL10N $l, NullMechanism $legacyAuth) {
		$this
			->setIdentifier('sia')
			->setStorageClass(\OCA\Files_External_Sia\Storage\Sia::class)
			->setText($l->t('Sia'))
			->addParameters([
				(new DefinitionParameter('apiaddr', $l->t('API Address, usually "localhost:9980"'))),
				(new DefinitionParameter('datadir', $l->t('Renter data directory, e.g. /tmp/sia-upload'))),
			])
			->setAllowedVisibility(BackendService::VISIBILITY_ADMIN)
			->setPriority(BackendService::PRIORITY_DEFAULT + 50)
			->addAuthScheme(AuthMechanism::SCHEME_NULL)
			->setLegacyAuthMechanism($legacyAuth)
		;
	}
}
