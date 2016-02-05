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

    
    
    // OnBeforePageExecute event handler
    
    
    
    class dbo_AlterLogDetailView0dbo_BaseDatosPage extends DetailPage
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
    
        protected function AddFieldColumns(Grid $grid)
        {
            //
            // View column for EventType field
            //
            $column = new TextViewColumn('EventType', 'EventType', $this->dataset);
            $column->SetOrderable(false);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for ObjectName field
            //
            $column = new TextViewColumn('ObjectName', 'ObjectName', $this->dataset);
            $column->SetOrderable(false);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('dbo_AlterLogDetailViewGrid0dbo_BaseDatos_ObjectName_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for ObjectType field
            //
            $column = new TextViewColumn('ObjectType', 'ObjectType', $this->dataset);
            $column->SetOrderable(false);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for EventTime field
            //
            $column = new DateTimeViewColumn('EventTime', 'EventTime', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d H:i:s');
            $column->SetOrderable(false);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for DatabaseName field
            //
            $column = new TextViewColumn('DatabaseName', 'DatabaseName', $this->dataset);
            $column->SetOrderable(false);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('dbo_AlterLogDetailViewGrid0dbo_BaseDatos_DatabaseName_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for HostName field
            //
            $column = new TextViewColumn('HostName', 'HostName', $this->dataset);
            $column->SetOrderable(false);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('dbo_AlterLogDetailViewGrid0dbo_BaseDatos_HostName_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
        }
        
        function GetCustomClientScript()
        {
            return ;
        }
        
        function GetOnPageLoadedClientScript()
        {
            return ;
        }
    
        public function GetPageDirection()
        {
            return null;
        }
    
        protected function ApplyCommonColumnEditProperties(CustomEditColumn $column)
        {
            $column->SetDisplaySetToNullCheckBox(false);
            $column->SetDisplaySetToDefaultCheckBox(false);
        }
    
        protected function CreateGrid()
        {
            $result = new Grid($this, $this->dataset, 'dbo_AlterLogDetailViewGrid0dbo_BaseDatos');
            $result->SetAllowDeleteSelected(false);
            $result->SetUseFixedHeader(false);
            $result->SetShowLineNumbers(false);
            $result->SetShowKeyColumnsImagesInHeader(false);
            $result->SetViewMode(ViewMode::TABLE);
            $result->setEnableRuntimeCustomization(false);
            $result->setTableBordered(false);
            $result->setTableCondensed(false);
            
            $result->SetHighlightRowAtHover(false);
            $result->SetWidth('');
            $this->AddFieldColumns($result);
            //
            // View column for ObjectName field
            //
            $column = new TextViewColumn('ObjectName', 'ObjectName', $this->dataset);
            $column->SetOrderable(false);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'dbo_AlterLogDetailViewGrid0dbo_BaseDatos_ObjectName_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for DatabaseName field
            //
            $column = new TextViewColumn('DatabaseName', 'DatabaseName', $this->dataset);
            $column->SetOrderable(false);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'dbo_AlterLogDetailViewGrid0dbo_BaseDatos_DatabaseName_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for HostName field
            //
            $column = new TextViewColumn('HostName', 'HostName', $this->dataset);
            $column->SetOrderable(false);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'dbo_AlterLogDetailViewGrid0dbo_BaseDatos_HostName_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            return $result;
        }
    }
    
    
    
    // OnBeforePageExecute event handler
    
    
    
    class dbo_AlterLogDetailEdit0dbo_BaseDatosPage extends DetailPageEdit
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
            $grid->SearchControl = new SimpleSearch('dbo_AlterLogDetailEdit0dbo_BaseDatosssearch', $this->dataset,
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
            $this->AdvancedSearchControl = new AdvancedSearchControl('dbo_AlterLogDetailEdit0dbo_BaseDatosasearch', $this->dataset, $this->GetLocalizerCaptions(), $this->GetColumnVariableContainer(), $this->CreateLinkBuilder());
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('EventType', $this->RenderText('EventType')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('ObjectName', $this->RenderText('ObjectName')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('ObjectType', $this->RenderText('ObjectType')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateDateTimeSearchInput('EventTime', $this->RenderText('EventTime'), 'Y-m-d H:i:s'));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('DatabaseName', $this->RenderText('DatabaseName')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('HostName', $this->RenderText('HostName')));
        }
    
        public function GetPageDirection()
        {
            return null;
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
            $column->SetFullTextWindowHandlerName('dbo_AlterLogDetailEditGrid0dbo_BaseDatos_ObjectName_handler_list');
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
            $column->SetFullTextWindowHandlerName('dbo_AlterLogDetailEditGrid0dbo_BaseDatos_DatabaseName_handler_list');
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
            $column->SetFullTextWindowHandlerName('dbo_AlterLogDetailEditGrid0dbo_BaseDatos_HostName_handler_list');
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
            $column->SetFullTextWindowHandlerName('dbo_AlterLogDetailEditGrid0dbo_BaseDatos_ObjectName_handler_view');
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
            $column->SetFullTextWindowHandlerName('dbo_AlterLogDetailEditGrid0dbo_BaseDatos_LoginName_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for ServerName field
            //
            $column = new TextViewColumn('ServerName', 'ServerName', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('dbo_AlterLogDetailEditGrid0dbo_BaseDatos_ServerName_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for DatabaseName field
            //
            $column = new TextViewColumn('DatabaseName', 'DatabaseName', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('dbo_AlterLogDetailEditGrid0dbo_BaseDatos_DatabaseName_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for SchemaName field
            //
            $column = new TextViewColumn('SchemaName', 'SchemaName', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('dbo_AlterLogDetailEditGrid0dbo_BaseDatos_SchemaName_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for HostName field
            //
            $column = new TextViewColumn('HostName', 'HostName', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('dbo_AlterLogDetailEditGrid0dbo_BaseDatos_HostName_handler_view');
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
            $column->SetFullTextWindowHandlerName('dbo_AlterLogDetailEditGrid0dbo_BaseDatos_ProgramName_handler_view');
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
            $result = new Grid($this, $this->dataset, 'dbo_AlterLogDetailEditGrid0dbo_BaseDatos');
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
            $this->SetAdvancedSearchAvailable(true);
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
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'dbo_AlterLogDetailEditGrid0dbo_BaseDatos_ObjectName_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for DatabaseName field
            //
            $column = new TextViewColumn('DatabaseName', 'DatabaseName', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'dbo_AlterLogDetailEditGrid0dbo_BaseDatos_DatabaseName_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for HostName field
            //
            $column = new TextViewColumn('HostName', 'HostName', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'dbo_AlterLogDetailEditGrid0dbo_BaseDatos_HostName_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);//
            // View column for ObjectName field
            //
            $column = new TextViewColumn('ObjectName', 'ObjectName', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'dbo_AlterLogDetailEditGrid0dbo_BaseDatos_ObjectName_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for LoginName field
            //
            $column = new TextViewColumn('LoginName', 'LoginName', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'dbo_AlterLogDetailEditGrid0dbo_BaseDatos_LoginName_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for ServerName field
            //
            $column = new TextViewColumn('ServerName', 'ServerName', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'dbo_AlterLogDetailEditGrid0dbo_BaseDatos_ServerName_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for DatabaseName field
            //
            $column = new TextViewColumn('DatabaseName', 'DatabaseName', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'dbo_AlterLogDetailEditGrid0dbo_BaseDatos_DatabaseName_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for SchemaName field
            //
            $column = new TextViewColumn('SchemaName', 'SchemaName', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'dbo_AlterLogDetailEditGrid0dbo_BaseDatos_SchemaName_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for HostName field
            //
            $column = new TextViewColumn('HostName', 'HostName', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'dbo_AlterLogDetailEditGrid0dbo_BaseDatos_HostName_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for ProgramName field
            //
            $column = new TextViewColumn('ProgramName', 'ProgramName', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'dbo_AlterLogDetailEditGrid0dbo_BaseDatos_ProgramName_handler_view', $column);
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
    
    
    
    // OnBeforePageExecute event handler
    
    
    
    class dbo_procesosDetailView1dbo_BaseDatosPage extends DetailPage
    {
        protected function DoBeforeCreate()
        {
            $this->dataset = new TableDataset(
                new SqlSrvConnectionFactory(),
                GetConnectionOptions(),
                '[dbo].[procesos]');
            $field = new IntegerField('Id', null, null, true);
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, true);
            $field = new IntegerField('Process ID');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, true);
            $field = new StringField('HostName');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, true);
            $field = new StringField('User');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, true);
            $field = new StringField('Database');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, true);
            $field = new StringField('Query');
            $this->dataset->AddField($field, true);
            $field = new StringField('Status');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, true);
            $field = new IntegerField('Open Transactions');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, true);
            $field = new StringField('Command');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, true);
            $field = new StringField('Application');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, true);
            $field = new IntegerField('Wait Time');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, true);
            $field = new StringField('Wait Type');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, true);
            $field = new IntegerField('CPU');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, true);
            $field = new IntegerField('Physical IO');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, true);
            $field = new IntegerField('Memory Usage');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, true);
            $field = new DateTimeField('Login Time');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, true);
            $field = new DateTimeField('Last Batch');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, true);
            $field = new IntegerField('Blocked By');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, true);
            $field = new StringField('Blocked By Query');
            $this->dataset->AddField($field, true);
            $field = new IntegerField('Blocking');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, true);
            $field = new DateTimeField('Register Date');
            $this->dataset->AddField($field, true);
        }
    
        protected function DoPrepare() {
    
        }
    
        protected function AddFieldColumns(Grid $grid)
        {
            //
            // View column for HostName field
            //
            $column = new TextViewColumn('HostName', 'HostName', $this->dataset);
            $column->SetOrderable(false);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('dbo_procesosDetailViewGrid1dbo_BaseDatos_HostName_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for User field
            //
            $column = new TextViewColumn('User', 'User', $this->dataset);
            $column->SetOrderable(false);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('dbo_procesosDetailViewGrid1dbo_BaseDatos_User_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Database field
            //
            $column = new TextViewColumn('Database', 'Database', $this->dataset);
            $column->SetOrderable(false);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('dbo_procesosDetailViewGrid1dbo_BaseDatos_Database_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Query field
            //
            $column = new TextViewColumn('Query', 'Query', $this->dataset);
            $column->SetOrderable(false);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Status field
            //
            $column = new TextViewColumn('Status', 'Status', $this->dataset);
            $column->SetOrderable(false);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Open Transactions field
            //
            $column = new TextViewColumn('Open Transactions', 'Open Transactions', $this->dataset);
            $column->SetOrderable(false);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Command field
            //
            $column = new TextViewColumn('Command', 'Command', $this->dataset);
            $column->SetOrderable(false);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Application field
            //
            $column = new TextViewColumn('Application', 'Application', $this->dataset);
            $column->SetOrderable(false);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('dbo_procesosDetailViewGrid1dbo_BaseDatos_Application_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Wait Time field
            //
            $column = new TextViewColumn('Wait Time', 'Wait Time', $this->dataset);
            $column->SetOrderable(false);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Wait Type field
            //
            $column = new TextViewColumn('Wait Type', 'Wait Type', $this->dataset);
            $column->SetOrderable(false);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for CPU field
            //
            $column = new TextViewColumn('CPU', 'CPU', $this->dataset);
            $column->SetOrderable(false);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Physical IO field
            //
            $column = new TextViewColumn('Physical IO', 'Physical IO', $this->dataset);
            $column->SetOrderable(false);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Memory Usage field
            //
            $column = new TextViewColumn('Memory Usage', 'Memory Usage', $this->dataset);
            $column->SetOrderable(false);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Login Time field
            //
            $column = new DateTimeViewColumn('Login Time', 'Login Time', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d H:i:s');
            $column->SetOrderable(false);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Last Batch field
            //
            $column = new DateTimeViewColumn('Last Batch', 'Last Batch', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d H:i:s');
            $column->SetOrderable(false);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Blocked By field
            //
            $column = new TextViewColumn('Blocked By', 'Blocked By', $this->dataset);
            $column->SetOrderable(false);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Blocked By Query field
            //
            $column = new TextViewColumn('Blocked By Query', 'Blocked By Query', $this->dataset);
            $column->SetOrderable(false);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Blocking field
            //
            $column = new TextViewColumn('Blocking', 'Blocking', $this->dataset);
            $column->SetOrderable(false);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
        }
        
        function GetCustomClientScript()
        {
            return ;
        }
        
        function GetOnPageLoadedClientScript()
        {
            return ;
        }
    
        public function GetPageDirection()
        {
            return null;
        }
    
        protected function ApplyCommonColumnEditProperties(CustomEditColumn $column)
        {
            $column->SetDisplaySetToNullCheckBox(false);
            $column->SetDisplaySetToDefaultCheckBox(false);
        }
    
        protected function CreateGrid()
        {
            $result = new Grid($this, $this->dataset, 'dbo_procesosDetailViewGrid1dbo_BaseDatos');
            $result->SetAllowDeleteSelected(false);
            $result->SetUseFixedHeader(false);
            $result->SetShowLineNumbers(false);
            $result->SetShowKeyColumnsImagesInHeader(false);
            $result->SetViewMode(ViewMode::TABLE);
            $result->setEnableRuntimeCustomization(false);
            $result->setTableBordered(false);
            $result->setTableCondensed(false);
            
            $result->SetHighlightRowAtHover(false);
            $result->SetWidth('');
            $this->AddFieldColumns($result);
            //
            // View column for HostName field
            //
            $column = new TextViewColumn('HostName', 'HostName', $this->dataset);
            $column->SetOrderable(false);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'dbo_procesosDetailViewGrid1dbo_BaseDatos_HostName_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for User field
            //
            $column = new TextViewColumn('User', 'User', $this->dataset);
            $column->SetOrderable(false);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'dbo_procesosDetailViewGrid1dbo_BaseDatos_User_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Database field
            //
            $column = new TextViewColumn('Database', 'Database', $this->dataset);
            $column->SetOrderable(false);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'dbo_procesosDetailViewGrid1dbo_BaseDatos_Database_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Application field
            //
            $column = new TextViewColumn('Application', 'Application', $this->dataset);
            $column->SetOrderable(false);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'dbo_procesosDetailViewGrid1dbo_BaseDatos_Application_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            return $result;
        }
    }
    
    
    
    // OnBeforePageExecute event handler
    
    
    
    class dbo_procesosDetailEdit1dbo_BaseDatosPage extends DetailPageEdit
    {
        protected function DoBeforeCreate()
        {
            $this->dataset = new TableDataset(
                new SqlSrvConnectionFactory(),
                GetConnectionOptions(),
                '[dbo].[procesos]');
            $field = new IntegerField('Id', null, null, true);
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, true);
            $field = new IntegerField('Process ID');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, true);
            $field = new StringField('HostName');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, true);
            $field = new StringField('User');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, true);
            $field = new StringField('Database');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, true);
            $field = new StringField('Query');
            $this->dataset->AddField($field, true);
            $field = new StringField('Status');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, true);
            $field = new IntegerField('Open Transactions');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, true);
            $field = new StringField('Command');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, true);
            $field = new StringField('Application');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, true);
            $field = new IntegerField('Wait Time');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, true);
            $field = new StringField('Wait Type');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, true);
            $field = new IntegerField('CPU');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, true);
            $field = new IntegerField('Physical IO');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, true);
            $field = new IntegerField('Memory Usage');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, true);
            $field = new DateTimeField('Login Time');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, true);
            $field = new DateTimeField('Last Batch');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, true);
            $field = new IntegerField('Blocked By');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, true);
            $field = new StringField('Blocked By Query');
            $this->dataset->AddField($field, true);
            $field = new IntegerField('Blocking');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, true);
            $field = new DateTimeField('Register Date');
            $this->dataset->AddField($field, true);
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
            $grid->SearchControl = new SimpleSearch('dbo_procesosDetailEdit1dbo_BaseDatosssearch', $this->dataset,
                array('Id', 'Process ID', 'HostName', 'User', 'Database', 'Query', 'Status', 'Open Transactions', 'Command', 'Application', 'Wait Time', 'Wait Type', 'CPU', 'Physical IO', 'Memory Usage', 'Login Time', 'Last Batch', 'Blocked By', 'Blocked By Query', 'Blocking', 'Register Date'),
                array($this->RenderText('Id'), $this->RenderText('Process ID'), $this->RenderText('HostName'), $this->RenderText('User'), $this->RenderText('Database'), $this->RenderText('Query'), $this->RenderText('Status'), $this->RenderText('Open Transactions'), $this->RenderText('Command'), $this->RenderText('Application'), $this->RenderText('Wait Time'), $this->RenderText('Wait Type'), $this->RenderText('CPU'), $this->RenderText('Physical IO'), $this->RenderText('Memory Usage'), $this->RenderText('Login Time'), $this->RenderText('Last Batch'), $this->RenderText('Blocked By'), $this->RenderText('Blocked By Query'), $this->RenderText('Blocking'), $this->RenderText('Register Date')),
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
            $this->AdvancedSearchControl = new AdvancedSearchControl('dbo_procesosDetailEdit1dbo_BaseDatosasearch', $this->dataset, $this->GetLocalizerCaptions(), $this->GetColumnVariableContainer(), $this->CreateLinkBuilder());
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Id', $this->RenderText('Id')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Process ID', $this->RenderText('Process ID')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('HostName', $this->RenderText('HostName')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('User', $this->RenderText('User')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Database', $this->RenderText('Database')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Query', $this->RenderText('Query')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Status', $this->RenderText('Status')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Open Transactions', $this->RenderText('Open Transactions')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Command', $this->RenderText('Command')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Application', $this->RenderText('Application')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Wait Time', $this->RenderText('Wait Time')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Wait Type', $this->RenderText('Wait Type')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('CPU', $this->RenderText('CPU')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Physical IO', $this->RenderText('Physical IO')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Memory Usage', $this->RenderText('Memory Usage')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateDateTimeSearchInput('Login Time', $this->RenderText('Login Time'), 'Y-m-d H:i:s'));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateDateTimeSearchInput('Last Batch', $this->RenderText('Last Batch'), 'Y-m-d H:i:s'));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Blocked By', $this->RenderText('Blocked By')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Blocked By Query', $this->RenderText('Blocked By Query')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Blocking', $this->RenderText('Blocking')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateDateTimeSearchInput('Register Date', $this->RenderText('Register Date'), 'Y-m-d H:i:s'));
        }
    
        public function GetPageDirection()
        {
            return null;
        }
    
        protected function AddOperationsColumns(Grid $grid)
        {
    
        }
    
        protected function AddFieldColumns(Grid $grid)
        {
            //
            // View column for HostName field
            //
            $column = new TextViewColumn('HostName', 'HostName', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('dbo_procesosDetailEditGrid1dbo_BaseDatos_HostName_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for User field
            //
            $column = new TextViewColumn('User', 'User', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('dbo_procesosDetailEditGrid1dbo_BaseDatos_User_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Database field
            //
            $column = new TextViewColumn('Database', 'Database', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('dbo_procesosDetailEditGrid1dbo_BaseDatos_Database_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Query field
            //
            $column = new TextViewColumn('Query', 'Query', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Status field
            //
            $column = new TextViewColumn('Status', 'Status', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Open Transactions field
            //
            $column = new TextViewColumn('Open Transactions', 'Open Transactions', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Command field
            //
            $column = new TextViewColumn('Command', 'Command', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Application field
            //
            $column = new TextViewColumn('Application', 'Application', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('dbo_procesosDetailEditGrid1dbo_BaseDatos_Application_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Wait Time field
            //
            $column = new TextViewColumn('Wait Time', 'Wait Time', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Wait Type field
            //
            $column = new TextViewColumn('Wait Type', 'Wait Type', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for CPU field
            //
            $column = new TextViewColumn('CPU', 'CPU', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Physical IO field
            //
            $column = new TextViewColumn('Physical IO', 'Physical IO', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Memory Usage field
            //
            $column = new TextViewColumn('Memory Usage', 'Memory Usage', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Login Time field
            //
            $column = new DateTimeViewColumn('Login Time', 'Login Time', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d H:i:s');
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Last Batch field
            //
            $column = new DateTimeViewColumn('Last Batch', 'Last Batch', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d H:i:s');
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Blocked By field
            //
            $column = new TextViewColumn('Blocked By', 'Blocked By', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Blocked By Query field
            //
            $column = new TextViewColumn('Blocked By Query', 'Blocked By Query', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Blocking field
            //
            $column = new TextViewColumn('Blocking', 'Blocking', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
        }
    
        protected function AddSingleRecordViewColumns(Grid $grid)
        {
            //
            // View column for Id field
            //
            $column = new TextViewColumn('Id', 'Id', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Process ID field
            //
            $column = new TextViewColumn('Process ID', 'Process ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for HostName field
            //
            $column = new TextViewColumn('HostName', 'HostName', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('dbo_procesosDetailEditGrid1dbo_BaseDatos_HostName_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for User field
            //
            $column = new TextViewColumn('User', 'User', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('dbo_procesosDetailEditGrid1dbo_BaseDatos_User_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Database field
            //
            $column = new TextViewColumn('Database', 'Database', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('dbo_procesosDetailEditGrid1dbo_BaseDatos_Database_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Query field
            //
            $column = new TextViewColumn('Query', 'Query', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Status field
            //
            $column = new TextViewColumn('Status', 'Status', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Open Transactions field
            //
            $column = new TextViewColumn('Open Transactions', 'Open Transactions', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Command field
            //
            $column = new TextViewColumn('Command', 'Command', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Application field
            //
            $column = new TextViewColumn('Application', 'Application', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('dbo_procesosDetailEditGrid1dbo_BaseDatos_Application_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Wait Time field
            //
            $column = new TextViewColumn('Wait Time', 'Wait Time', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Wait Type field
            //
            $column = new TextViewColumn('Wait Type', 'Wait Type', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for CPU field
            //
            $column = new TextViewColumn('CPU', 'CPU', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Physical IO field
            //
            $column = new TextViewColumn('Physical IO', 'Physical IO', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Memory Usage field
            //
            $column = new TextViewColumn('Memory Usage', 'Memory Usage', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Login Time field
            //
            $column = new DateTimeViewColumn('Login Time', 'Login Time', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d H:i:s');
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Last Batch field
            //
            $column = new DateTimeViewColumn('Last Batch', 'Last Batch', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d H:i:s');
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Blocked By field
            //
            $column = new TextViewColumn('Blocked By', 'Blocked By', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Blocked By Query field
            //
            $column = new TextViewColumn('Blocked By Query', 'Blocked By Query', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Blocking field
            //
            $column = new TextViewColumn('Blocking', 'Blocking', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Register Date field
            //
            $column = new DateTimeViewColumn('Register Date', 'Register Date', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d H:i:s');
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
            // View column for Id field
            //
            $column = new TextViewColumn('Id', 'Id', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Process ID field
            //
            $column = new TextViewColumn('Process ID', 'Process ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for HostName field
            //
            $column = new TextViewColumn('HostName', 'HostName', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for User field
            //
            $column = new TextViewColumn('User', 'User', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Database field
            //
            $column = new TextViewColumn('Database', 'Database', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Query field
            //
            $column = new TextViewColumn('Query', 'Query', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Status field
            //
            $column = new TextViewColumn('Status', 'Status', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Open Transactions field
            //
            $column = new TextViewColumn('Open Transactions', 'Open Transactions', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Command field
            //
            $column = new TextViewColumn('Command', 'Command', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Application field
            //
            $column = new TextViewColumn('Application', 'Application', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Wait Time field
            //
            $column = new TextViewColumn('Wait Time', 'Wait Time', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Wait Type field
            //
            $column = new TextViewColumn('Wait Type', 'Wait Type', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for CPU field
            //
            $column = new TextViewColumn('CPU', 'CPU', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Physical IO field
            //
            $column = new TextViewColumn('Physical IO', 'Physical IO', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Memory Usage field
            //
            $column = new TextViewColumn('Memory Usage', 'Memory Usage', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Login Time field
            //
            $column = new DateTimeViewColumn('Login Time', 'Login Time', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d H:i:s');
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Last Batch field
            //
            $column = new DateTimeViewColumn('Last Batch', 'Last Batch', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d H:i:s');
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Blocked By field
            //
            $column = new TextViewColumn('Blocked By', 'Blocked By', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Blocked By Query field
            //
            $column = new TextViewColumn('Blocked By Query', 'Blocked By Query', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Blocking field
            //
            $column = new TextViewColumn('Blocking', 'Blocking', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Register Date field
            //
            $column = new DateTimeViewColumn('Register Date', 'Register Date', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d H:i:s');
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
        }
    
        protected function AddExportColumns(Grid $grid)
        {
            //
            // View column for Id field
            //
            $column = new TextViewColumn('Id', 'Id', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Process ID field
            //
            $column = new TextViewColumn('Process ID', 'Process ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for HostName field
            //
            $column = new TextViewColumn('HostName', 'HostName', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for User field
            //
            $column = new TextViewColumn('User', 'User', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Database field
            //
            $column = new TextViewColumn('Database', 'Database', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Query field
            //
            $column = new TextViewColumn('Query', 'Query', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Status field
            //
            $column = new TextViewColumn('Status', 'Status', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Open Transactions field
            //
            $column = new TextViewColumn('Open Transactions', 'Open Transactions', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Command field
            //
            $column = new TextViewColumn('Command', 'Command', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Application field
            //
            $column = new TextViewColumn('Application', 'Application', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Wait Time field
            //
            $column = new TextViewColumn('Wait Time', 'Wait Time', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Wait Type field
            //
            $column = new TextViewColumn('Wait Type', 'Wait Type', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for CPU field
            //
            $column = new TextViewColumn('CPU', 'CPU', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Physical IO field
            //
            $column = new TextViewColumn('Physical IO', 'Physical IO', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Memory Usage field
            //
            $column = new TextViewColumn('Memory Usage', 'Memory Usage', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Login Time field
            //
            $column = new DateTimeViewColumn('Login Time', 'Login Time', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d H:i:s');
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Last Batch field
            //
            $column = new DateTimeViewColumn('Last Batch', 'Last Batch', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d H:i:s');
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Blocked By field
            //
            $column = new TextViewColumn('Blocked By', 'Blocked By', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Blocked By Query field
            //
            $column = new TextViewColumn('Blocked By Query', 'Blocked By Query', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Blocking field
            //
            $column = new TextViewColumn('Blocking', 'Blocking', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Register Date field
            //
            $column = new DateTimeViewColumn('Register Date', 'Register Date', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d H:i:s');
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
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
            $result = new Grid($this, $this->dataset, 'dbo_procesosDetailEditGrid1dbo_BaseDatos');
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
            $this->SetAdvancedSearchAvailable(true);
            $this->SetVisualEffectsEnabled(true);
            $this->SetShowTopPageNavigator(true);
            $this->SetShowBottomPageNavigator(true);
    
            //
            // Http Handlers
            //
            //
            // View column for HostName field
            //
            $column = new TextViewColumn('HostName', 'HostName', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'dbo_procesosDetailEditGrid1dbo_BaseDatos_HostName_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for User field
            //
            $column = new TextViewColumn('User', 'User', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'dbo_procesosDetailEditGrid1dbo_BaseDatos_User_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Database field
            //
            $column = new TextViewColumn('Database', 'Database', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'dbo_procesosDetailEditGrid1dbo_BaseDatos_Database_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Application field
            //
            $column = new TextViewColumn('Application', 'Application', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'dbo_procesosDetailEditGrid1dbo_BaseDatos_Application_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);//
            // View column for HostName field
            //
            $column = new TextViewColumn('HostName', 'HostName', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'dbo_procesosDetailEditGrid1dbo_BaseDatos_HostName_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for User field
            //
            $column = new TextViewColumn('User', 'User', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'dbo_procesosDetailEditGrid1dbo_BaseDatos_User_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Database field
            //
            $column = new TextViewColumn('Database', 'Database', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'dbo_procesosDetailEditGrid1dbo_BaseDatos_Database_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Application field
            //
            $column = new TextViewColumn('Application', 'Application', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'dbo_procesosDetailEditGrid1dbo_BaseDatos_Application_handler_view', $column);
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
    // OnGlobalBeforePageExecute event handler
    
    
    // OnBeforePageExecute event handler
    
    
    
    class dbo_BaseDatosPage extends Page
    {
        protected function DoBeforeCreate()
        {
            $this->dataset = new TableDataset(
                new SqlSrvConnectionFactory(),
                GetConnectionOptions(),
                '[dbo].[BaseDatos]');
            $field = new StringField('base_datos');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, true);
            $field = new DateTimeField('fecha_creacion');
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
            $grid->SearchControl = new SimpleSearch('dbo_BaseDatosssearch', $this->dataset,
                array('base_datos', 'fecha_creacion'),
                array($this->RenderText('Base Datos'), $this->RenderText('Fecha Creacion')),
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
            $this->AdvancedSearchControl = new AdvancedSearchControl('dbo_BaseDatosasearch', $this->dataset, $this->GetLocalizerCaptions(), $this->GetColumnVariableContainer(), $this->CreateLinkBuilder());
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('base_datos', $this->RenderText('Base Datos')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateDateTimeSearchInput('fecha_creacion', $this->RenderText('Fecha Creacion'), 'Y-m-d H:i:s'));
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
            if (GetCurrentUserGrantForDataSource('dbo.BaseDatos.dbo.AlterLog')->HasViewGrant())
            {
              //
            // View column for dbo_AlterLogDetailView0dbo_BaseDatos detail
            //
            $column = new DetailColumn(array('base_datos'), 'detail0dbo_BaseDatos', 'dbo_AlterLogDetailEdit0dbo_BaseDatos_handler', 'dbo_AlterLogDetailView0dbo_BaseDatos_handler', $this->dataset, 'Ver detalle', $this->RenderText(''));
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
              $grid->AddViewColumn($column);
            }
            
            if (GetCurrentUserGrantForDataSource('dbo.BaseDatos.')->HasViewGrant())
            {
              //
            // View column for dbo_procesosDetailView1dbo_BaseDatos detail
            //
            $column = new DetailColumn(array('base_datos'), 'detail1dbo_BaseDatos', 'dbo_procesosDetailEdit1dbo_BaseDatos_handler', 'dbo_procesosDetailView1dbo_BaseDatos_handler', $this->dataset, 'Ver Procesos', $this->RenderText(''));
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
              $grid->AddViewColumn($column);
            }
            
            //
            // View column for base_datos field
            //
            $column = new TextViewColumn('base_datos', 'Base Datos', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('dbo_BaseDatosGrid_base_datos_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for fecha_creacion field
            //
            $column = new DateTimeViewColumn('fecha_creacion', 'Fecha Creacion', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d H:i:s');
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
        }
    
        protected function AddSingleRecordViewColumns(Grid $grid)
        {
            //
            // View column for base_datos field
            //
            $column = new TextViewColumn('base_datos', 'Base Datos', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('dbo_BaseDatosGrid_base_datos_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for fecha_creacion field
            //
            $column = new DateTimeViewColumn('fecha_creacion', 'Fecha Creacion', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d H:i:s');
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
        }
    
        protected function AddEditColumns(Grid $grid)
        {
            //
            // Edit column for base_datos field
            //
            $editor = new TextAreaEdit('base_datos_edit', 50, 8);
            $editColumn = new CustomEditColumn('Base Datos', 'base_datos', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for fecha_creacion field
            //
            $editor = new DateTimeEdit('fecha_creacion_edit', false, 'Y-m-d H:i:s', GetFirstDayOfWeek());
            $editColumn = new CustomEditColumn('Fecha Creacion', 'fecha_creacion', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
        }
    
        protected function AddInsertColumns(Grid $grid)
        {
            //
            // Edit column for base_datos field
            //
            $editor = new TextAreaEdit('base_datos_edit', 50, 8);
            $editColumn = new CustomEditColumn('Base Datos', 'base_datos', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for fecha_creacion field
            //
            $editor = new DateTimeEdit('fecha_creacion_edit', false, 'Y-m-d H:i:s', GetFirstDayOfWeek());
            $editColumn = new CustomEditColumn('Fecha Creacion', 'fecha_creacion', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
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
            // View column for base_datos field
            //
            $column = new TextViewColumn('base_datos', 'Base Datos', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for fecha_creacion field
            //
            $column = new DateTimeViewColumn('fecha_creacion', 'Fecha Creacion', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d H:i:s');
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
        }
    
        protected function AddExportColumns(Grid $grid)
        {
            //
            // View column for base_datos field
            //
            $column = new TextViewColumn('base_datos', 'Base Datos', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for fecha_creacion field
            //
            $column = new DateTimeViewColumn('fecha_creacion', 'Fecha Creacion', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d H:i:s');
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
    
        function CreateMasterDetailRecordGridFordbo_AlterLogDetailEdit0dbo_BaseDatosGrid()
        {
            $result = new Grid($this, $this->dataset, 'MasterDetailRecordGridFordbo_AlterLogDetailEdit0dbo_BaseDatos');
            $result->SetAllowDeleteSelected(false);
            $result->SetShowFilterBuilder(false);
            $result->SetAdvancedSearchAvailable(false);
            $result->SetShowUpdateLink(false);
            $result->SetEnabledInlineEditing(false);
            $result->SetShowKeyColumnsImagesInHeader(false);
            $result->SetName('master_grid');
            $result->SetViewMode(ViewMode::CARD);
            $result->SetCardCountInRow(1);
            $result->setEnableRuntimeCustomization(false);
            $result->setTableBordered(false);
            $result->setTableCondensed(false);
            //
            // View column for base_datos field
            //
            $column = new TextViewColumn('base_datos', 'Base Datos', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('dbo_BaseDatosGrid_base_datos_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $result->AddViewColumn($column);
            
            //
            // View column for fecha_creacion field
            //
            $column = new DateTimeViewColumn('fecha_creacion', 'Fecha Creacion', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d H:i:s');
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $result->AddViewColumn($column);
            
            //
            // View column for base_datos field
            //
            $column = new TextViewColumn('base_datos', 'Base Datos', $this->dataset);
            $column->SetOrderable(true);
            $result->AddPrintColumn($column);
            
            //
            // View column for fecha_creacion field
            //
            $column = new DateTimeViewColumn('fecha_creacion', 'Fecha Creacion', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d H:i:s');
            $column->SetOrderable(true);
            $result->AddPrintColumn($column);
            
            return $result;
        }
        function CreateMasterDetailRecordGridFordbo_procesosDetailEdit1dbo_BaseDatosGrid()
        {
            $result = new Grid($this, $this->dataset, 'MasterDetailRecordGridFordbo_procesosDetailEdit1dbo_BaseDatos');
            $result->SetAllowDeleteSelected(false);
            $result->SetShowFilterBuilder(false);
            $result->SetAdvancedSearchAvailable(false);
            $result->SetShowUpdateLink(false);
            $result->SetEnabledInlineEditing(false);
            $result->SetShowKeyColumnsImagesInHeader(false);
            $result->SetName('master_grid');
            $result->SetViewMode(ViewMode::CARD);
            $result->SetCardCountInRow(1);
            $result->setEnableRuntimeCustomization(false);
            $result->setTableBordered(false);
            $result->setTableCondensed(false);
            //
            // View column for base_datos field
            //
            $column = new TextViewColumn('base_datos', 'Base Datos', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('dbo_BaseDatosGrid_base_datos_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $result->AddViewColumn($column);
            
            //
            // View column for fecha_creacion field
            //
            $column = new DateTimeViewColumn('fecha_creacion', 'Fecha Creacion', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d H:i:s');
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $result->AddViewColumn($column);
            
            //
            // View column for base_datos field
            //
            $column = new TextViewColumn('base_datos', 'Base Datos', $this->dataset);
            $column->SetOrderable(true);
            $result->AddPrintColumn($column);
            
            //
            // View column for fecha_creacion field
            //
            $column = new DateTimeViewColumn('fecha_creacion', 'Fecha Creacion', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d H:i:s');
            $column->SetOrderable(true);
            $result->AddPrintColumn($column);
            
            return $result;
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
            $result = new Grid($this, $this->dataset, 'dbo_BaseDatosGrid');
            if ($this->GetSecurityInfo()->HasDeleteGrant())
               $result->SetAllowDeleteSelected(false);
            else
               $result->SetAllowDeleteSelected(false);   
            
            ApplyCommonPageSettings($this, $result);
            
            $result->SetUseImagesForActions(true);
            $result->SetUseFixedHeader(false);
            $result->SetShowLineNumbers(false);
            $result->SetShowKeyColumnsImagesInHeader(false);
            $result->SetViewMode(ViewMode::CARD);
            $result->SetCardCountInRow(3);
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
            $pageView = new dbo_AlterLogDetailView0dbo_BaseDatosPage($this, '', '', array('DatabaseName'), GetCurrentUserGrantForDataSource('dbo.BaseDatos.dbo.AlterLog'), 'UTF-8', 20, 'dbo_AlterLogDetailEdit0dbo_BaseDatos_handler');
            
            $pageView->SetRecordPermission(GetCurrentUserRecordPermissionsForDataSource('dbo.BaseDatos.dbo.AlterLog'));
            $handler = new PageHTTPHandler('dbo_AlterLogDetailView0dbo_BaseDatos_handler', $pageView);
            GetApplication()->RegisterHTTPHandler($handler);
            $pageEdit = new dbo_AlterLogDetailEdit0dbo_BaseDatosPage($this, array('DatabaseName'), array('base_datos'), $this->GetForeingKeyFields(), $this->CreateMasterDetailRecordGridFordbo_AlterLogDetailEdit0dbo_BaseDatosGrid(), $this->dataset, GetCurrentUserGrantForDataSource('dbo.BaseDatos.dbo.AlterLog'), 'UTF-8');
            
            $pageEdit->SetRecordPermission(GetCurrentUserRecordPermissionsForDataSource('dbo.BaseDatos.dbo.AlterLog'));
            $pageEdit->SetShortCaption('Ver detalle');
            $pageEdit->SetHeader(GetPagesHeader());
            $pageEdit->SetFooter(GetPagesFooter());
            $pageEdit->SetCaption('');
            $pageEdit->SetHttpHandlerName('dbo_AlterLogDetailEdit0dbo_BaseDatos_handler');
            $handler = new PageHTTPHandler('dbo_AlterLogDetailEdit0dbo_BaseDatos_handler', $pageEdit);
            GetApplication()->RegisterHTTPHandler($handler);
            $pageView = new dbo_procesosDetailView1dbo_BaseDatosPage($this, '', '', array('Database'), GetCurrentUserGrantForDataSource('dbo.BaseDatos.'), 'UTF-8', 20, 'dbo_procesosDetailEdit1dbo_BaseDatos_handler');
            
            $pageView->SetRecordPermission(GetCurrentUserRecordPermissionsForDataSource('dbo.BaseDatos.'));
            $handler = new PageHTTPHandler('dbo_procesosDetailView1dbo_BaseDatos_handler', $pageView);
            GetApplication()->RegisterHTTPHandler($handler);
            $pageEdit = new dbo_procesosDetailEdit1dbo_BaseDatosPage($this, array('Database'), array('base_datos'), $this->GetForeingKeyFields(), $this->CreateMasterDetailRecordGridFordbo_procesosDetailEdit1dbo_BaseDatosGrid(), $this->dataset, GetCurrentUserGrantForDataSource('dbo.BaseDatos.'), 'UTF-8');
            
            $pageEdit->SetRecordPermission(GetCurrentUserRecordPermissionsForDataSource('dbo.BaseDatos.'));
            $pageEdit->SetShortCaption('Ver Procesos');
            $pageEdit->SetHeader(GetPagesHeader());
            $pageEdit->SetFooter(GetPagesFooter());
            $pageEdit->SetCaption('');
            $pageEdit->SetHttpHandlerName('dbo_procesosDetailEdit1dbo_BaseDatos_handler');
            $handler = new PageHTTPHandler('dbo_procesosDetailEdit1dbo_BaseDatos_handler', $pageEdit);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for base_datos field
            //
            $column = new TextViewColumn('base_datos', 'Base Datos', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'dbo_BaseDatosGrid_base_datos_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);//
            // View column for base_datos field
            //
            $column = new TextViewColumn('base_datos', 'Base Datos', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'dbo_BaseDatosGrid_base_datos_handler_view', $column);
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
        $Page = new dbo_BaseDatosPage("Base de Datos.php", "dbo_BaseDatos", GetCurrentUserGrantForDataSource("dbo.BaseDatos"), 'UTF-8');
        $Page->SetShortCaption('Base de Datos');
        $Page->SetHeader(GetPagesHeader());
        $Page->SetFooter(GetPagesFooter());
        $Page->SetCaption('');
        $Page->SetRecordPermission(GetCurrentUserRecordPermissionsForDataSource("dbo.BaseDatos"));
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
	
