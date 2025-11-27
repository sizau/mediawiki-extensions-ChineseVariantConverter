<?php

namespace MediaWiki\Extension\ChineseVariantConverter;

use MediaWiki\Language\Language;

class VariantZhConverter extends \ZhConverter {
	private string $mainCode;

	public function __construct( Language $langobj, string $mainCode ) {
		parent::__construct( $langobj );
		$this->mainCode = $mainCode;
	}

	public function getMainCode(): string {
		return $this->mainCode;
	}
}
