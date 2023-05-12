<?php
ini_set("display_errors", "On");

// PHPMarkdownの読み込み
require_once __DIR__ . '/../PHPMarkdown/Michelf/Markdown.inc.php';

use Michelf\Markdown;

$text = $question['question'];

$html = Markdown::defaultTransform($text);
