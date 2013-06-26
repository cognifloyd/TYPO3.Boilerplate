<?php
namespace Cognifire\BuilderFoundation\Persistence;

/*                                                                        *
 * This script belongs to the TYPO3 Flow framework.                       *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU Lesser General Public License, either version 3   *
 * of the License, or (at your option) any later version.                 *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

use Cognifire\BuilderFoundation\Persistence\Aspect\PersistenceMagicInterface;
use TYPO3\Flow\Persistence\Exception\UnknownObjectException;
use TYPO3\Flow\Reflection\ObjectAccess;

/**
 * This is a fork of the Flow Persistence Manager base class
 */
abstract class AbstractPersistenceManager implements PersistenceManagerInterface {

	/**
	 * @var array
	 */
	protected $settings = array();

	/**
	 * @var array
	 */
	protected $newObjects = array();

	/**
	 * Injects the Flow settings, the persistence part is kept
	 * for further use.
	 *
	 * @param array $settings
	 * @return void
	 */
	public function injectSettings(array $settings) {
		$this->settings = $settings;
	}

	/**
	 * Clears the in-memory state of the persistence.
	 *
	 * @return void
	 */
	public function clearState() {
		$this->newObjects = array();
	}

	/**
	 * Registers an object which has been created or cloned during this request.
	 *
	 * The given object must contain the Persistence_Object_Identifier property, thus
	 * the PersistenceMagicInterface type hint. A "new" object does not necessarily
	 * have to be known by any repository or be persisted in the end.
	 *
	 * Objects registered with this method must be known to the getObjectByIdentifier()
	 * method.
	 *
	 * @param PersistenceMagicInterface $object The new object to register
	 * @return void
	 */
	public function registerNewObject(PersistenceMagicInterface $object) {
		$identifier = ObjectAccess::getProperty($object, 'Persistence_Object_Identifier', TRUE);
		$this->newObjects[$identifier] = $object;
	}

	/**
	 * Converts the given object into an array containing the identity of the domain object.
	 *
	 * @param object $object The object to be converted
	 * @return array The identity array in the format array('__identity' => '...')
	 * @throws UnknownObjectException if the given object is not known to the Persistence Manager
	 */
	/*public function convertObjectToIdentityArray($object) {
		$identifier = $this->getIdentifierByObject($object);
		if ($identifier === NULL) {
			throw new UnknownObjectException('The given object is unknown to the Persistence Manager.', 1302628242);
		}
		return array('__identity' => $identifier);
	}*/

	/**
	 * Recursively iterates through the given array and turns objects
	 * into an arrays containing the identity of the domain object.
	 *
	 * @param array $array The array to be iterated over
	 * @return array The modified array without objects
	 * @throws UnknownObjectException if array contains objects that are not known to the Persistence Manager
	 */
	/*public function convertObjectsToIdentityArrays(array $array) {
		foreach ($array as $key => $value) {
			if (is_array($value)) {
				$array[$key] = $this->convertObjectsToIdentityArrays($value);
			} elseif (is_object($value) && $value instanceof \Traversable) {
				$array[$key] = $this->convertObjectsToIdentityArrays(iterator_to_array($value));
			} elseif (is_object($value)) {
				$array[$key] = $this->convertObjectToIdentityArray($value);
			}
		}
		return $array;
	}*/
}

?>