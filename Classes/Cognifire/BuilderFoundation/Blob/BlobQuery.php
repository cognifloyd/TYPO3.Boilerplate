<?php
namespace Cognifire\BuilderFoundation\Blob;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package                          *
 * "Cognifire.BuilderFoundation".                                         *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU General Public License, either version 3 of the   *
 * License, or (at your option) any later version.                        *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */


use TYPO3\Eel\FlowQuery\FlowQuery;
use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Package\PackageManager;

/**
 * BlobQuery is a FlowQuery factory.
 *
 * Some of the methods of this class should be exposed as FlowQuery operations to
 * modify which files are being worked with.
 */
class BlobQuery {


	/**
	 * @Flow\Inject
	 * @var  PackageManager
	 */
	protected $packageManager;

	//TODO[cognifloyd] when the filters stuff is more fleshed out, this should be part of filters instead of separate
	protected $boilerplateKey;
	protected $derivativeKey;

	protected $files = array();

	/**
	 * @param $blobFilter
	 * @throws Exception
	 */
	public function __construct($blobFilter) {
		if(!is_string($blobFilter)) {
			throw new Exception('BlobQuery requires a string, but '. gettype($blobFilter) . ' was received.', 1375743984);
		}
		//TODO[cognifloyd] The blobFilter should end up being parsed into a packageKey:filepath and added to a list of filters
		$this->derivativeKey = $blobFilter;
	}

	/**
	 *
	 * @param $file
	 * @return BlobQuery
	 */
	public function file($file) {
		$this->files = array($file);
		return $this->build();
	}

	/**
	 *
	 * @return BlobQuery
	 */
	public function copy() {
		foreach ($this->files as $file) {
			$boilerplateFile = $this->packageManager->getPackage($this->boilerplateKey)->getPackagePath() . '/' . $file;
			$derivativeFile = $this->packageManager->getPackage($$this->derivativeKey)->getPackagePath()  . '/' . $file;
			copy($boilerplateFile,$derivativeFile);
		}

		return $this->build();
	}

	/**
	 *
	 * @param string $boilerplateKey
	 * @return BlobQuery
	 */
	public function fromBoilerplate($boilerplateKey) {
		$this->boilerplateKey = $boilerplateKey;
		return $this->build();
	}

	/**
	 *
	 * @param string $boilerplateKey
	 * @return BlobQuery
	 */
	public function cloneFromBoilerplate($boilerplateKey) {
		return $this->fromBoilerplate($boilerplateKey)
					->copy()
					->build();
	}

	/**
	 *
	 * @return BlobQuery
	 */
	protected function build() {
		//return new FlowQuery(array());
		return $this;
	}

}