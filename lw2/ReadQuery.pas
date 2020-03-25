UNIT ReadQuery;
INTERFACE
  PROCEDURE GetValue(VAR QueryS, Param, Value: STRING);
IMPLEMENTATION
  PROCEDURE GetValue(VAR QueryS, Param, Value: STRING);
  VAR
    K1, K2, I: INTEGER;
  BEGIN {GetValue}
    Param := CONCAT(Param, '='); {�᫨ �㦭� ��� ��ࠬ��� � ��砫�}
    K1 := POS(Param, QueryS);
    IF K1 > 1
    THEN
      BEGIN
        Param := CONCAT('&', Param);  {�᫨ �㦭� ��� ��ࠬ��� �� � ��砫�}
        K1 := POS(Param, QueryS);
      END;
    IF K1 <> 0
    THEN
      BEGIN
        K1 := K1 + LENGTH(Param); {����� ᨬ���� ��砫� ���祭��}
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
        Value := COPY(QueryS, K1, K2-K1);
      END
    ELSE
      Value := ''
  END; {GetValue}

BEGIN  {ReadQuery}
END. {ReadQuery}