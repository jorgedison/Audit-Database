USE [master]
GO

IF EXISTS(SELECT * FROM SYS.server_triggers WHERE name = 'AlterObject')
BEGIN
DROP TRIGGER [AlterObject] ON ALL SERVER
END
GO
