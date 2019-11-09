const createMatrix = param => {
    var result = '';
    for (let i = 0; i < param * param; i++) {
        result += Math.floor(Math.random() * 10)
        if (result.length === 3 || result.length === 7 || result.length === 11) {
            result += '\n'
        }
    }

    let result1 = Number(result[0]) + Number(result[5]) + Number(result[10])
    let result2 = Number(result[2]) + Number(result[5]) + Number(result[8])
    let total = result1 + result2

    console.log(result + '\n')
    console.log('Total: ' + total)
}
console.log(createMatrix(3));