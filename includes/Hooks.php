<?php

namespace MediaWiki\Extension\ChineseVariantConverter;

use MediaWiki\Hook\SetupAfterCacheHook;
use MediaWiki\Language\LanguageConverter;
use MediaWiki\Languages\LanguageConverterFactory;
use MediaWiki\MediaWikiServices;

class Hooks implements SetupAfterCacheHook {

	public function onSetupAfterCache() {
		$services = MediaWikiServices::getInstance();
		$factory = $services->getLanguageConverterFactory();
		
		$reflection = new \ReflectionClass( $factory );
		$property = $reflection->getProperty( 'converterList' );
		$property->setAccessible( true );
		
		$converterList = $property->getValue( $factory );
		$zhVariants = [ 'zh-hans', 'zh-hant', 'zh-cn', 'zh-tw', 'zh-hk', 'zh-mo', 'zh-sg', 'zh-my' ];
		$zhConverterSpec = [ 'class' => \ZhConverter::class ];
		
		foreach ( $zhVariants as $variant ) {
			$converterList[$variant] = $zhConverterSpec;
		}
		
		$property->setValue( $factory, $converterList );
		$property->setAccessible( false );
		
		$currentLanguagesWithVariants = LanguageConverter::$languagesWithVariants;
		
		foreach ( $zhVariants as $variant ) {
			if ( !in_array( $variant, $currentLanguagesWithVariants ) ) {
				$currentLanguagesWithVariants[] = $variant;
			}
		}
		
		sort( $currentLanguagesWithVariants );
		LanguageConverter::$languagesWithVariants = $currentLanguagesWithVariants;
	}
}
