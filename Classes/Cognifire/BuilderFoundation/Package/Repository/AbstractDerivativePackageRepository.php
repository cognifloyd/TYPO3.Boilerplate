<?php
namespace Cognifire\BuilderFoundation\Package\Repository;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "Cognifire.BuilderFoundation". *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU General Public License, either version 3 of the   *
 * License, or (at your option) any later version.                        *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;

/**
 * @Flow\Scope("singleton")
 */
abstract class AbstractDerivativePackageRepository extends AbstractPackageRepository {

	/**
	 * Overrides automatic detection of the entity class name being managed by the repository.
	 * Repositories that extend this contain DerivativePackages
	 *
	 * @var string
	 */
	const ENTITY_CLASSNAME = 'Cognifire\BuilderFoundation\Package\Model\DerivativePackage';

}
?>