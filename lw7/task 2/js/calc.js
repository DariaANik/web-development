function calc(expr) {
    let signs = ['+', '-', '*', '/'];
    let correctExpr = false;
    let isCalc = true;
    let correctLength = true;
    console.log('Вычислить выражение', expr);
    expr = expr.replace(/[()]+/g, ' ');
    expr = expr.trim();
    const reg = RegExp(/^[\+\*\/-]+[\d\s\+\*\/\-]+[\d]+$/g);
    correctExpr = reg.test(expr);
    if (correctExpr) {
        expr = expr.replace(/\s{2,}/g, ' ');
        expr = expr.split(' ');
        if (expr.length < 3) {
            correctLength = false;
        }
    }
    while ((expr.length > 2) && (isCalc) && (correctExpr) && (correctLength)) {
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
    if ((expr.length = 1) && (isCalc) && (correctExpr) && (correctLength)) {
        console.log('Результат', expr[0]);
    } else if (!correctExpr) {
        console.log('Некорректные символы / некорректный порядок ввода значений.');
    } else if (!correctLength) {
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