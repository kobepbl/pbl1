<?php
ini_set("display_errors", "On");

// PHPMarkdownの読み込み
require_once __DIR__ . '/PHPMarkdown/Michelf/Markdown.inc.php';

use Michelf\Markdown;

$text = $article['sentence'];

$html = Markdown::defaultTransform($text);
