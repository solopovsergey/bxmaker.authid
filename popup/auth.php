<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

// файл обработчик ajax запрос, который вернет html, стили, скрипты для показа авторизации в попап окне

/**
 * @var $APPLICATION \CMain
 */


if(\Bitrix\Main\Loader::includeModule('bxmaker.authid'))
{

    $siteId = \Bitrix\Main\Application::getInstance()->getContext()->getRequest()->get('siteId');
    if($siteId)
    {
        \BXmaker\AuthID\Manager::getInstance()->setSiteId($siteId);
    }

    // подключение комопеннта
    $APPLICATION->IncludeComponent(
        'bxmaker:authid.area',
        '',
        [
            'COMPOSITE_FRAME_MODE' => 'N',
            'RAND_STRING' => 'customAjax',
        ]
    );
}


require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/epilog_after.php");
?>