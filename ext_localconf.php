<?php
defined('TYPO3_MODE') or die();

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['GLOBAL']['softRefParser']['rtehtmlarea_images'] = \Netresearch\RteCKEditorImage\Database\RteImagesSoftReferenceIndex::class;

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_parsehtml_proc.php']['transformation']['rtehtmlarea_images_db'] = \Netresearch\RteCKEditorImage\Database\RteImagesDbHook::class;

$GLOBALS['TYPO3_CONF_VARS']
        ['SC_OPTIONS']
        ['cms/layout/class.tx_cms_layout.php']
        ['tt_content_drawItem']
        ['text'] = 'Netresearch\RteCKEditorImage\Hooks\PageLayoutViewDrawItemHook';

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('RTE.default.proc.overruleMode := addToList(default)');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('RTE.default.proc.overruleMode := addToList(rtehtmlarea_images_db)');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScript(
    'rte_ckeditor_image',
    'setup',
    '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:rte_ckeditor_image/Configuration/TypoScript/ImageRendering/setup.txt">'
);
