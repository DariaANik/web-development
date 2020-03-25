PROGRAM HttpResponse(INPUT, OUTPUT);
USES
  Dos, ReadQuery;
VAR
  QueryS, Param, Value: STRING;
BEGIN
  WRITELN('Content-Type:text/plain');
  WRITELN;
  QueryS := GetEnv('QUERY_STRING');
  Param := 'name';
  Value := '';
  GetValue(QueryS, Param, Value);
  WRITE('Hello ');
  IF Value = ''
  THEN
    WRITELN('Anonymous!')
  ELSE
    WRITELN('dear ', Value, '!')
END.
