# Chinese Variant Converter（中文变体转换）

**中文** | [English](README.md)

为所有中文语言代码启用自动中文繁简转换功能。

## 问题

MediaWiki 只在内容语言为 `zh` 时启用中文转换器，不支持 `zh-hans`、`zh-tw` 等特定变体。

## 解决方案

将所有中文变体（`zh-hans`、`zh-hant`、`zh-cn`、`zh-tw`、`zh-hk`、`zh-mo`、`zh-sg`、`zh-my`）注册为使用 ZhConverter。

## 安装

在 `LocalSettings.php` 中添加：

```php
wfLoadExtension( 'ChineseVariantConverter' );
```

## 测试环境

已在 MediaWiki 1.44 上测试通过。

## 许可证

WTFPL
