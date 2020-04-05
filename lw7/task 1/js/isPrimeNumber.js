let n = [1, 2, 3, 4, 5, '%', 10, 8, 0, -73];
isPrimeNumber(n);

function isPrimeNumber(n) {
    let arrayToCheck = [];
    if (!Array.isArray(n)) {
        arrayToCheck[0] = n;
    } else {
        arrayToCheck = n;
    }
    for (let i = 0; i < arrayToCheck.length; i++) {
        isPrimeCheck(arrayToCheck[i]);
    }
}

function isPrimeCheck(item) {
    let isPrime;
    if (typeof(item) == 'number') {
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
        if (isPrime) {
            console.log(item, 'is a prime number')
        } else {
            console.log(item, 'is not a prime number')
        }
    } else {
        console.log(item, 'is not a number')
    }
}