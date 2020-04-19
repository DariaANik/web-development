function calc(expr) {
    /**
     * Калькулятор поддерживает операции + - * /. Унарный минус не поддерживается.
     * Формат ввода: знак пробел число пробел число. Вместо чисел можно подставить выражение аналогичного формата.
     * Возможно использование скобок, на результат вычислений не влияют.
     */
    let signs = ['+', '-', '*', '/'];
    let isCorrectExpr;
    let isCalc = true;
    let isCorrectLength = true;
    console.log('Вычислить выражение', expr);
    if (typeof expr === 'string') {
        expr = expr.replace(/[()]+/g, ' ');
        expr = expr.trim();
        const reg = RegExp(/^[\+\*\/-]+[\d\s\+\*\/\-(\d+\.\d*)]+\d$/g);
        isCorrectExpr = reg.test(expr);
    } else {
        isCorrectExpr = false;
    }
    if (isCorrectExpr) {
        expr = expr.replace(/\s{2,}/g, ' ');
        expr = expr.split(' ');
        if (expr.length < 3) {
            isCorrectLength = false;
        }
    }
    while ((isCalc) && (isCorrectExpr) && (isCorrectLength) && (expr.length > 2)) {
        isCalc = false; // флаг, производились ли вычисления в этом проходе
        for (let i = 0; i < expr.length - 2; i++) {
            let element = expr[i];
            if (signs.includes(element) && (!isNaN(parseFloat(expr[i + 1]))) && (!isNaN(parseFloat(expr[i + 2])))) {
                let sign = element;
                let n1 = Number(expr[i + 1]);
                let n2 = Number(expr[i + 2]);
                if (calcArithm(sign, n1, n2) !== 'divzero') {
                    expr[i] = calcArithm(sign, n1, n2);
                    expr.splice(i + 1, 2);
                    isCalc = true;
                } else {
                    isCalc = false;
                    break;
                }
            }
        }
    }
    if ((isCalc) && (isCorrectExpr) && (isCorrectLength) && (expr.length === 1)) {
        console.log('Результат', expr[0]);
    } else if (!isCorrectExpr) {
        console.log('Некорректные символы / некорректный порядок ввода значений.');
    } else if (!isCorrectLength) {
        console.log('Введите не меньше трех значений в формате знак число число.');
    } else {
        console.log('Ошибка вычислений. Некорректное выражение.');
    }
}
function calcArithm(sign, n1, n2) {
    if (sign === '+') return n1 + n2;
    if (sign === '-') return n1 - n2;
    if (sign === '*') return n1 * n2;
    if (sign === '/') {
        if (n2 === 0) {
            return 'divzero'
        } else {
            return n1 / n2;
        }
    }
}