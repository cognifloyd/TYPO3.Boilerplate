<?php
namespace Cognifire\BuilderFoundation\Annotations;

/*                                                                        *
 * This script belongs to the TYPO3 Flow framework.                       *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU Lesser General Public License, either version 3   *
 * of the License, or (at your option) any later version.                 *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

/**
 * Marks an object as an entity.
 *
 * @Annotation
 * @Target("PROPERTY")
 */
final class Config {

	/**
	 * The settings array that will be injected into the annotated array
	 * @var array
	 */
	public $settings;

}

?>