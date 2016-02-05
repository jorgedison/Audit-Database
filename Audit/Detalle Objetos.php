<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 *                                   ATTENTION!
 * If you see this message in your browser (Internet Explorer, Mozilla Firefox, Google Chrome, etc.)
 * this means that PHP is not properly installed on your web server. Please refer to the PHP manual
 * for more details: http://php.net/manual/install.php 
 *
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 */


    include_once dirname(__FILE__) . '/' . 'components/utils/check_utils.php';
    CheckPHPVersion();
    CheckTemplatesCacheFolderIsExistsAndWritable();


    include_once dirname(__FILE__) . '/' . 'phpgen_settings.php';
    include_once dirname(__FILE__) . '/' . 'database_engine/mssql_engine.php';
    include_once dirname(__FILE__) . '/' . 'components/page.php';


    function GetConnectionOptions()
    {
        $result = GetGlobalConnectionOptions();
        $result['client_encoding'] = 'utf-8';
        GetApplication()->GetUserAuthorizationStrategy()->ApplyIdentityToConnectionOptions($result);
        return $result;
    }

    
    // OnGlobalBeforePageExecute event handler
    
    
    // OnBeforePageExecute event handler
    
    
    
    class dbo_AlterLogPage extends Page
    {
        protected function DoBeforeCreate()
        {
            $this->dataset = new TableDataset(
                new SqlSrvConnectionFactory(),
                GetConnectionOptions(),
                '[dbo].[AlterLog]');
            $field = new IntegerField('Id', null, null, true);
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, true);
            $field = new StringField('EventType');
            $this->dataset->AddField($field, false);
            $field = new StringField('ObjectName');
            $this->dataset->AddField($field, false);
            $field = new StringField('ObjectType');
            $this->dataset->AddField($field, false);
            $field = new StringField('TSQLCommand');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new DateTimeField('EventTime');
            $this->dataset->AddField($field, false);
            $field = new StringField('LoginName');
            $this->dataset->AddField($field, false);
            $field = new StringField('ServerName');
            $this->dataset->AddField($field, false);
            $field = new StringField('DatabaseName');
            $this->dataset->AddField($field, false);
            $field = new StringField('SchemaName');
            $this->dataset->AddField($field, false);
            $field = new StringField('HostName');
            $this->dataset->AddField($field, false);
            $field = new StringField('IPAddress');
            $this->dataset->AddField($field, false);
            $field = new StringField('ProgramName');
            $this->dataset->AddField($field, false);
            $field = new StringField('IPAddressClient');
            $this->dataset->AddField($field, false);
        }
    
        protected function DoPrepare() {
    
        }
    
        protected function CreatePageNavigator()
        {
            $result = new CompositePageNavigator($this);
            
            $partitionNavigator = new PageNavigator('pnav', $this, $this->dataset);
            $partitionNavigator->SetRowsPerPage(20);
            $result->AddPageNavigator($partitionNavigator);
            
            return $result;
        }
    
        protected function CreateRssGenerator()
        {
            return null;
        }
    
        protected function CreateGridSearchControl(Grid $grid)
        {
            $grid->UseFilter = true;
            $grid->SearchControl = new SimpleSearch('dbo_AlterLogssearch', $this->dataset,
                array('EventType', 'ObjectName', 'ObjectType', 'EventTime', 'DatabaseName', 'HostName'),
                array($this->RenderText('EventType'), $this->RenderText('ObjectName'), $this->RenderText('ObjectType'), $this->RenderText('EventTime'), $this->RenderText('DatabaseName'), $this->RenderText('HostName')),
                array(
                    '=' => $this->GetLocalizerCaptions()->GetMessageString('equals'),
                    '<>' => $this->GetLocalizerCaptions()->GetMessageString('doesNotEquals'),
                    '<' => $this->GetLocalizerCaptions()->GetMessageString('isLessThan'),
                    '<=' => $this->GetLocalizerCaptions()->GetMessageString('isLessThanOrEqualsTo'),
                    '>' => $this->GetLocalizerCaptions()->GetMessageString('isGreaterThan'),
                    '>=' => $this->GetLocalizerCaptions()->GetMessageString('isGreaterThanOrEqualsTo'),
                    'ILIKE' => $this->GetLocalizerCaptions()->GetMessageString('Like'),
                    'STARTS' => $this->GetLocalizerCaptions()->GetMessageString('StartsWith'),
                    'ENDS' => $this->GetLocalizerCaptions()->GetMessageString('EndsWith'),
                    'CONTAINS' => $this->GetLocalizerCaptions()->GetMessageString('Contains')
                    ), $this->GetLocalizerCaptions(), $this, 'CONTAINS'
                );
        }
    
        protected function CreateGridAdvancedSearchControl(Grid $grid)
        {
            $this->AdvancedSearchControl = new AdvancedSearchControl('dbo_AlterLogasearch', $this->dataset, $this->GetLocalizerCaptions(), $this->GetColumnVariableContainer(), $this->CreateLinkBuilder());
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('EventType', $this->RenderText('EventType')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('ObjectName', $this->RenderText('ObjectName')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('ObjectType', $this->RenderText('ObjectType')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateDateTimeSearchInput('EventTime', $this->RenderText('EventTime'), 'Y-m-d H:i:s'));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('DatabaseName', $this->RenderText('DatabaseName')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('HostName', $this->RenderText('HostName')));
        }
    
        protected function AddOperationsColumns(Grid $grid)
        {
            $actions = $grid->getActions();
            $actions->setCaption($this->GetLocalizerCaptions()->GetMessageString('Actions'));
            $actions->setPosition(ActionList::POSITION_LEFT);
            if ($this->GetSecurityInfo()->HasViewGrant())
            {
                $operation = new LinkOperation($this->GetLocalizerCaptions()->GetMessageString('View'), OPERATION_VIEW, $this->dataset, $grid);
                $operation->setUseImage(true);
                $actions->addOperation($operation);
            }
        }
    
        protected function AddFieldColumns(Grid $grid)
        {
            //
            // View column for EventType field
            //
            $column = new TextViewColumn('EventType', 'EventType', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for ObjectName field
            //
            $column = new TextViewColumn('ObjectName', 'ObjectName', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('dbo_AlterLogGrid_ObjectName_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for ObjectType field
            //
            $column = new TextViewColumn('ObjectType', 'ObjectType', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for EventTime field
            //
            $column = new DateTimeViewColumn('EventTime', 'EventTime', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d H:i:s');
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for DatabaseName field
            //
            $column = new TextViewColumn('DatabaseName', 'DatabaseName', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('dbo_AlterLogGrid_DatabaseName_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for HostName field
            //
            $column = new TextViewColumn('HostName', 'HostName', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('dbo_AlterLogGrid_HostName_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
        }
    
        protected function AddSingleRecordViewColumns(Grid $grid)
        {
            //
            // View column for EventType field
            //
            $column = new TextViewColumn('EventType', 'EventType', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for ObjectName field
            //
            $column = new TextViewColumn('ObjectName', 'ObjectName', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('dbo_AlterLogGrid_ObjectName_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for ObjectType field
            //
            $column = new TextViewColumn('ObjectType', 'ObjectType', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for TSQLCommand field
            //
            $column = new TextViewColumn('TSQLCommand', 'TSQLCommand', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for EventTime field
            //
            $column = new DateTimeViewColumn('EventTime', 'EventTime', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d H:i:s');
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for LoginName field
            //
            $column = new TextViewColumn('LoginName', 'LoginName', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('dbo_AlterLogGrid_LoginName_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for ServerName field
            //
            $column = new TextViewColumn('ServerName', 'ServerName', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('dbo_AlterLogGrid_ServerName_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for DatabaseName field
            //
            $column = new TextViewColumn('DatabaseName', 'DatabaseName', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('dbo_AlterLogGrid_DatabaseName_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for SchemaName field
            //
            $column = new TextViewColumn('SchemaName', 'SchemaName', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('dbo_AlterLogGrid_SchemaName_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for HostName field
            //
            $column = new TextViewColumn('HostName', 'HostName', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('dbo_AlterLogGrid_HostName_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for IPAddress field
            //
            $column = new TextViewColumn('IPAddress', 'IPAddress', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for ProgramName field
            //
            $column = new TextViewColumn('ProgramName', 'ProgramName', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('dbo_AlterLogGrid_ProgramName_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for IPAddressClient field
            //
            $column = new TextViewColumn('IPAddressClient', 'IPAddressClient', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
        }
    
        protected function AddEditColumns(Grid $grid)
        {
    
        }
    
        protected function AddInsertColumns(Grid $grid)
        {
    
            if ($this->GetSecurityInfo()->HasAddGrant())
            {
                $grid->SetShowAddButton(false);
                $grid->SetShowInlineAddButton(false);
            }
            else
            {
                $grid->SetShowInlineAddButton(false);
                $grid->SetShowAddButton(false);
            }
        }
    
        protected function AddPrintColumns(Grid $grid)
        {
            //
            // View column for EventType field
            //
            $column = new TextViewColumn('EventType', 'EventType', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for ObjectName field
            //
            $column = new TextViewColumn('ObjectName', 'ObjectName', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for ObjectType field
            //
            $column = new TextViewColumn('ObjectType', 'ObjectType', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for TSQLCommand field
            //
            $column = new TextViewColumn('TSQLCommand', 'TSQLCommand', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for EventTime field
            //
            $column = new DateTimeViewColumn('EventTime', 'EventTime', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d H:i:s');
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for LoginName field
            //
            $column = new TextViewColumn('LoginName', 'LoginName', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for ServerName field
            //
            $column = new TextViewColumn('ServerName', 'ServerName', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for DatabaseName field
            //
            $column = new TextViewColumn('DatabaseName', 'DatabaseName', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for SchemaName field
            //
            $column = new TextViewColumn('SchemaName', 'SchemaName', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for HostName field
            //
            $column = new TextViewColumn('HostName', 'HostName', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for IPAddress field
            //
            $column = new TextViewColumn('IPAddress', 'IPAddress', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for ProgramName field
            //
            $column = new TextViewColumn('ProgramName', 'ProgramName', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for IPAddressClient field
            //
            $column = new TextViewColumn('IPAddressClient', 'IPAddressClient', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
        }
    
        protected function AddExportColumns(Grid $grid)
        {
            //
            // View column for EventType field
            //
            $column = new TextViewColumn('EventType', 'EventType', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for ObjectName field
            //
            $column = new TextViewColumn('ObjectName', 'ObjectName', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for ObjectType field
            //
            $column = new TextViewColumn('ObjectType', 'ObjectType', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for TSQLCommand field
            //
            $column = new TextViewColumn('TSQLCommand', 'TSQLCommand', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for EventTime field
            //
            $column = new DateTimeViewColumn('EventTime', 'EventTime', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d H:i:s');
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for LoginName field
            //
            $column = new TextViewColumn('LoginName', 'LoginName', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for ServerName field
            //
            $column = new TextViewColumn('ServerName', 'ServerName', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for DatabaseName field
            //
            $column = new TextViewColumn('DatabaseName', 'DatabaseName', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for SchemaName field
            //
            $column = new TextViewColumn('SchemaName', 'SchemaName', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for HostName field
            //
            $column = new TextViewColumn('HostName', 'HostName', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for IPAddress field
            //
            $column = new TextViewColumn('IPAddress', 'IPAddress', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for ProgramName field
            //
            $column = new TextViewColumn('ProgramName', 'ProgramName', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for IPAddressClient field
            //
            $column = new TextViewColumn('IPAddressClient', 'IPAddressClient', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
        }
    
        public function GetPageDirection()
        {
            return null;
        }
    
        protected function ApplyCommonColumnEditProperties(CustomEditColumn $column)
        {
            $column->SetDisplaySetToNullCheckBox(false);
            $column->SetDisplaySetToDefaultCheckBox(false);
    		$column->SetVariableContainer($this->GetColumnVariableContainer());
        }
    
        function GetCustomClientScript()
        {
            return ;
        }
        
        function GetOnPageLoadedClientScript()
        {
            return ;
        }
    
        protected function CreateGrid()
        {
            $result = new Grid($this, $this->dataset, 'dbo_AlterLogGrid');
            if ($this->GetSecurityInfo()->HasDeleteGrant())
               $result->SetAllowDeleteSelected(false);
            else
               $result->SetAllowDeleteSelected(false);   
            
            ApplyCommonPageSettings($this, $result);
            
            $result->SetUseImagesForActions(true);
            $result->SetUseFixedHeader(false);
            $result->SetShowLineNumbers(false);
            $result->SetShowKeyColumnsImagesInHeader(false);
            $result->SetViewMode(ViewMode::TABLE);
            $result->setEnableRuntimeCustomization(false);
            $result->setTableBordered(false);
            $result->setTableCondensed(false);
            
            $result->SetHighlightRowAtHover(false);
            $result->SetWidth('');
            $this->CreateGridSearchControl($result);
            $this->CreateGridAdvancedSearchControl($result);
            $this->AddOperationsColumns($result);
            $this->AddFieldColumns($result);
            $this->AddSingleRecordViewColumns($result);
            $this->AddEditColumns($result);
            $this->AddInsertColumns($result);
            $this->AddPrintColumns($result);
            $this->AddExportColumns($result);
    
            $this->SetShowPageList(true);
            $this->SetExportToExcelAvailable(true);
            $this->SetExportToWordAvailable(true);
            $this->SetExportToXmlAvailable(true);
            $this->SetExportToCsvAvailable(true);
            $this->SetExportToPdfAvailable(true);
            $this->SetPrinterFriendlyAvailable(true);
            $this->SetSimpleSearchAvailable(true);
            $this->SetAdvancedSearchAvailable(false);
            $this->SetVisualEffectsEnabled(true);
            $this->SetShowTopPageNavigator(true);
            $this->SetShowBottomPageNavigator(true);
    
            //
            // Http Handlers
            //
            //
            // View column for ObjectName field
            //
            $column = new TextViewColumn('ObjectName', 'ObjectName', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'dbo_AlterLogGrid_ObjectName_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for DatabaseName field
            //
            $column = new TextViewColumn('DatabaseName', 'DatabaseName', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'dbo_AlterLogGrid_DatabaseName_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for HostName field
            //
            $column = new TextViewColumn('HostName', 'HostName', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'dbo_AlterLogGrid_HostName_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);//
            // View column for ObjectName field
            //
            $column = new TextViewColumn('ObjectName', 'ObjectName', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'dbo_AlterLogGrid_ObjectName_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for LoginName field
            //
            $column = new TextViewColumn('LoginName', 'LoginName', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'dbo_AlterLogGrid_LoginName_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for ServerName field
            //
            $column = new TextViewColumn('ServerName', 'ServerName', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'dbo_AlterLogGrid_ServerName_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for DatabaseName field
            //
            $column = new TextViewColumn('DatabaseName', 'DatabaseName', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'dbo_AlterLogGrid_DatabaseName_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for SchemaName field
            //
            $column = new TextViewColumn('SchemaName', 'SchemaName', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'dbo_AlterLogGrid_SchemaName_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for HostName field
            //
            $column = new TextViewColumn('HostName', 'HostName', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'dbo_AlterLogGrid_HostName_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for ProgramName field
            //
            $column = new TextViewColumn('ProgramName', 'ProgramName', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'dbo_AlterLogGrid_ProgramName_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            return $result;
        }
        
        public function OpenAdvancedSearchByDefault()
        {
            return false;
        }
    
        protected function DoGetGridHeader()
        {
            return '';
        }
    }



    try
    {
        $Page = new dbo_AlterLogPage("Detalle Objetos.php", "dbo_AlterLog", GetCurrentUserGrantForDataSource("dbo.AlterLog"), 'UTF-8');
        $Page->SetShortCaption('Detalle Objetos');
        $Page->SetHeader(GetPagesHeader());
        $Page->SetFooter(GetPagesFooter());
        $Page->SetCaption('');
        $Page->SetRecordPermission(GetCurrentUserRecordPermissionsForDataSource("dbo.AlterLog"));
        GetApplication()->SetEnableLessRunTimeCompile(GetEnableLessFilesRunTimeCompilation());
        GetApplication()->SetCanUserChangeOwnPassword(
            !function_exists('CanUserChangeOwnPassword') || CanUserChangeOwnPassword());
        GetApplication()->SetMainPage($Page);
        GetApplication()->Run();
    }
    catch(Exception $e)
    {
        ShowErrorPage($e->getMessage());
    }
	
