PROGRAM WorkWithQueryString(INPUT, OUTPUT);
USES
  DOS;
FUNCTION GetQueryStringParameter(Key: STRING): STRING;
  VAR
    QueryS: STRING;
    K1, K2, I: INTEGER;
  BEGIN {GetQueryStringParameter}
    QueryS := GetEnv('QUERY_STRING');
    Key := CONCAT(Key, '='); {�᫨ �㦭� ��� ��ࠬ��� � ��砫�}
    K1 := POS(Key, QueryS);
    IF K1 > 1
    THEN
      BEGIN
        Key := CONCAT('&', Key);  {�᫨ �㦭� ��� ��ࠬ��� �� � ��砫�}
        K1 := POS(Key, QueryS);
      END;
    IF K1 <> 0
    THEN
      BEGIN
        K1 := K1 + LENGTH(Key); {����� ᨬ���� ��砫� ���祭��}
        I := K1;
        K2 := LENGTH(QueryS) + 1; {����� ��᫥����� ᨬ���� � ��ப� ���� 1}
        WHILE (QueryS[I] <> '&') AND (I <= LENGTH(QueryS))
        DO
          BEGIN
            INC(I);
            IF QueryS[I] = '&'
            THEN
              K2 := I
          END;
        GetQueryStringParameter := COPY(QueryS, K1, K2-K1);
      END
    ELSE
      GetQueryStringParameter := 'Unidentified'
  END; {GetQueryStringParameter}

BEGIN {WorkWithQueryString}
  WRITELN('Content-Type:text/plain');
  WRITELN;
  WRITELN('First Name: ', GetQueryStringParameter('first_name'));
  WRITELN('Last Name: ', GetQueryStringParameter('last_name'));
  WRITELN('Age: ', GetQueryStringParameter('age'))
END. {WorkWithQueryString}
