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
use TYPO3\Flow\Persistence\Repository;
/*I wasn't sure I wanted to use Persistence\Repository, but it has awesome API that I want to reuse.
  the next question is on what gets used as the persistenceManager. I don't want a DB.
*/

/**
 * @Flow\Scope("singleton")
 */
abstract class AbstractPackageRepository extends Repository {



}
?>