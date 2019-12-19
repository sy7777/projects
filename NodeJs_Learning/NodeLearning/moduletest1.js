let hello = {
    key1: "Hello",
    key2: 10,
    key3: true,
    key4: [1,2,3],
    key5: function speak(message){
        console.log(message);
    },
    key6: (message) => {
        console.log(`hello ${message}`);

    }
};

function test(key) {
    hello[key]("haha");
    hello.key6("hh");
}

test("key6");

module.exports = {hello, test};