let n = [1, 2, 3, 4, 5, '%', 10, 8, 0, -73];
if (Array.isArray(n)) {
    for (let i = 0; i < n.length; i++) {
        isPrimeNumber(n[i]);
    }
} else {
    isPrimeNumber(n);
}

function isPrimeNumber(n) {
    let isPrime;
    if (typeof(n) == 'number') {
        if (n < 2) {
            isPrime = false;
        } else {
            isPrime = true;
            for (let i = 2; i < n; i++) {
                if (n % i === 0) {
                    isPrime = false;
                    break;
                }
            }
        }
        if (isPrime) {
            console.log(n, 'is a prime number')
        } else {
            console.log(n, 'is not a prime number')
        }
    } else {
        console.log(n, 'is not a number')
    }
}

