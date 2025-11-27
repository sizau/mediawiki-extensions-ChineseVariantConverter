# Chinese Variant Converter

[中文](README.zh.md) | **English**

Enables automatic Chinese variant conversion for all Chinese language codes in MediaWiki.

## Problem

MediaWiki only activates Chinese language converter when content language is `zh`, not for specific variants like `zh-hans` or `zh-tw`.

## Solution

This extension registers all Chinese variants (`zh-hans`, `zh-hant`, `zh-cn`, `zh-tw`, `zh-hk`, `zh-mo`, `zh-sg`, `zh-my`) to use ZhConverter.

## Installation

Add to `LocalSettings.php`:

```php
wfLoadExtension( 'ChineseVariantConverter' );
```

## Tested

Tested on MediaWiki 1.44.

## License

WTFPL
