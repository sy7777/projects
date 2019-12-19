function test(i, x=[]) {
    x.push(i);
    return x;
}

for(let i = 0; i<3;i++) {
    console.log(test(i));
}