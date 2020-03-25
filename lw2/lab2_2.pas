PROGRAM HttpResponse(INPUT, OUTPUT);
USES
  Dos, ReadQuery;
VAR
  QueryS, Param, Value: STRING;
BEGIN
  WRITELN('Content-Type:text/plain');
  WRITELN;
  QueryS := GetEnv('QUERY_STRING');
  Param := 'lanterns';
  Value := '';
  GetValue(QueryS, Param, Value);
  IF Value = '1'
  THEN
    WRITELN('The British are coming by land.')
  ELSE
    IF Value = '2'
    THEN
      WRITELN('The British are coming by sea.')
    ELSE
      WRITELN('The North Church shows only ''', Value, '''.')
END.
