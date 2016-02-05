<?php

//  define('SHOW_VARIABLES', 1);
//  define('DEBUG_LEVEL', 1);

//  error_reporting(E_ALL ^ E_NOTICE);
//  ini_set('display_errors', 'On');

set_include_path('.' . PATH_SEPARATOR . get_include_path());


include_once dirname(__FILE__) . '/' . 'components/utils/system_utils.php';

//  SystemUtils::DisableMagicQuotesRuntime();

SystemUtils::SetTimeZoneIfNeed('America/New_York');

function GetGlobalConnectionOptions()
{
    return array(
  'server' => 'SERVER',
  'username' => 'USER',
  'password' => 'PASS',
  'database' => 'DATABASE'
);
}

function HasAdminPage()
{
    return false;
}

function GetPageGroups()
{
    $result = array('Default');
    return $result;
}

function GetPageInfos()
{
    $result = array();
    $result[] = array('caption' => 'Base de Datos', 'short_caption' => '', 'filename' => 'Base de Datos.php', 'name' => 'dbo.BaseDatos', 'group_name' => 'Default', 'add_separator' => false);
    $result[] = array('caption' => 'Detalle Objetos', 'short_caption' => '', 'filename' => 'Detalle Objetos.php', 'name' => 'dbo.AlterLog', 'group_name' => 'Default', 'add_separator' => false);
    $result[] = array('caption' => 'Sesiones', 'short_caption' => '', 'filename' => 'Sesiones.php', 'name' => 'dbo.procesosbd', 'group_name' => 'Default', 'add_separator' => false);
    $result[] = array('caption' => 'Volumen', 'short_caption' => '', 'filename' => 'Volumen.php', 'name' => 'dbo.TamanoBaseDatos', 'group_name' => 'Default', 'add_separator' => false);
    $result[] = array('caption' => 'Procesos', 'short_caption' => '', 'filename' => 'Procesos.php', 'name' => 'dbo.procesos', 'group_name' => 'Default', 'add_separator' => false);
    return $result;
}

function GetPagesHeader()
{
    return
    '<div class="alert alert-danger SQLGeneratorEvaluationVersion"><h3 class="SQLGeneratorEvaluationVersion-head">SRVDOM</h3><img class="SQLGeneratorEvaluationVersion-justify" src="components/assets/img/btn-loading.png"></div>';
}

function GetPagesFooter()
{
    return
        '<p align="right">(C) <span>2015-<script type="text/javascript">document.write(new Date().getFullYear().toString())</script></span></p>'; 
}

function ApplyCommonPageSettings(Page $page, Grid $grid)
{
    $page->SetShowUserAuthBar(false);
    $page->OnCustomHTMLHeader->AddListener('Global_CustomHTMLHeaderHandler');
    $page->OnGetCustomTemplate->AddListener('Global_GetCustomTemplateHandler');
    $grid->BeforeUpdateRecord->AddListener('Global_BeforeUpdateHandler');
    $grid->BeforeDeleteRecord->AddListener('Global_BeforeDeleteHandler');
    $grid->BeforeInsertRecord->AddListener('Global_BeforeInsertHandler');
}

/*
  Default code page: 1252
*/
function GetAnsiEncoding() { return 'windows-1252'; }

function Global_CustomHTMLHeaderHandler($page, &$customHtmlHeaderText)
{

}

function Global_GetCustomTemplateHandler($part, $mode, &$result, &$params, CommonPage $page = null)
{

}

function Global_BeforeUpdateHandler($page, &$rowData, &$cancel, &$message, $tableName)
{

}

function Global_BeforeDeleteHandler($page, &$rowData, &$cancel, &$message, $tableName)
{

}

function Global_BeforeInsertHandler($page, &$rowData, &$cancel, &$message, $tableName)
{

}

function GetDefaultDateFormat()
{
    return 'Y-m-d';
}

function GetFirstDayOfWeek()
{
    return 0;
}

function GetEnableLessFilesRunTimeCompilation()
{
    return false;
}

function GetPageListType()
{
    return PageList::TYPE_MENU;
}



?>