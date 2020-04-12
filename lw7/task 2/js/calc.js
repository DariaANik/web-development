calc('+ 6 + +');
function calc(expr) {
    let signs = ['+', '-', '*', '/'];
    let isCorrectExpr;
    let isCalc = true;
    let isCorrectLength = true;
    console.log('Вычислить выражение', expr);
    expr = expr.replace(/[()]+/g, ' ');
    expr = expr.trim();
    const reg = RegExp(/^[\+\*\/-]+[\d\s\+\*\/\-]+[\d]+$/g);
    isCorrectExpr = reg.test(expr);
    if (isCorrectExpr) {
        expr = expr.replace(/\s{2,}/g, ' ');
        expr = expr.split(' ');
        if (expr.length < 3) {
            isCorrectLength = false;
        }
    }
    while ((expr.length > 2) && (isCalc) && (isCorrectExpr) && (isCorrectLength)) {
        isCalc = false; // флаг, производились ли вычисления в этом проходе
        for (let i = 0; i < expr.length - 2; i++) {
            let element = expr[i];
            if (signs.includes(element) && (!isNaN(parseInt(expr[i + 1]))) && (!isNaN(parseInt(expr[i + 2])))) {
                let sign = element;
                let n1 = Number(expr[i + 1]);
                let n2 = Number(expr[i + 2]);
                expr[i] = calcArithm(sign, n1, n2);
                expr.splice(i + 1, 2);
                isCalc = true;
            }
        }
    }
    if ((expr.length = 1) && (isCalc) && (isCorrectExpr) && (isCorrectLength)) {
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
    if (sign === '/') return n1 / n2;
}