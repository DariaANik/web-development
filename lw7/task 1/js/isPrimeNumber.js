let n = [1, 2, 3, 4, 5, '%', 10, 8, 0, -73];
isPrimeNumber(n);

function isPrimeNumber(n) {
    let arrayToCheck = [];
    if (Array.isArray(n)) {
        arrayToCheck = n;
    } else {
        arrayToCheck = [n];
    }
    for (let i = 0; i < arrayToCheck.length; i++) {
        let element = arrayToCheck[i];
        if (typeof(element) == 'number') {
            if (isPrimeCheck(element)) {
                console.log(element, 'is a prime number')
            } else {
                console.log(element, 'is not a prime number')
            }
        } else {
            console.log(element, 'is not a number');
        }
    }
}

function isPrimeCheck(item) {
    let isPrime;
    if (item < 2) {
        isPrime = false;
    } else {
        isPrime = true;
        for (let i = 2; i < item; i++) {
            if (item % i === 0) {
                isPrime = false;
                break;
            }
        }
    }
    return isPrime;
}