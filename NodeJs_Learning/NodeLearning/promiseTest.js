function craw() {

    return new Promise((resolve, reject) => {
        let data = "haha";

        setTimeout(() => {
            data = "heihei";
            resolve(data);

        }, 3000);
    });
    
}


async function test() {
    let d = await craw();
    console.log(d)
}

test();
